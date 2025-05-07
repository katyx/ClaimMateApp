import 'package:flutter/material.dart';

class MYButton extends StatelessWidget {
  final VoidCallback onPressed;
  final String gsntext;

  const MYButton({super.key, required this.gsntext, required this.onPressed});

  @override
  Widget build(BuildContext context) {
    return ElevatedButton(
      onPressed: onPressed,
      style: ElevatedButton.styleFrom(
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(10),
        ),
        backgroundColor: Colors.yellow,
      ),
      child: Text(
        gsntext,
        style: const TextStyle(
          color: Colors.black,
          fontWeight: FontWeight.bold,
          fontSize: 16,
        ),
      ),
    );
  }
}
