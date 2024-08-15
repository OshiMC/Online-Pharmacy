<?php

$con=new mysqli('localhost','root','','onlinepharmacy');

if(!$con){
    die (mysqli_error($con));
}
?>