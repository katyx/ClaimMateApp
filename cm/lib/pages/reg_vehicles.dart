import 'package:cm/pages/contact_us.dart';
import 'package:cm/pages/vehicle_details.dart';
import 'package:flutter/material.dart';

class RegVehicles extends StatelessWidget {
  RegVehicles({super.key});

  // Sample vehicle data
  final List<VehicleData> vehicleDataList = [
    VehicleData('WP BEA-1622', 'Honda', 'Dio'),
    VehicleData('WP CAB-3716', 'Toyota', 'Camry'),
    VehicleData('WP CBE-3716', 'Ford', 'Mustang'),
    VehicleData('WP CBK-7516', 'Chevrolet', 'Cruze'),
  ];

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
                          'Reg. Vehicles',
                          style: TextStyle(
                            color: Colors.black,
                            fontWeight: FontWeight.bold,
                            fontSize: 22,
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
                  const SizedBox(height: 20),
                  ListView.builder(
                    shrinkWrap: true,
                    physics: const NeverScrollableScrollPhysics(),
                    itemCount: vehicleDataList.length,
                    itemBuilder: (context, index) {
                      VehicleData vehicleData = vehicleDataList[index];

                      return Padding(
                        padding: const EdgeInsets.symmetric(
                          horizontal: 20,
                          vertical: 10,
                        ),
                        child: Container(
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
                          child: Stack(
                            children: [
                              Column(
                                children: [
                                  const SizedBox(height: 30),
                                  Padding(
                                    padding: const EdgeInsets.fromLTRB(
                                        40, 0, 22, 30),
                                    child: Row(
                                      mainAxisAlignment:
                                          MainAxisAlignment.center,
                                      children: [
                                        const Expanded(
                                          child: Column(
                                            crossAxisAlignment:
                                                CrossAxisAlignment.start,
                                            children: [
                                              Text(
                                                'Vehicle No.',
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
                                            ],
                                          ),
                                        ),
                                        const Expanded(
                                          child: Column(
                                            crossAxisAlignment:
                                                CrossAxisAlignment.start,
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
                                            ],
                                          ),
                                        ),
                                        Expanded(
                                          child: Column(
                                            crossAxisAlignment:
                                                CrossAxisAlignment.start,
                                            children: [
                                              Text(
                                                vehicleData.vehicleNo,
                                                style: const TextStyle(
                                                  fontWeight: FontWeight.bold,
                                                ),
                                              ),
                                              const SizedBox(height: 20),
                                              Text(
                                                vehicleData.vehicleMake,
                                                style: const TextStyle(
                                                  fontWeight: FontWeight.bold,
                                                ),
                                              ),
                                              const SizedBox(height: 20),
                                              Text(
                                                vehicleData.vehicleModel,
                                                style: const TextStyle(
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
                                ],
                              ),
                              Positioned(
                                bottom: 0,
                                right: 10,
                                child: Align(
                                  alignment: Alignment.bottomRight,
                                  child: TextButton(
                                    onPressed: () {
                                      Navigator.push(
                                        context,
                                        MaterialPageRoute(
                                            builder: (context) =>
                                                const VehicleDetails()),
                                      );
                                    },
                                    child: const Text(
                                      'More Details',
                                      style: TextStyle(
                                        color: Colors.blue,
                                        fontSize: 12,
                                      ),
                                    ),
                                  ),
                                ),
                              ),
                            ],
                          ),
                        ),
                      );
                    },
                  ),
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
                  const SizedBox(height: 20),
                ],
              ),
            ),
          ),
        ),
      ),
    );
  }
}

class VehicleData {
  final String vehicleNo;
  final String vehicleMake;
  final String vehicleModel;

  VehicleData(this.vehicleNo, this.vehicleMake, this.vehicleModel);
}
