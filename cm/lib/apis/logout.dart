import 'package:http/http.dart' as http;
import 'package:flutter_secure_storage/flutter_secure_storage.dart';
import 'package:shared_preferences/shared_preferences.dart';

class LogoutApi {
  static Future<bool> logout(String token, String nic) async {
    try {
      // Make a POST request to the API endpoint
      final response = await http.post(
        Uri.parse('http://careu.live/api/logout_api.php'),
        body: {'token': token, 'nic': nic},
      );

      if (response.statusCode == 200) {
        // Logout successful
        final prefs = await SharedPreferences.getInstance();
        const secureStorage = FlutterSecureStorage();
        await prefs.remove('token');
        await secureStorage.delete(key: 'token');
        return true;
      } else {
        // Logout failed
        print('Logout failed with status code: ${response.statusCode}');
      }
    } catch (error) {
      // Error during API call
      print('Error: $error');
    }

    return false;
  }
}
