<?php
include "config.php";

// Get the NIC and password from the request
$nic = mysqli_real_escape_string($connect, $_POST['nic']);
$password = mysqli_real_escape_string($connect, $_POST['password']);

// Query to check if the NIC and password match
$query = "SELECT * FROM `customers` WHERE `nic` = '$nic' AND `password` = '$password'";
$result = mysqli_query($connect, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // User login is successful
    $user = mysqli_fetch_assoc($result);

    // Generate a token
    $token = bin2hex(random_bytes(32));

    // Add the user record with the new token
    $userNIC = $user['nic'];
    $insertQuery = "INSERT INTO token VALUES ('$userNIC', '$token')";
    mysqli_query($connect, $insertQuery);

    // Prepare the response array
    $response = [
        'token' => $token,
        'nic' => $userNIC
    ];

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // NIC and password do not match
    http_response_code(401); // Unauthorized status code
    echo json_encode(['error' => 'Login failed']);
}

// Close the database connection
mysqli_close($connect);
?>
