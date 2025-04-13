<?php

include "config.php";

// Get the token from the request header
$nic = mysqli_real_escape_string($connect, $_POST['nic']);
$token = mysqli_real_escape_string($connect, $_POST['token']);

// Query to check if the token exists
$query = "SELECT * FROM token WHERE token = '$token' AND nic = '$nic'";
$result = mysqli_query($connect, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Token is valid, fetch the user details using the NIC
    $userQuery = "SELECT * FROM customers WHERE nic = '$nic'";
    $userResult = mysqli_query($connect, $userQuery);

    if ($userResult && mysqli_num_rows($userResult) > 0) {
        // User details found, return the response as JSON
        $user = mysqli_fetch_assoc($userResult);
        header('Content-Type: application/json');
        echo json_encode($user);
    } else {
        // User details not found
        http_response_code(404); // Not Found status code
        echo json_encode(['error' => 'User not found']);
    }
} else {
    // Invalid token
    http_response_code(401); // Unauthorized status code
    echo json_encode(['error' => 'Unauthorized']);
}

// Close the database connection
mysqli_close($connect);

?>



