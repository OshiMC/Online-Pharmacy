<?php
session_start();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$cnumber = $_POST['cnumber'];
$streetadd = $_POST['streetadd'];
$city = $_POST['city'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

// Database connection
$conn = mysqli_connect("localhost", "root", "", "onlinepharmacy");
if($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, cnumber, streetadd, city, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sssisss", $firstname, $lastname, $email, $cnumber, $streetadd, $city, $password);
        $stmt->execute();

        // Store form data in session variables
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['email'] = $email;
        $_SESSION['cnumber'] = $cnumber;
        $_SESSION['streetadd'] = $streetadd;
        $_SESSION['city'] = $city;

        $stmt->close();

        // Redirect to admin.html
        header("Location: ../index.php");
        exit();
    } else {
        echo "Prepared statement error: " . $conn->error;
    }

    $conn->close();
}
?>
