import 'package:claim_mate/apis/login.dart';
import 'package:claim_mate/components/button.dart';
import 'package:claim_mate/pages/contact_us.dart';
import 'package:claim_mate/pages/dashboard.dart';
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';

class LoginPage extends StatefulWidget {
  const LoginPage({Key? key}) : super(key: key);

  @override
  State<LoginPage> createState() => _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {
  TextEditingController _nicController = TextEditingController();
  TextEditingController _passwordController = TextEditingController();

  @override
  void initState() {
    super.initState();
    _checkAutoLogin();
  }

  void _checkAutoLogin() async {
    bool isLoggedIn = await LoginService.isLoggedIn();

    if (isLoggedIn) {
      // User is already logged in, retrieve NIC and token
      final prefs = await SharedPreferences.getInstance();
      final token = prefs.getString('token');
      final nic = prefs.getString('nic');

      if (token != null && nic != null) {
        // Navigate to the dashboard with the stored NIC and token
        Navigator.pushReplacement(
          context,
          MaterialPageRoute(
            builder: (context) => DashboardScreen(token: token, nic: nic),
          ),
        );
      }
    }
  }

  void _login() async {
    String nic = _nicController.text;
    String password = _passwordController.text;

    if (nic.isEmpty || password.isEmpty) {
      // At least one field is empty, show an error message
      showDialog(
        context: context,
        builder: (context) => AlertDialog(
          title: Text('Login Failed'),
          content: Text('Please fill in all the fields.'),
          actions: [
            TextButton(
              onPressed: () => Navigator.pop(context),
              child: Text('OK'),
            ),
          ],
        ),
      );
    } else {
      try {
        // Perform the login process
        String? token = await LoginService.login(nic, password);

        if (token != null) {
          // Login successful, navigate to the dashboard
          Navigator.pushReplacement(
            context,
            MaterialPageRoute(
              builder: (context) => DashboardScreen(nic: nic, token: token),
            ),
          );
        }
      } catch (e) {
        // Exception occurred during login, show an error message
        showDialog(
          context: context,
          builder: (context) => AlertDialog(
            title: Text('Login Failed'),
            content: Text('Provide correct NIC and password.'),
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
  }

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
                const SizedBox(height: 125),

                //Logo
                Image.asset(
                  'lib/images/careulogo.png',
                  width: 340,
                ),

                const SizedBox(height: 90),

                //NIC
                SizedBox(
                  height: 50.0,
                  child: Padding(
                    padding: EdgeInsets.symmetric(horizontal: 30),
                    child: TextFormField(
                      controller: _nicController,
                      decoration: InputDecoration(
                        filled: true,
                        fillColor: Colors.white38,
                        hintText: 'NIC',
                        hintStyle: const TextStyle(color: Colors.grey),
                        border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(10),
                        ),
                      ),
                    ),
                  ),
                ),

                SizedBox(height: 10),

                //Password
                SizedBox(
                  height: 50.0,
                  child: Padding(
                    padding: EdgeInsets.symmetric(horizontal: 30),
                    child: TextFormField(
                      controller: _passwordController,
                      obscureText: true,
                      decoration: InputDecoration(
                        filled: true,
                        fillColor: Colors.white38,
                        hintText: 'Password',
                        hintStyle: const TextStyle(color: Colors.grey),
                        border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(10),
                        ),
                      ),
                    ),
                  ),
                ),

                const SizedBox(height: 240),

                //Sign In Button
                SizedBox(
                  height: 50.0,
                  width: double.infinity,
                  child: Padding(
                    padding: EdgeInsets.symmetric(horizontal: 35),
                    child: MYButton(
                      gsntext: 'Sign In',
                      onPressed: () async {
                        _login();
                      },
                    ),
                  ),
                ),

                TextButton(
                  onPressed: () {
                    Navigator.push(
                      context,
                      MaterialPageRoute(builder: (context) => ContactUs()),
                    );
                  },
                  child: const Text.rich(
                    TextSpan(
                      text: 'Trouble to login? ',
                      style: TextStyle(
                        color: Colors.black54,
                      ),
                      children: [
                        TextSpan(
                          text: 'Contact Us.',
                          style: TextStyle(
                            fontWeight: FontWeight.w900,
                          ),
                        ),
                      ],
                    ),
                  ),
                ),
              ],
            ),
          )),
        ),
      ),
    );
  }
}
