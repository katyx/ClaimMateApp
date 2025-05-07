import 'package:claim_mate/apis/logout.dart';
import 'package:claim_mate/pages/contact_us.dart';
import 'package:claim_mate/pages/old_cases.dart';
import 'package:claim_mate/pages/profile.dart';
import 'package:claim_mate/pages/reg_vehicles.dart';
import 'package:claim_mate/pages/report_case_vehicle.dart';
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';

import 'login_page.dart';

class DashboardScreen extends StatelessWidget {
  final String token;
  final String nic;

  const DashboardScreen({required this.token, required this.nic, super.key});

  void _handleLogout(BuildContext context) async {
    final prefs = await SharedPreferences.getInstance();
    String? token = prefs.getString('token');
    String? nic = prefs.getString('nic');

    if (token != null && nic != null) {
      bool logoutSuccess = await LogoutApi.logout(token, nic);
      if (logoutSuccess) {
        // Perform any necessary actions after successful logout
        // For example, navigate to the login screen
        Navigator.pushReplacement(
          context,
          MaterialPageRoute(builder: (context) => const LoginPage()),
        );
      } else {
        // Handle logout failure
        showDialog(
          context: context,
          builder: (context) => AlertDialog(
            title: const Text('Logout Failed'),
            content: const Text('Failed to logout. Please try again.'),
            actions: [
              TextButton(
                onPressed: () => Navigator.pop(context),
                child: const Text('OK'),
              ),
            ],
          ),
        );
      }
    } else {
      // Handle case where token or nic is not available
      showDialog(
        context: context,
        builder: (context) => AlertDialog(
          title: const Text('Logout Failed'),
          content: const Text('Token or NIC not found. Please login again.'),
          actions: [
            TextButton(
              onPressed: () => Navigator.pop(context),
              child: const Text('OK'),
            ),
          ],
        ),
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Center(
        child: Container(
          decoration: const BoxDecoration(
            image: DecorationImage(
              image: AssetImage("lib/images/bblgo.png"),
              opacity: 0.6,
            ),
          ),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.start,
            children: [
              SingleChildScrollView(
                child: Column(
                  children: [
                    AppBar(
                      elevation: 2,
                      backgroundColor: Colors.white,
                      title: const Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(
                            'Dashboard',
                            style: TextStyle(
                              color: Colors.black,
                              fontWeight: FontWeight.bold,
                              fontSize: 22,
                            ),
                          ),
                          Text(
                            ' Welcome, Heshan Silva!',
                            style: TextStyle(
                              color: Colors.grey,
                              fontSize: 12,
                            ),
                          ),
                        ],
                      ),
                      actions: [
                        Row(
                          children: [
                            const Icon(Icons.person, color: Colors.black),
                            PopupMenuButton(
                              icon: const Icon(Icons.arrow_drop_down,
                                  color: Colors.black),
                              itemBuilder: (BuildContext context) {
                                return [
                                  const PopupMenuItem(
                                    value: 'profile',
                                    child: Text('Profile'),
                                  ),
                                  const PopupMenuItem(
                                    value: 'logout',
                                    child: Text('Logout'),
                                  ),
                                ];
                              },
                              onSelected: (String value) {
                                if (value == 'profile') {
                                  Navigator.push(
                                    context,
                                    MaterialPageRoute(
                                        builder: (context) => const Profile()),
                                  );
                                } else if (value == 'logout') {
                                  _handleLogout(context);
                                }
                              },
                            ),
                          ],
                        ),
                      ],
                    ),
                    const SizedBox(height: 120),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: [
                        ElevatedButton(
                          onPressed: () {
                            Navigator.push(
                              context,
                              MaterialPageRoute(
                                  builder: (context) =>
                                      const ReportCaseVehicle()),
                            );
                          },
                          style: ElevatedButton.styleFrom(
                            fixedSize: const Size(130, 130),
                            shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(10),
                            ),
                            backgroundColor: Colors.yellow,
                          ),
                          child: Column(
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: [
                              Flexible(
                                child: Image.asset(
                                  "lib/images/pngwing.png",
                                ),
                              ),
                              const SizedBox(height: 10),
                              const Flexible(
                                child: Text(
                                  'Report Case',
                                  style: TextStyle(
                                    color: Colors.black,
                                    fontWeight: FontWeight.bold,
                                    fontSize: 15,
                                  ),
                                ),
                              ),
                            ],
                          ),
                        ),
                        ElevatedButton(
                          onPressed: () {
                            Navigator.push(
                              context,
                              MaterialPageRoute(
                                  builder: (context) => OldCases()),
                            );
                          },
                          style: ElevatedButton.styleFrom(
                            fixedSize: const Size(130, 130),
                            shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(10),
                            ),
                            backgroundColor: Colors.yellow,
                          ),
                          child: Column(
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: [
                              Flexible(
                                child: Image.asset(
                                  "lib/images/donecase.png",
                                  height: 80,
                                  fit: BoxFit.cover,
                                ),
                              ),
                              const SizedBox(height: 10),
                              const Flexible(
                                child: Text(
                                  'Old Cases',
                                  style: TextStyle(
                                    color: Colors.black,
                                    fontWeight: FontWeight.bold,
                                    fontSize: 15,
                                  ),
                                ),
                              ),
                            ],
                          ),
                        ),
                      ],
                    ),
                    const SizedBox(height: 30),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: [
                        ElevatedButton(
                          onPressed: () {
                            Navigator.push(
                              context,
                              MaterialPageRoute(
                                  builder: (context) => RegVehicles()),
                            );
                          },
                          style: ElevatedButton.styleFrom(
                            fixedSize: const Size(130, 130),
                            shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(10),
                            ),
                            backgroundColor: Colors.yellow,
                          ),
                          child: Column(
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: [
                              Flexible(
                                child: Image.asset(
                                  "lib/images/vehicle.png",
                                ),
                              ),
                              const SizedBox(height: 10),
                              const Flexible(
                                child: Text(
                                  'Reg. Vehicles',
                                  style: TextStyle(
                                    color: Colors.black,
                                    fontWeight: FontWeight.bold,
                                    fontSize: 15,
                                  ),
                                ),
                              ),
                            ],
                          ),
                        ),
                        ElevatedButton(
                          onPressed: () {
                            Navigator.push(
                              context,
                              MaterialPageRoute(
                                  builder: (context) => const ContactUs()),
                            );
                          },
                          style: ElevatedButton.styleFrom(
                            fixedSize: const Size(130, 130),
                            shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(10),
                            ),
                            backgroundColor: Colors.yellow,
                          ),
                          child: Column(
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: [
                              Flexible(
                                child: Image.asset(
                                  "lib/images/customer-support.png",
                                ),
                              ),
                              const SizedBox(height: 10),
                              const Flexible(
                                child: Text(
                                  'Contact Us',
                                  style: TextStyle(
                                    color: Colors.black,
                                    fontWeight: FontWeight.bold,
                                    fontSize: 15,
                                  ),
                                ),
                              ),
                            ],
                          ),
                        ),
                      ],
                    ),
                    const SizedBox(height: 243),
                    TextButton(
                      onPressed: () {
                        Navigator.push(
                          context,
                          MaterialPageRoute(
                              builder: (context) => const ContactUs()),
                        );
                      },
                      child: const Text.rich(
                        TextSpan(
                          text: 'Need any ',
                          style: TextStyle(
                            color: Colors.black54,
                          ),
                          children: [
                            TextSpan(
                              text: 'help?',
                              style: TextStyle(
                                fontWeight: FontWeight.bold,
                              ),
                            ),
                          ],
                        ),
                      ),
                    ),
                  ],
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
