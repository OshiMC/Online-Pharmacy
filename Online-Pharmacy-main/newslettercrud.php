<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "onlinepharmacy";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to subscribe a user to the newsletter
function subscribeToNewsletter($email) {
    global $conn;
    $sql = "INSERT INTO newsletters (email) VALUES ('$email')";
    
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        if (subscribeToNewsletter($email)) {
            header('Location: index.php');
        } else {
            echo "Error subscribing to the newsletter.";
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>