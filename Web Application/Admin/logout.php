<?php
    
    include('connection.php');
    //Destroy Session
    session_destroy(); // This will destroy all the sessions in the page
    //unset($_SESSION['admin-user']); //unset the $_SESSION['user']

    //Redirect to Login Page
    mysqli_close($conn);
    header('location:login.php');
?>