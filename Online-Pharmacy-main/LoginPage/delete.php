<?php
// delete.php

$conn = mysqli_connect("localhost", "root", "", "onlinepharmacy");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle record deletion
if (isset($_POST["email"])) {
    $email = $_POST["email"];

    // Construct and execute the SQL DELETE statement
    $sql = "DELETE FROM users WHERE email='$email'";

    if (mysqli_query($conn, $sql)) {
        header('location: admin_reg.html');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
