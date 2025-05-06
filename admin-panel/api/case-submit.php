<?php
include "config.php";

// Get the token from the request header
$nic = mysqli_real_escape_string($connect, $_POST['nic']);
$token = mysqli_real_escape_string($connect, $_POST['token']);

// Query to check if the token exists
$query = "SELECT * FROM token WHERE token = '$token' AND nic = '$nic'";
$result = mysqli_query($connect, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Token is valid, continue with case submission

    // Prepare the values for insertion
    $caseId = mysqli_real_escape_string($connect, $_POST['caseid']);
    $cstmNic = mysqli_real_escape_string($connect, $_POST['cstm_nic']);
    $cstmName = mysqli_real_escape_string($connect, $_POST['cstm_name']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);
    $claimNo = mysqli_real_escape_string($connect, $_POST['claim_no']);
    $coverNote = mysqli_real_escape_string($connect, $_POST['cover_note']);
    $debitOut = mysqli_real_escape_string($connect, $_POST['debit_out']);
    $location = mysqli_real_escape_string($connect, $_POST['location']);
    $date = mysqli_real_escape_string($connect, $_POST['date']);
    $time = mysqli_real_escape_string($connect, $_POST['time']);
    $causeDmg = mysqli_real_escape_string($connect, $_POST['cause_dmg']);
    $anyReason = mysqli_real_escape_string($connect, $_POST['any_reason']);
    $extendDmg = mysqli_real_escape_string($connect, $_POST['extend_dmg']);
    $vclNo = mysqli_real_escape_string($connect, $_POST['vcl_no']);
    $drvrNic = mysqli_real_escape_string($connect, $_POST['drvr_nic']);
    $drvrLno = mysqli_real_escape_string($connect, $_POST['drvr_lno']);
    $categories = mysqli_real_escape_string($connect, $_POST['categories']);
    $expiryDate = mysqli_real_escape_string($connect, $_POST['expiry_date']);
    $fullname = mysqli_real_escape_string($connect, $_POST['fullname']);
    $address = mysqli_real_escape_string($connect, $_POST['address']);
    $mobno = mysqli_real_escape_string($connect, $_POST['mobno']);
    $thirdparty = mysqli_real_escape_string($connect, $_POST['thirdparty']);
    $img01 = mysqli_real_escape_string($connect, $_POST['img01']);

    $base64Image = str_replace(' ', '+', $img01);
    $base64Image = preg_replace('/\s+/', '', $base64Image);
    // Decode the Base64 string
    $decodedData1 = base64_decode($base64Image);


    // Prepare the SQL query with the submitted values
    $insertQuery = "INSERT INTO `case` (`caseid`, `cstm_nic`, `cstm_name`, `status`, `claim_no`, `cover_note`, `debit_out`, `location`, `date`, `time`, `cause_dmg`, `any_reason`, `extend_dmg`, `vcl_no`, `drvr_nic`, `drvr_lno`, `categories`, `expiry_date`, `fullname`, `address`, `mobno`, `thirdparty`, `img01`) 
                    VALUES ('$caseId', '$cstmNic', '$cstmName', '$status', '$claimNo', '$coverNote', '$debitOut', '$location', '$date', '$time', '$causeDmg', '$anyReason', '$extendDmg', '$vclNo', '$drvrNic', '$drvrLno', '$categories', '$expiryDate', '$fullname', '$address', '$mobno', '$thirdparty', '$decodedData1')";

    $insertResult = mysqli_query($connect, $insertQuery);

    if ($insertResult) {
        // Case submitted successfully
        http_response_code(200); // OK status code
        echo json_encode(['message' => 'Case submitted successfully']);
    } else {
        // Failed to submit the case
        http_response_code(500); // Internal Server Error status code
        echo json_encode(['error' => 'Failed to submit the case: ' . mysqli_error($connect)]);
    }
} else {
    // Invalid token
    http_response_code(401); // Unauthorized status code
    echo json_encode(['error' => 'Unauthorized']);
}

// Close the database connection
mysqli_close($connect);
?>
