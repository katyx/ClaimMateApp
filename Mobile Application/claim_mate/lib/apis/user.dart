import 'dart:convert';
import 'package:http/http.dart' as http;

class UserDetailsService {
  static Future<Map<String, dynamic>> getUserDetails(String token, String nic) async {
    final response = await http.get(
      Uri.parse('http://careu.live/api/user-profile.php?nic=$nic'),
      headers: {'Authorization': 'Bearer $token'},
    );

    if (response.statusCode == 200) {
      return jsonDecode(response.body) as Map<String, dynamic>;
    } else {
      throw Exception('Failed to fetch user details');
    }
  }
}

