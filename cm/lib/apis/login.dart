// ignore_for_file: unused_local_variable

import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:flutter_secure_storage/flutter_secure_storage.dart';
import 'package:shared_preferences/shared_preferences.dart';

class LoginService {
  static Future<String?> login(String nic, String password) async {
    final response = await http.post(
      Uri.parse('http://careu.live/api/login_api.php'),
      body: {'nic': nic, 'password': password},
    );

    if (response.statusCode == 200) {
      final data = jsonDecode(response.body);
      final token = data['token'];
      final prefs = await SharedPreferences.getInstance();
      const secureStorage = FlutterSecureStorage();
      await prefs.setString('token', token);
      await prefs.setString('nic', nic);
      await secureStorage.write(key: 'token', value: token);
      return token;
    } else {
      throw Exception('Login failed');
    }
  }

  static Future<bool> isLoggedIn() async {
    final prefs = await SharedPreferences.getInstance();
    final token = prefs.getString('token');
    return token != null;
  }

  static Future<String?> getNic() async {
    final prefs = await SharedPreferences.getInstance();
    final nic = prefs.getString('nic');
    return nic;
  }

  static Future fetchUserDetails() async {
    final prefs = await SharedPreferences.getInstance();
    final token = prefs.getString('token');

    final response = await http.get(
      Uri.parse('http://careu.live/api/user_details_api.php'),
      headers: {'Authorization': 'Bearer $token'},
    );
  }
}
