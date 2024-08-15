<?php
// create.php

$conn = mysqli_connect("localhost", "root", "", "onlinepharmacy");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $cnumber = $_POST["cnumber"];
    $streetadd = $_POST["streetadd"];
    $city = $_POST["city"];
    $password = $_POST["password"];

    $sql = "INSERT INTO users (firstname, lastname, email, cnumber, streetadd, city, password)
            VALUES ('$firstname', '$lastname', '$email', '$cnumber', '$streetadd', '$city', '$password')";

    if (mysqli_query($conn, $sql)) {
        header('location: admin_reg.html');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
