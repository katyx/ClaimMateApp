<?php
    include 'connection.php';
    include 'login-check.php';

    if(isset($_GET['nic'])){
        $nic = $_GET['nic'];
        $stmt = $conn->prepare("DELETE from customers WHERE nic=?");
        $stmt->bind_param("i", $nic);
        $stmt->execute();
        $stmt->close();
        echo '<script>
                    alert("User deleted successfully!");
                    window.location.href = "customers.php";
                </script>';
        exit;
    }
?>