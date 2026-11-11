import 'dart:convert';
import 'dart:math';

import 'package:crypto/crypto.dart';
import 'package:flutter/material.dart';

void main() => runApp(const SecureChatApp());

class SecureChatApp extends StatelessWidget {
  const SecureChatApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Secure Chat',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(seedColor: Colors.teal),
        useMaterial3: true,
      ),
      home: const ChatScreen(),
    );
  }
}

class ChatScreen extends StatefulWidget {
  const ChatScreen({super.key});

  @override
  State<ChatScreen> createState() => _ChatScreenState();
}

class _ChatScreenState extends State<ChatScreen> {
  final List<String> _messages = [];
  final TextEditingController _controller = TextEditingController();
  final String _roomSecret = 'shared-secret-key';

  void _send() {
    final text = _controller.text.trim();
    if (text.isEmpty) return;
    setState(() {
      _messages.add(_encrypt(text));
      _messages.add('	decrypted: 	$_decrypt(_encrypt(text))');
    });
    _controller.clear();
  }

  String _encrypt(String input) {
    final key = sha256.convert(utf8.encode(_roomSecret)).bytes.sublist(0, 32);
    final iv = List<int>.generate(16, (_) => Random().nextInt(256));
    final data = utf8.encode(input);
    final out = List<int>.from(iv);
    for (var i = 0; i < data.length; i++) {
      out.add(data[i] ^ key[i % key.length] ^ iv[i % 16]);
    }
    return base64Url.encode(out);
  }

  String _decrypt(String input) {
    final key = sha256.convert(utf8.encode(_roomSecret)).bytes.sublist(0, 32);
    final raw = base64Url.decode(input);
    final iv = raw.sublist(0, 16);
    final data = raw.sublist(16);
    final out = <int>[];
    for (var i = 0; i < data.length; i++) {
      out.add(data[i] ^ key[i % key.length] ^ iv[i % 16]);
    }
    return utf8.decode(out);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Secure Chat'),
        actions: const [Icon(Icons.lock_outlined)],
      ),
      body: Column(
        children: [
          Expanded(
            child: ListView.builder(
              padding: const EdgeInsets.all(12),
              itemCount: _messages.length,
              itemBuilder: (context, i) {
                final mine = _messages[i].startsWith('	decrypted');
                return Align(
                  alignment: mine ? Alignment.centerLeft : Alignment.centerRight,
                  child: Chip(
                    label: Text(_messages[i]),
                    backgroundColor: mine ? Colors.teal.shade50 : Colors.indigo.shade50,
                  ),
                );
              },
            ),
          ),
          SafeArea(
            child: Padding(
              padding: const EdgeInsets.all(8),
              child: Row(
                children: [
                  Expanded(
                    child: TextField(
                      controller: _controller,
                      decoration: const InputDecoration(hintText: 'اكتب رسالتك...'),
                    ),
                  ),
                  IconButton.filled(onPressed: _send, icon: const Icon(Icons.send)),
                ],
              ),
            ),
          ),
        ],
      ),
    );
  }
}