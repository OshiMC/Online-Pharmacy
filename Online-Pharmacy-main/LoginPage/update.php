<?php
// update.php

$conn = mysqli_connect("localhost", "root", "", "onlinepharmacy");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve updated data from form fields
    $email = $_POST["email"];
    $newFirstName = $_POST["newFirstName"];
    $newLastName = $_POST["newLastName"];

    // Construct and execute the SQL UPDATE statement
    $sql = "UPDATE users SET firstname='$newFirstName', lastname='$newLastName' WHERE email='$email'";

    if (mysqli_query($conn, $sql)) {
        header('location: admin_reg.html');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
