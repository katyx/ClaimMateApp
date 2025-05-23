import 'package:cm/components/button.dart';
import 'package:cm/pages/contact_us.dart';
import 'package:cm/pages/report_case_driver.dart';
import 'package:flutter/material.dart';

class ReportCaseVehicle extends StatelessWidget {
  const ReportCaseVehicle({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Container(
        decoration: const BoxDecoration(
          image: DecorationImage(
            image: AssetImage(
              "lib/images/hero-img-01.png",
            ),
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
                      icon: const Icon(Icons.arrow_back, color: Colors.black),
                      onPressed: () {
                        Navigator.pop(context);
                      },
                    ),
                    title: const Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        Text(
                          'Report Your Case',
                          style: TextStyle(
                            color: Colors.black,
                            fontWeight: FontWeight.bold,
                            fontSize: 22,
                          ),
                        ),
                        Text(
                          ' Vehicle Details',
                          style: TextStyle(
                            color: Colors.grey,
                            fontSize: 14,
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
                                // Do something when the user selects "Profile"
                              } else if (value == 'logout') {
                                // Do something when the user selects "Logout"
                              }
                            },
                          ),
                        ],
                      ),
                    ],
                  ),
                  const SizedBox(height: 80),
                  Container(
                    width: 340,
                    decoration: BoxDecoration(
                      color: Colors.white,
                      borderRadius: BorderRadius.circular(10),
                      boxShadow: [
                        BoxShadow(
                          color: Colors.grey.withOpacity(0.5),
                          spreadRadius: 2,
                          blurRadius: 5,
                          offset: const Offset(0, 3),
                        ),
                      ],
                    ),
                    child: Column(
                      children: [
                        const SizedBox(height: 20),
                        DropdownButton(
                          items: const [
                            DropdownMenuItem(
                              value: 'Vehicle 1',
                              child: Text('WP BEA-1622'),
                            ),
                            DropdownMenuItem(
                              value: 'Vehicle 2',
                              child: Text('WP CBE-1287'),
                            ),
                            DropdownMenuItem(
                              value: 'Vehicle 3',
                              child: Text('WP BBD-1785'),
                            ),
                          ],
                          hint: const Text('Select Vehicle'),
                          onChanged: (value) {},
                        ),
                        const SizedBox(height: 20),
                        const Padding(
                          padding: EdgeInsets.fromLTRB(40, 0, 22, 30),
                          child: Row(
                            mainAxisAlignment: MainAxisAlignment.center,
                            children: [
                              Expanded(
                                child: Column(
                                  crossAxisAlignment: CrossAxisAlignment.start,
                                  children: [
                                    Text(
                                      'Vehicle Type',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      'Vehicle Make',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      'Vehicle Model',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      'YOM',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      'Transmission',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      'Fuel Type',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      'Engine Cap.',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      'Engine No.',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      'Chassis No.',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                  ],
                                ),
                              ),
                              Expanded(
                                child: Column(
                                  crossAxisAlignment: CrossAxisAlignment.start,
                                  children: [
                                    Text(
                                      '           :',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      '           :',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      '           :',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      '           :',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      '           :',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      '           :',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      '           :',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      '           :',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      '           :',
                                      style: TextStyle(
                                        color: Colors.black54,
                                      ),
                                    ),
                                  ],
                                ),
                              ),
                              Expanded(
                                child: Column(
                                  crossAxisAlignment: CrossAxisAlignment.start,
                                  children: [
                                    Text(
                                      'Motorcycle',
                                      style: TextStyle(
                                        fontWeight: FontWeight.bold,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      'Honda',
                                      style: TextStyle(
                                        fontWeight: FontWeight.bold,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      'Dio',
                                      style: TextStyle(
                                        fontWeight: FontWeight.bold,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      '2015',
                                      style: TextStyle(
                                        fontWeight: FontWeight.bold,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      'Auto',
                                      style: TextStyle(
                                        fontWeight: FontWeight.bold,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      'Petrol',
                                      style: TextStyle(
                                        fontWeight: FontWeight.bold,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      '110cc',
                                      style: TextStyle(
                                        fontWeight: FontWeight.bold,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      '1P390MB',
                                      style: TextStyle(
                                        fontWeight: FontWeight.bold,
                                      ),
                                    ),
                                    SizedBox(height: 20),
                                    Text(
                                      '16114196',
                                      style: TextStyle(
                                        fontWeight: FontWeight.bold,
                                      ),
                                    ),
                                  ],
                                ),
                              ),
                            ],
                          ),
                        ),
                        const SizedBox(height: 10),

                        //Next Button
                        SizedBox(
                          height: 50.0,
                          width: double.infinity,
                          child: Padding(
                              padding:
                                  const EdgeInsets.symmetric(horizontal: 95),
                              child: MYButton(
                                gsntext: 'Next',
                                onPressed: () {
                                  Navigator.push(
                                    context,
                                    MaterialPageRoute(
                                        builder: (context) =>
                                            const ReportCaseDriver()),
                                  );
                                },
                              )),
                        ),
                        const SizedBox(height: 20),
                      ],
                    ),
                  ),
                  const SizedBox(height: 70),
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
          ),
        ),
      ),
    );
  }
}
