<?php

include "config.php";

// Get the token from the request
$token = mysqli_real_escape_string($connect, $_POST['token']);
$nic = mysqli_real_escape_string($connect, $_POST['nic']);

// Delete the token from the secure storage 
$deleteTokenQuery = "DELETE FROM `token` WHERE `token` = '$token' AND `nic` = '$nic'";
$deleteTokenResult = mysqli_query($connect, $deleteTokenQuery);

if ($deleteTokenResult) {
    // Logout successful
    echo "Logout successful";
} else {
    // Failed to delete the token
    echo "Logout failed";
}

// Close the database connection
mysqli_close($connect);
?>
