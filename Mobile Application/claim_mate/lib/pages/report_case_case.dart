import 'package:claim_mate/components/button.dart';
import 'package:claim_mate/pages/contact_us.dart';
import 'package:claim_mate/pages/report_case_driver.dart';
import 'package:claim_mate/pages/submited.dart';
import 'package:flutter/material.dart';
import 'package:geolocator/geolocator.dart';

class ReportCaseCase extends StatefulWidget {
  const ReportCaseCase({Key? key}) : super(key: key);

  @override
  State<ReportCaseCase> createState() => _ReportCaseCaseState();
}

class _ReportCaseCaseState extends State<ReportCaseCase> {
  TextEditingController _locationController = TextEditingController();
  TextEditingController _dateController = TextEditingController();
  TextEditingController _timeController = TextEditingController();
  String _currentLocation = '';
  bool _disableTextFields = true;

  @override
  void dispose() {
    _locationController.dispose();
    _dateController.dispose();
    _timeController.dispose();
    super.dispose();
  }

  @override
  void initState() {
    super.initState();
    _getLocation();
    _getDateAndTime();
  }

  void _getDateAndTime() {
    DateTime currentDate = DateTime.now();
    String formattedDate =
        currentDate.toString(); // Customize the date format as needed
    _dateController.text = formattedDate.split(' ')[0]; // Extract date
    _timeController.text =
        formattedDate.split(' ')[1].split('.')[0]; // Extract time
  }

  Future<void> _getLocation() async {
    final position = await Geolocator.getCurrentPosition(
      desiredAccuracy: LocationAccuracy.high,
    );
    setState(() {
      _currentLocation =
          'Latitude: ${position.latitude}, Longitude: ${position.longitude}';
      _locationController.text = _currentLocation;
    });
  }

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
                      icon: Icon(Icons.arrow_back, color: Colors.black),
                      onPressed: () {
                        Navigator.push(
                          context,
                          MaterialPageRoute(
                              builder: (context) => ReportCaseDriver()),
                        );
                      },
                    ),
                    title: Column(
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
                          ' Case Details',
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
                  SizedBox(height: 25),
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
                        SizedBox(height: 15),

                        Container(
                          padding: EdgeInsets.symmetric(horizontal: 25),
                          child: TextFormField(
                            decoration: InputDecoration(
                              hintText: 'Date',
                              hintStyle: TextStyle(color: Colors.black12),
                              border: OutlineInputBorder(
                                borderRadius: BorderRadius.circular(10),
                              ),
                              filled: true,
                              fillColor: Colors.black12,
                            ),
                            controller: _dateController,
                            enabled: !_disableTextFields,
                          ),
                        ),
                        SizedBox(height: 15),

                        Container(
                          padding: EdgeInsets.symmetric(horizontal: 25),
                          child: TextFormField(
                            decoration: InputDecoration(
                              hintText: 'Time',
                              hintStyle: TextStyle(color: Colors.grey),
                              border: OutlineInputBorder(
                                borderRadius: BorderRadius.circular(10),
                              ),
                              filled: true,
                              fillColor: Colors.black12,
                            ),
                            controller: _timeController,
                            enabled: !_disableTextFields,
                          ),
                        ),
                        SizedBox(height: 15),

                        Container(
                          padding: EdgeInsets.symmetric(horizontal: 25),
                          child: TextFormField(
                            maxLines: null,
                            keyboardType: TextInputType.multiline,
                            decoration: InputDecoration(
                              hintText: 'Location',
                              hintStyle: TextStyle(color: Colors.grey),
                              border: OutlineInputBorder(
                                borderRadius: BorderRadius.circular(10),
                              ),
                              filled: true,
                              fillColor: Colors.black12,
                            ),
                            controller: _locationController,
                            enabled: !_disableTextFields,
                          ),
                        ),
                        SizedBox(height: 15),

                        Container(
                          padding: EdgeInsets.symmetric(horizontal: 25),
                          child: TextFormField(
                            maxLines: null,
                            keyboardType: TextInputType.multiline,
                            decoration: InputDecoration(
                              hintText: 'Any Other Reasons',
                              hintStyle: TextStyle(color: Colors.grey),
                              border: OutlineInputBorder(
                                borderRadius: BorderRadius.circular(10),
                              ),
                            ),
                          ),
                        ),
                        SizedBox(height: 15),

                        Container(
                          padding: EdgeInsets.symmetric(horizontal: 25),
                          child: TextFormField(
                            maxLines: null,
                            keyboardType: TextInputType.multiline,
                            decoration: InputDecoration(
                              hintText: 'Cause of Damage',
                              hintStyle: TextStyle(color: Colors.grey),
                              border: OutlineInputBorder(
                                borderRadius: BorderRadius.circular(10),
                              ),
                            ),
                          ),
                        ),
                        SizedBox(height: 15),

                        Container(
                          padding: EdgeInsets.symmetric(horizontal: 25),
                          child: TextFormField(
                            maxLines: null,
                            keyboardType: TextInputType.multiline,
                            decoration: InputDecoration(
                              hintText: 'Extend Damage',
                              hintStyle: TextStyle(color: Colors.grey),
                              border: OutlineInputBorder(
                                borderRadius: BorderRadius.circular(10),
                              ),
                            ),
                          ),
                        ),
                        SizedBox(height: 15),

                        Container(
                          padding: EdgeInsets.symmetric(horizontal: 25),
                          child: TextFormField(
                            maxLines: null,
                            keyboardType: TextInputType.multiline,
                            decoration: InputDecoration(
                              hintText: 'Third Party Details',
                              hintStyle: TextStyle(color: Colors.grey),
                              border: OutlineInputBorder(
                                borderRadius: BorderRadius.circular(10),
                              ),
                            ),
                          ),
                        ),
                        SizedBox(height: 20),

                        //Next Button
                        SizedBox(
                          height: 50.0,
                          width: double.infinity,
                          child: Padding(
                            padding: EdgeInsets.symmetric(horizontal: 95),
                            child: MYButton(
                              gsntext: 'Submit',
                              onPressed: () {
                                showDialog(
                                  context: context,
                                  builder: (BuildContext context) {
                                    return AlertDialog(
                                      title: Text('Confirmation'),
                                      content: Text(
                                          'Are you sure you want to submit?'),
                                      actions: [
                                        TextButton(
                                          onPressed: () {
                                            // User selected No
                                            Navigator.of(context).pop();
                                          },
                                          child: Text('No'),
                                        ),
                                        TextButton(
                                          onPressed: () {
                                            // User selected Yes
                                            Navigator.push(
                                              context,
                                              MaterialPageRoute(
                                                  builder: (context) =>
                                                      Submited()),
                                            );
                                          },
                                          child: Text('Yes'),
                                        ),
                                      ],
                                    );
                                  },
                                );
                              },
                            ),
                          ),
                        ),

                        SizedBox(height: 15),
                      ],
                    ),
                  ),
                  SizedBox(height: 10),
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
          ),
        ),
      ),
    );
  }
}
