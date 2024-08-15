<?php

use LDAP\Result;

include 'connect.php';

if (isset($_GET['deleteemail'])){
    $email = $_GET['deleteemail'];
    $sql = "DELETE FROM `payment` WHERE email='$email'";
    $result = mysqli_query($con, $sql);

    if($result){
        //echo "Delete successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}

?>