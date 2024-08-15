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

// Function to delete a newsletter by ID
function deleteNewsletter($id) {
    global $conn;
    $sql = "DELETE FROM newsletters WHERE email='$id'";
    
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['deleteNewsletter'])) {
        $newsletterId = $_POST['deleteNewsletter'];
        if (deleteNewsletter($newsletterId)) {
            header('Location: adminnews.html');
        } else {
            echo "Error deleting the newsletter.";
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>
