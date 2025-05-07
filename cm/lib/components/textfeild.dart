import 'package:flutter/material.dart';

class MYTextField extends StatelessWidget {
  final controller;
  final String hintText;
  final bool obscureText;

  const MYTextField(
      {super.key,
      required this.hintText,
      this.controller,
      required this.obscureText});

  @override
  Widget build(BuildContext context) {
    return TextField(
      controller: controller,
      obscureText: obscureText,
      decoration: InputDecoration(
        filled: true, // Set the filled property to true
        fillColor: Colors.white,
        enabledBorder: const OutlineInputBorder(
          borderSide: BorderSide(color: Colors.grey),
          borderRadius: BorderRadius.all(Radius.circular(10)),
        ),
        focusedBorder: const OutlineInputBorder(
          borderSide: BorderSide(color: Colors.blueGrey),
          borderRadius: BorderRadius.all(Radius.circular(10)),
        ),
        hintText: hintText,
        hintStyle: const TextStyle(color: Colors.grey),
        contentPadding: const EdgeInsets.fromLTRB(10, 0, 0, 0),
      ),
    );
  }
}
