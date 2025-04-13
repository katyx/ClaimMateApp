import 'package:flutter/material.dart';
import 'package:claim_mate/pages/dashboard.dart';
import 'package:claim_mate/pages/login_page.dart';
import 'package:claim_mate/pages/register.dart';
import 'package:claim_mate/pages/get_code.dart';
import 'package:claim_mate/pages/reg_password.dart';
import 'package:claim_mate/pages/reset_password.dart';
import 'package:claim_mate/pages/rest_get_code.dart';
import 'package:claim_mate/pages/new_password.dart';
import 'package:claim_mate/pages/contact_us.dart';
import 'package:claim_mate/pages/report_case_vehicle.dart';
import 'package:claim_mate/pages/report_case_driver.dart';
import 'package:claim_mate/pages/report_case_case.dart';
import 'package:claim_mate/pages/report_case_images.dart';
import 'package:claim_mate/pages/submited.dart';
import 'package:claim_mate/pages/reg_vehicles.dart';
import 'package:claim_mate/pages/profile.dart';
import 'package:claim_mate/pages/old_cases.dart';
import 'package:claim_mate/pages/vehicle_details.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Claim Mate',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: const LoginPage(),
    );
  }
}
