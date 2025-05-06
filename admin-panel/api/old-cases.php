<?php

include "config.php";

// Get the token from the request header
$nic = mysqli_real_escape_string($connect, $_POST['nic']);
$token = mysqli_real_escape_string($connect, $_POST['token']);

// Query to check if the token exists
$query = "SELECT * FROM token WHERE token = '$token' AND nic = '$nic'";
$result = mysqli_query($connect, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Token is valid, fetch the case details using the NIC
    $caseQuery = "SELECT vcl_no, caseid, date FROM `case` WHERE cstm_nic = '$nic'";
    $caseResult = mysqli_query($connect, $caseQuery);

    if ($caseResult && mysqli_num_rows($caseResult) > 0) {
        // case details found, create an array to store the details
        $cases = array();

        while ($row = mysqli_fetch_assoc($caseResult)) {
            $vehicleNumber = $row['vcl_no'];
            $caseid = $row['caseid'];
            $casedate = $row['date'];

            // Add the case details to the array
            $cases[] = array(
                'vcl_no' => $vehicleNumber,
                'caseid' => $caseid,
                'date' => $casedate
            );
        }

        // Return the cases details as JSON response
        header('Content-Type: application/json');
        echo json_encode($cases);
    } else {
        // No cases details found for the NIC
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