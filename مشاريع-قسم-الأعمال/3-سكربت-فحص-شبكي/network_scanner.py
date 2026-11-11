import argparse
import socket
import sys
from concurrent.futures import ThreadPoolExecutor

OPEN_PORTS = []


def scan(port: int, host: str) -> int:
    s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    s.settimeout(0.6)
    is_open = s.connect_ex((host, port)) == 0
    s.close()
    return port if is_open else -1


def main() -> int:
    parser = argparse.ArgumentParser(description="Network Scanner")
    parser.add_argument("host", help="target host or IP")
    parser.add_argument("-p", "--ports", default="1-1024", help="port range like 20-8080")
    parser.add_argument("-w", "--workers", type=int, default=100)
    args = parser.parse_args()

    try:
        host_ip = socket.gethostbyname(args.host)
    except socket.gaierror:
        print(f"cannot resolve host: {args.host}")
        return 2

    start, end = (int(x) for x in args.ports.split("-"))
    if start < 1 or end > 65535 or start > end:
        print("invalid port range")
        return 2

    print(f"target : {args.host} ({host_ip})")
    print(f"range  : {start}-{end}")
    print("scanning...")

    with ThreadPoolExecutor(max_workers=args.workers) as pool:
        futures = {pool.submit(scan, port, host_ip): port for port in range(start, end + 1)}
        for future in futures:
            port = future.result()
            if port != -1:
                OPEN_PORTS.append(port)
                print(f"[+] open : {port}")

    OPEN_PORTS.sort()
    print(f"\nresult : {len(OPEN_PORTS)} open port(s): {', '.join(map(str, OPEN_PORTS)) or 'none'}")
    return 0


if __name__ == "__main__":
    sys.exit(main())