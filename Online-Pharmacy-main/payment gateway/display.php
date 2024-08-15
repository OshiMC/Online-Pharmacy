
<?php
 include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>paymentDisplay</title>
    <link rel="stylesheet" href="CSS/display.css">
</head>
<body>
    <div class="container">
        <button class="btn-add"><a href="user.php">Add user</a> </button>
       
        <table class="table" >
  
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">Province</th>
      <th scope="col">Postal Code</th>
      <th scope="col">Name On Card</th>
      <th scope="col">Card Number</th>
      <th scope="col">Exp Month</th>
      <th scope="col">Exp Year</th>
      <th scope="col">CVV</th>
      <th scope="col">Operations</th>
    </tr>
    <tr>
        <?php
            $sql="select * from `payment`";
            $result=mysqli_query($con,$sql);

            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $name=$row['name'];
                    $email=$row['email'];
                    $address=$row['address'];
                    $city=$row['city'];
                    $province=$row['province'];
                    $postalcode=$row['postalcode'];
                    $cardname=$row['cardname'];
                    $cardno=$row['cardno'];
                    $expmonth=$row['expmonth'];
                    $expyear=$row['expyear'];
                    $cvv=$row['cvv'];
                    
                    echo ' <tr>
                              <td>'.$name.'</td>
                              <td>'.$email.'</td>
                              <td>'.$address.'</td>
                              <td>'.$city.'</td>
                              <td>'.$province.'</td>
                              <td>'.$postalcode.'</td>
                              <td>'.$cardname.'</td>
                              <td>'.$cardno.'</td>
                              <td>'.$expmonth.'</td>
                              <td>'.$expyear.'</td>
                              <td>'.$cvv.'</td>
                              <td>
                                  <button class="btn-up"><a href="update.php?updateemail='.$email.'">Update</a></button>
                                  <button  class="btn-del"><a href="delete.php?deleteemail='.$email.'">Delete</a></button>
                              </td>
                           </tr>';
                }
            }
        ?> 
</table>
    </div>
    
</body>
</html>