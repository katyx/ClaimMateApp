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

  DashboardScreen({required this.token, required this.nic, Key? key})
      : super(key: key);

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
          MaterialPageRoute(builder: (context) => LoginPage()),
        );
      } else {
        // Handle logout failure
        showDialog(
          context: context,
          builder: (context) => AlertDialog(
            title: Text('Logout Failed'),
            content: Text('Failed to logout. Please try again.'),
            actions: [
              TextButton(
                onPressed: () => Navigator.pop(context),
                child: Text('OK'),
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
          title: Text('Logout Failed'),
          content: Text('Token or NIC not found. Please login again.'),
          actions: [
            TextButton(
              onPressed: () => Navigator.pop(context),
              child: Text('OK'),
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
                      title: Column(
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
                            Icon(Icons.person, color: Colors.black),
                            PopupMenuButton(
                              icon: Icon(Icons.arrow_drop_down,
                                  color: Colors.black),
                              itemBuilder: (BuildContext context) {
                                return [
                                  PopupMenuItem(
                                    child: Text('Profile'),
                                    value: 'profile',
                                  ),
                                  PopupMenuItem(
                                    child: Text('Logout'),
                                    value: 'logout',
                                  ),
                                ];
                              },
                              onSelected: (String value) {
                                if (value == 'profile') {
                                  Navigator.push(
                                    context,
                                    MaterialPageRoute(
                                        builder: (context) => Profile()),
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
                    SizedBox(height: 120),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                      children: [
                        ElevatedButton(
                          onPressed: () {
                            Navigator.push(
                              context,
                              MaterialPageRoute(
                                  builder: (context) => ReportCaseVehicle()),
                            );
                          },
                          child: Column(
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: [
                              Flexible(
                                child: Image.asset(
                                  "lib/images/pngwing.png",
                                ),
                              ),
                              SizedBox(height: 10),
                              Flexible(
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
                          style: ElevatedButton.styleFrom(
                            fixedSize: Size(130, 130),
                            shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(10),
                            ),
                            backgroundColor: Colors.yellow,
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
                              SizedBox(height: 10),
                              Flexible(
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
                          style: ElevatedButton.styleFrom(
                            fixedSize: Size(130, 130),
                            shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(10),
                            ),
                            backgroundColor: Colors.yellow,
                          ),
                        ),
                      ],
                    ),
                    SizedBox(height: 30),
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
                          child: Column(
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: [
                              Flexible(
                                child: Image.asset(
                                  "lib/images/vehicle.png",
                                ),
                              ),
                              SizedBox(height: 10),
                              Flexible(
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
                          style: ElevatedButton.styleFrom(
                            fixedSize: Size(130, 130),
                            shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(10),
                            ),
                            backgroundColor: Colors.yellow,
                          ),
                        ),
                        ElevatedButton(
                          onPressed: () {
                            Navigator.push(
                              context,
                              MaterialPageRoute(
                                  builder: (context) => ContactUs()),
                            );
                          },
                          child: Column(
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: [
                              Flexible(
                                child: Image.asset(
                                  "lib/images/customer-support.png",
                                ),
                              ),
                              SizedBox(height: 10),
                              Flexible(
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
                          style: ElevatedButton.styleFrom(
                            fixedSize: Size(130, 130),
                            shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(10),
                            ),
                            backgroundColor: Colors.yellow,
                          ),
                        ),
                      ],
                    ),
                    SizedBox(height: 243),
                    TextButton(
                      onPressed: () {
                        Navigator.push(
                          context,
                          MaterialPageRoute(builder: (context) => ContactUs()),
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
