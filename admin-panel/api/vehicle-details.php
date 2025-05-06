<?php

include "config.php";

// Get the token from the request header
$nic = mysqli_real_escape_string($connect, $_POST['nic']);
$token = mysqli_real_escape_string($connect, $_POST['token']);
$vehicleNumber = mysqli_real_escape_string($connect, $_POST['vcl_no']);

// Query to check if the token exists
$query = "SELECT * FROM token WHERE token = '$token' AND nic = '$nic'";
$result = mysqli_query($connect, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Token is valid, fetch the vehicle details using the NIC
    $vehicleQuery = "SELECT * FROM vehicles WHERE vcl_no = '$vehicleNumber'";
    $vehicleResult = mysqli_query($connect, $vehicleQuery);

    if ($vehicleResult && mysqli_num_rows($vehicleResult) > 0) {
        // vehicle details found, return the response as JSON
        $vehicle = mysqli_fetch_assoc($vehicleResult);
        header('Content-Type: application/json');
        echo json_encode($vehicle);
    } else {
        // vehicle details not found
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