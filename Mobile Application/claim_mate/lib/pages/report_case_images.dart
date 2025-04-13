import 'dart:io';

import 'package:claim_mate/components/button.dart';
import 'package:claim_mate/pages/report_case_case.dart';
import 'package:flutter/material.dart';
import 'package:image_picker/image_picker.dart';

class ReportCaseImages extends StatefulWidget {
  const ReportCaseImages({Key? key}) : super(key: key);

  @override
  State<ReportCaseImages> createState() => _ReportCaseImagesState();
}

class _ReportCaseImagesState extends State<ReportCaseImages> {
  List<File> imageFiles = [];
  List<String> imageFileNames = [];

  Future<void> selectImage() async {
    if (imageFiles.length >= 4) {
      // Maximum number of images reached
      return;
    }

    final picker = ImagePicker();
    final pickedImage = await picker.getImage(source: ImageSource.gallery);

    if (pickedImage != null) {
      setState(() {
        File file = File(pickedImage.path);
        imageFiles.add(file);
        imageFileNames.add(file.path.split('/').last);
      });
    }
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
                              builder: (context) => ReportCaseCase()),
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
                          ' Upload Images',
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
                  SizedBox(height: 60),
                  Container(
                    height: 475,
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
                        SizedBox(height: 20),

                        TextButton(
                          onPressed: selectImage,
                          style: TextButton.styleFrom(
                            backgroundColor: Colors.blue,
                            padding: EdgeInsets.all(10),
                            shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(10),
                            ),
                          ),
                          child: Text(
                            'Upload Image',
                            style: TextStyle(
                              color: Colors.white,
                              fontSize: 16,
                            ),
                          ),
                        ),

                        SizedBox(height: 20),

                        //display the uploaded images
                        GridView.builder(
                          shrinkWrap: true,
                          physics: NeverScrollableScrollPhysics(),
                          gridDelegate:
                              SliverGridDelegateWithFixedCrossAxisCount(
                            crossAxisCount: 2,
                            crossAxisSpacing: 10,
                            mainAxisSpacing: 10,
                          ),
                          itemCount: imageFiles.length,
                          itemBuilder: (context, index) {
                            File file = imageFiles[index];
                            String fileName = imageFileNames[index];

                            // Display uploaded images with remove icon
                            return Stack(
                              children: [
                                Column(
                                  children: [
                                    Image.file(
                                      file,
                                      width: 100,
                                      height: 100,
                                      fit: BoxFit.cover,
                                    ),
                                    SizedBox(height: 5),
                                    Text(
                                      fileName,
                                      style: TextStyle(
                                        fontSize: 12,
                                      ),
                                      textAlign: TextAlign.center,
                                    ),
                                  ],
                                ),
                                Positioned(
                                  top: 5,
                                  right: 5,
                                  child: IconButton(
                                    icon: Icon(
                                      Icons.remove_circle,
                                      color: Colors.red,
                                      size: 20,
                                    ),
                                    onPressed: () {
                                      setState(() {
                                        imageFiles.removeAt(index);
                                        imageFileNames.removeAt(index);
                                      });
                                    },
                                  ),
                                ),
                              ],
                            );
                          },
                        ),

                        SizedBox(height: 20),
                      ],
                    ),
                  ),
                  SizedBox(height: 30),
                  SizedBox(
                    height: 50.0,
                    width: double.infinity,
                    child: Padding(
                      padding: EdgeInsets.symmetric(horizontal: 95),
                      child: MYButton(
                        gsntext: 'Next',
                        onPressed: () {
                          if (imageFiles.length >= 3) {
                            print('Next!');
                          } else {
                            showDialog(
                              context: context,
                              builder: (context) => AlertDialog(
                                title: Text('Error'),
                                content:
                                    Text('Please upload at least 3 images.'),
                                actions: [
                                  TextButton(
                                    onPressed: () {
                                      Navigator.of(context).pop();
                                    },
                                    child: Text('OK'),
                                  ),
                                ],
                              ),
                            );
                          }
                        },
                      ),
                    ),
                  ),
                  SizedBox(height: 40),
                  TextButton(
                    onPressed: () {
                      print('Need Help!');
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
