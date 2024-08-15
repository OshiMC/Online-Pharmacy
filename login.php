<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        if (validateCredentials($email, $password)) {
            $_SESSION['email'] = $email;
            header('Location: index.php');
            exit();
        } else {
            echo "<script>alert('Invalid email or password');</script>";
        }
    } else {
        echo "<script>alert('Email and password are required');</script>";
    }
}

function validateCredentials($email, $password) {
    // Connect database to pharmacy
    $conn = mysqli_connect("localhost", "root", "", "onlinepharmacy");

    //check if the user exists
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        $storedPassword = $user['password'];

        // Verify the password from users table
        if ($password === $storedPassword) {
            return true;
        }
    }

    // Credentials are invalid
    return false;
}
?>
