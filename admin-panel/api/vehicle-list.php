<?php

include "config.php";

// Get the token from the request header
$nic = mysqli_real_escape_string($connect, $_POST['nic']);
$token = mysqli_real_escape_string($connect, $_POST['token']);

// Query to check if the token exists
$query = "SELECT * FROM token WHERE token = '$token' AND nic = '$nic'";
$result = mysqli_query($connect, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Token is valid, fetch the vehicle details using the NIC
    $vehicleQuery = "SELECT vcl_no FROM vehicles WHERE nic = '$nic'";
    $vehicleResult = mysqli_query($connect, $vehicleQuery);

    if ($vehicleResult && mysqli_num_rows($vehicleResult) > 0) {
        // Vehicle details found, create an array to store the details
        $vehicles = array();

        while ($row = mysqli_fetch_assoc($vehicleResult)) {
            $vehicleNumber = $row['vcl_no'];

            // Add the vehicle details to the array
            $vehicles[] = array(
                'vcl_no' => $vehicleNumber,
            );
        }

        // Return the vehicle details as JSON response
        header('Content-Type: application/json');
        echo json_encode($vehicles);
    } else {
        // No vehicle details found for the NIC
        http_response_code(404); // Not Found status code
        echo json_encode(['error' => 'No vehicles found for the NIC']);
    }
} else {
    // Invalid token
    http_response_code(401); // Unauthorized status code
    echo json_encode(['error' => 'Unauthorized']);
}

// Close the database connection
mysqli_close($connect);

?>
