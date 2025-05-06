<?php
include "config.php";

// Handle GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT * FROM customers";
    $results = mysqli_query($connect, $query);

    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            echo "ID: " . $row['id'] . ", Name: " . $row['name'] . ", Email: " . $row['email'] . "<br>";
        }
    } else {
        echo "No results found";
    }
}
// Handle PUT request
else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $putData);
    $id = mysqli_real_escape_string($connect, $putData['id']);
    $name = mysqli_real_escape_string($connect, $putData['name']);
    $email = mysqli_real_escape_string($connect, $putData['email']);

    $query = "UPDATE customers SET name = '$name', email = '$email' WHERE id = '$id'";
    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "Data updated successfully";
    } else {
        echo "Failed to update data";
    }
}

mysqli_close($connect);
?>
