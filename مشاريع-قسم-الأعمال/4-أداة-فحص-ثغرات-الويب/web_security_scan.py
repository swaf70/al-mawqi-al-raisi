import argparse
import re
import sys
import urllib.error
import urllib.request

UA = "web-security-scan/1.0"

REQUIRED_HEADERS = {
    "strict-transport-security": "تفعيل HSTS لمنع هجمات خفض البروتوكول",
    "content-security-policy": "سياسة محتوى CSP للحد من XSS",
    "x-content-type-options": "منع التخمين الخاطئ لنوع المحتوى",
    "x-frame-options": "منع التضمين في إطارات (Clickjacking)",
}

SQLI_PATTERN = r"(union\s+select|\bor\s+['\"]\d|'--\s|sleep\()"
XSS_PATTERN = r"(<script\b|javascript:|\bon\w+\s*=)"

FAILS = []


def request(url: str) -> tuple:
    req = urllib.request.Request(url, headers={"User-Agent": UA})
    with urllib.request.urlopen(req, timeout=10) as resp:
        body = resp.read(1024 * 512).decode("utf-8", "ignore")
        return dict(resp.headers), body


def check_headers(headers: dict) -> None:
    for name, note in REQUIRED_HEADERS.items():
        if name in headers:
            print(f"[ok]   {name}")
        else:
            print(f"[-]   {name}: {note}")
            FAILS.append(name)


def check_body(url: str, body: str) -> None:
    if re.search(SQLI_PATTERN, body, re.IGNORECASE):
        print(f"[-]   SQLi pattern found in response body: {url}")
        FAILS.append("sqli")
    else:
        print("[ok]   no obvious SQLi marker")
    if re.search(XSS_PATTERN, body, re.IGNORECASE):
        print(f"[-]   XSS pattern found in response body: {url}")
        FAILS.append("xss")
    else:
        print("[ok]   no obvious XSS marker")


def main() -> int:
    parser = argparse.ArgumentParser(description="Web Security Scanner")
    parser.add_argument("url", help="target URL, e.g. https://example.com")
    args = parser.parse_args()

    if not args.url.startswith(("http://", "https://")):
        print("url must start with http:// or https://")
        return 2

    try:
        headers, body = request(args.url)
    except (urllib.error.URLError, ValueError) as e:
        print(f"request failed: {e}")
        return 2

    print(f"target : {args.url}")
    print("headers")
    check_headers(headers)
    print("payload markers")
    check_body(args.url, body)

    print(f"\nresult : {len(FAILS)} issue(s) found" if FAILS else "\nresult : no issues found")
    return 1 if FAILS else 0


if __name__ == "__main__":
    sys.exit(main())