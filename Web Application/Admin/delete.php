<?php
    include 'connection.php';
    include 'login-check.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $stmt = $conn->prepare("DELETE from `login` where id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        echo '<script>
                    alert("User deleted successfully!");
                    window.history.go(-1);
                </script>';
        exit;
    }
?>