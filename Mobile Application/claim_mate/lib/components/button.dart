import 'package:flutter/material.dart';

class MYButton extends StatelessWidget {

  final VoidCallback onPressed;
  final String gsntext;

  const MYButton({Key? key, required this.gsntext, required this.onPressed}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ElevatedButton(
      onPressed: onPressed,
        child: Text(
          gsntext,
          style: TextStyle(
            color: Colors.black,
            fontWeight: FontWeight.bold,
            fontSize: 16,
          ),
        ),
      style: ElevatedButton.styleFrom(
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(10),
        ),
        backgroundColor: Colors.yellow,
      ),
    );
  }
}
