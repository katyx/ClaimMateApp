<?php
    $username="id20747387_admin";
    $password="sh3#1Bd1JR9$"; 
    $host="localhost";
    $db_name="id20747387_care_u"; 


    $connect=mysqli_connect($host,$username,$password,$db_name);


    if(!$connect)
    {
        echo json_encode("Connection Failed");
    }
?>