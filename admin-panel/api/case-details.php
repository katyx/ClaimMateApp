<?php

include "config.php";

// Get the token from the request header
$nic = mysqli_real_escape_string($connect, $_POST['nic']);
$token = mysqli_real_escape_string($connect, $_POST['token']);
$caseId = mysqli_real_escape_string($connect, $_POST['caseid']);

// Query to check if the token exists
$query = "SELECT * FROM token WHERE token = '$token' AND nic = '$nic'";
$result = mysqli_query($connect, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Token is valid, fetch the case details using the case ID
    $caseQuery = "SELECT * FROM `case` WHERE caseid = '$caseId'";
    $caseResult = mysqli_query($connect, $caseQuery);

    if ($caseResult && mysqli_num_rows($caseResult) > 0) {
        // Case details found
        $case = mysqli_fetch_assoc($caseResult);

        // Convert BLOB images to Base64-encoded strings
        $imageFields = ['img01', 'img02', 'img03', 'img04'];

        foreach ($imageFields as $imageField) {
            $imageBlob = $case[$imageField];
            $base64Image = base64_encode($imageBlob);
            $case[$imageField . '_base64'] = $base64Image;
            unset($case[$imageField]);
        }

        // Return the response as JSON
        header('Content-Type: application/json');
        echo json_encode($case);
    } else {
        // Case details not found
        http_response_code(404); // Not Found status code
        echo json_encode(['error' => 'Case not found']);
    }
} else {
    // Invalid token
    http_response_code(401); // Unauthorized status code
    echo json_encode(['error' => 'Unauthorized']);
}

// Close the database connection
mysqli_close($connect);

?>
