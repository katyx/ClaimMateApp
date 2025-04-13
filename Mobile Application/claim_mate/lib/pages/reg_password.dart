import 'package:flutter/material.dart';

class RegPasswordPage extends StatelessWidget {
  const RegPasswordPage({super.key});

  @override
  Widget build(BuildContext context) {
    final _formKey = GlobalKey<FormState>();
    final _passwordController = TextEditingController();
    final _confirmController = TextEditingController();

    return Scaffold(
      appBar: AppBar(title: const Text("Create Password")),
      body: Padding(
        padding: const EdgeInsets.all(16),
        child: Form(
          key: _formKey,
          child: Column(
            children: [
              TextFormField(
                controller: _passwordController,
                decoration: const InputDecoration(labelText: "Password"),
                obscureText: true,
                validator: (value) =>
                    value != null && value.length < 6 ? "Too short" : null,
              ),
              TextFormField(
                controller: _confirmController,
                decoration:
                    const InputDecoration(labelText: "Confirm Password"),
                obscureText: true,
                validator: (value) =>
                    value != _passwordController.text ? "Doesn't match" : null,
              ),
              const SizedBox(height: 20),
              ElevatedButton(
                onPressed: () {
                  if (_formKey.currentState!.validate()) {
                    // TODO: Send data to Firebase
                    ScaffoldMessenger.of(context).showSnackBar(
                      const SnackBar(content: Text("Account created!")),
                    );
                  }
                },
                child: const Text("Register"),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
