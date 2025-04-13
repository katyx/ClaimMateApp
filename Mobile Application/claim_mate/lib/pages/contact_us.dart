import 'package:claim_mate/components/button.dart';
import 'package:flutter/material.dart';

class ContactUs extends StatelessWidget {
  const ContactUs({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        decoration: const BoxDecoration(
          image: DecorationImage(
            image: AssetImage("lib/images/hero-img-01.png"),
            opacity: 0.1,
          ),
        ),
        child: SafeArea(
          child: Center(
            child: SingleChildScrollView(
              child: Column(
                children: [
                  AppBar(
                    elevation: 2,
                    backgroundColor: Colors.white,
                    leading: IconButton(
                      icon: Icon(Icons.arrow_back, color: Colors.black),
                      onPressed: () {
                        Navigator.pop(context);
                      },
                    ),
                    title: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        Text(
                          'Contact Us',
                          style: TextStyle(
                            color: Colors.black,
                            fontWeight: FontWeight.bold,
                            fontSize: 22,
                          ),
                        ),
                      ],
                    ),
                  ),

                  const SizedBox(height: 90),

                  //Logo
                  Image.asset(
                    'lib/images/careulogo.png',
                    width: 340,
                  ),

                  const SizedBox(height: 80),

                  //Username
                  SizedBox(
                    height: 50.0,
                    width: double.infinity,
                    child: Padding(
                        padding: EdgeInsets.symmetric(horizontal: 95),
                        child: MYButton(
                          gsntext: 'Call Us',
                          onPressed: () {
                            print('Make a Call!');
                          },
                        )),
                  ),

                  const SizedBox(height: 20),

                  //Email Us
                  SizedBox(
                    height: 50.0,
                    width: double.infinity,
                    child: Padding(
                        padding: EdgeInsets.symmetric(horizontal: 95),
                        child: MYButton(
                          gsntext: 'Email Us',
                          onPressed: () {
                            print('Craete a email!');
                          },
                        )),
                  ),

                  const SizedBox(height: 270),

                  //Copyright Text
                  Text(
                    '©2023 CareU Insurance',
                    style: TextStyle(
                      color: Colors.black54,
                    ),
                  ),
                  Text(
                    'All Right Reserved',
                    style: TextStyle(
                      color: Colors.black54,
                    ),
                  ),

                  const SizedBox(height: 10),
                ],
              ),
            ),
          ),
        ),
      ),
    );
  }
}
