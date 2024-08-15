<?php session_start(); ?>
<?php
    $newsletter = $_POST['newsletter'];
    
    //database connection

    $conn = mysqli_connect("localhost", "root", "", "newsletter");
    if($conn->connect_error)
    {
        die('connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("Insert into newsletter(newslettermail)
            values(?)");
        $stmt->bind_param("s", $newsletter);
        $stmt->execute();
        echo "Registration Successfull .........";
        $stmt->close();
        $conn->close();
    }
?>