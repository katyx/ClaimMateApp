<?php
    session_start(); 
   
    $server = 'localhost';
    $username = 'id20747387_admin';
    $password = 'sh3#1Bd1JR9$';
    $db_name = 'id20747387_care_u';

    $conn = new mysqli($server, $username, $password, $db_name);
    if($conn->connect_error){
        die("Connection Fail" .$conn->connect_error);
    }
    echo("")
?>