<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "onlinepharmacy");
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $account = $result->fetch_assoc();
            echo '<h3>Account Details</h3>';
            echo '<p><strong>First Name:</strong> ' . $account['firstname'] . '</p>';
            echo '<p><strong>Last Name:</strong> ' . $account['lastname'] . '</p>';
            echo '<p><strong>Phone Number:</strong> ' . $account['cnumber'] . '</p>';
            echo '<p><strong>Address:</strong> ' . $account['streetadd'] . ", " . $account['city'] . '</p>';
            echo '<p><strong>Password:</strong> ' . $account['password'] . '</p>';
        } else {
            echo '<p>No account found.</p>';
        }

        $stmt->close();
        $conn->close();
    }
}
?>
