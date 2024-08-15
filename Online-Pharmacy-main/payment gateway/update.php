<?php
include 'connect.php';
$email = $_GET['updateemail'];

$sql = "SELECT * FROM `payment` WHERE email='$email'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
$address = $row['address'];
$city = $row['city'];
$province = $row['province'];
$postalcode = $row['postalcode'];
$cardname = $row['cardname'];
$cardno = $row['cardno'];
$expmonth = $row['expmonth'];
$expyear = $row['expyear'];
$cvv = $row['cvv'];

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postalcode = $_POST['postalcode'];
    $cardname = $_POST['cardname'];
    $cardno = $_POST['cardno'];
    $expmonth = $_POST['expmonth'];
    $expyear = $_POST['expyear'];
    $cvv = $_POST['cvv'];

    $sql = "UPDATE `payment` SET name='$name', email='$email', address='$address', city='$city', province='$province', postalcode='$postalcode', cardname='$cardname', expmonth='$expmonth', expyear='$expyear', cvv='$cvv' WHERE email='$email'";

    $result = mysqli_query($con, $sql);

    if($result){
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body >

    <header>
        <div class="logo">
            <a href="index.html"><img src="image/purecare.png" alt="Pharmacy Logo"></a>
        </div>
        <div class="search-bar">
          <input type="text" placeholder="Search...">
          <button type="submit"><img src="image/search-icon.png" alt="Search"></button>
        </div>
        <div>
            <button class="add-prescription"><a href="prescription/prescription.html">Upload Prescription</a></button>
        </div>
        <div class="user-links">
          <a href="../../cart/cart.html"class = "cart"><img src="image/cart.png" alt="Cart"></a>
          <a href="../../LoginPage/Resgister.html" onclick="openLoginPopup()"><img src="image/login.png" alt="Login"></a>
        </div>
    </header>
        <nav>
            <ul>
            <li><a href="../../index.html">Home</a></li>
                <li><a href="../../medicine/COUGH.html">Medicine</a></li>
                <li><a href="../../OnlinePharmacy/MedicalD/new4/device.html">Medical Device</a></li>
                <li><a href="../../Wellness/bs/Beauty suppliment.html">Wellness</a></li>
                <li><a href="../../Personal Care/Body/bodycare.html">Personal Care</a></li>
                <li><a href="../../AboutUs/index.html">About Us</a></li>
            </ul>
        </nav>
  

<div class="container">

    <form method="post">

        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>

                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" placeholder="Enter the name" name="name" value=<?php echo$name; ?>>
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" placeholder="Enter email" name="email" value=<?php echo$email; ?>>
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" placeholder="room - street - locality" name="address"value=<?php echo$address; ?>>
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" placeholder="Enter city" name="city"value=<?php echo$city; ?>>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Province :</span>
                        <select name="province"value=<?php echo$province; ?>>
                            <option>Choose</option>
                            <option>Northen</option>
                            <option>North Central</option>
                            <option>North Western</option>
                            <option>Central</option>
                            <option>Eastern</option>
                            <option>Uva</option>
                            <option>Sabaragamuwa</option>
                            <option>Western</option>
                            <option>Southern</option>
                        </select>
                        
                    </div>
                    <div class="inputBox">
                        <span>Postal code :</span>
                        <input type="text" placeholder="******" name="postalcode"value=<?php echo$postalcode; ?>>
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="./image/Visa-Logo-1992.png" width="50">
                    <img src="./image/MasterCard_Logo.svg.png" width="50">
                    <img src="./image/897_paypal.jpg" width="50">
                    <img src="./image/pngtree-cash-on-delivery-order-logo-designs-png-image_3351055.jpg" width="50">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" placeholder="Enter the name" name="cardname"value=<?php echo$cardname; ?>>
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" placeholder="#### #### #### ####" name="cardno"value=<?php echo$cardno; ?>>
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <select class="month-input" name="expmonth"value=<?php echo$expmonth; ?>>
                        <option value="month" selected disabled>month</option>
                        <option value="01">01</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>  
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <select   class="year-input" name="expyear"value=<?php echo$expyear; ?>>
                            <option value="year" selected disabled>year</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="****" name="cvv"value=<?php echo$cvv; ?>>
                    </div>
                </div>

            </div>
    
        </div>
        <input type="submit" value="Payment Update" class="submit-btn" name="submit">
    </form>
</div>

<section class="newsletter">
    <h2>Subscribe to our Newsletter</h2>
    <form>
        <input type="email" placeholder="Enter your email address">
        <button type="submit" class="btn">Subscribe</button>
    </form>
</section>
<footer>
    <div class="footer-row">
      <div class="footer-column">
        <h3>Product Range</h3>
        <ul>
          <li>Health</li>
          <li>Body care</li>
          <li>Personal care</li>
          <li>Mother and baby</li>
          <li>Wellness</li>
          <li>Traditional Remedies</li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Information</h3>
        <ul>
          <li>About Us</li>
          <li>FAQ</li>
          <li>Contact Us</li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Contact Info</h3>
        <ul>
          <li>Address: No 77, Galaha Rd, Peradeniya, Kandy.</li>
          <li>Email: info@purecare.com</li>
          <li>Phone: +94 76 450 2288</li>
          <li>           +94 76 450 2285</li>
        </ul>
      </div>
      <div class="footer-column">
        <h3>Follow Us</h3>
        <ul class="social-media">
            <li><a href="#"><img src="image/facebook1.png" alt="Facebook"></a></li>
            <li><a href="#"><img src="image/twitter.png" alt="Twitter"></a></li>
            <li><a href="#"><img src="image/instagram.png" alt="Instagram"></a></li>
            <li><a href="#"><img src="image/whatapp.png" alt="WhatsApp"></a></li>
        </ul>
      </div>
    </div>
  </footer>
    
</body>
</html>