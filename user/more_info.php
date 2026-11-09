<?php

session_start();

include("connection.php");

$current_time = date("M d, Y H:i:s");



if (isset($_COOKIE['uuid'])) {

     $u_uname = mysqli_real_escape_string($link, $_COOKIE['uuid']);

} else {

    $u_uname = '';

}



 $sql4q = "SELECT * FROM otp WHERE uuid='$u_uname' AND status='verified'";

$result4q = mysqli_query($link, $sql4q);

if ($result4q->num_rows > 0) {

    while ($row4q = $result4q->fetch_assoc()) {

         $u_uname = mysqli_real_escape_string($link, $row4q['user_id']);

         $otp = mysqli_real_escape_string($link, $row4q['otp']);



    }

} else {

    header("location:logout.php");

    exit;

}

$oid=$_GET['oid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Bharari" />
    <meta name="keywords" content="Bharari" />
    <meta name="author" content="Bharari" />
    <link rel="manifest" href="../manifest.json" />

    <link rel="icon" href="logo.png" type="image/x-icon" />
    <title>Bharari App</title>
    <link rel="apple-touch-icon" href="logo.png" />
    <meta name="theme-color" content="#0b53bf" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="Bharari" />
    <meta name="msapplication-TileImage" content="logo.png" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- font link -->
    <link rel="stylesheet" href="../assets/css/vendors/metropolis.min.css" />

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/remixicon.css" />

    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/swiper-bundle.min.css" />

    <!-- bootstrap css -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="../assets/css/vendors/bootstrap.min.css" />

    <!-- Theme css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="../assets/css/style.css" />
    
    <style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
} 

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #e9ecef00;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
</head>

<body class="grocery-color">
    <!-- side bar start -->
     <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <a href="landing.php">
          <i class="ri-arrow-left-s-line"></i>
        </a>
        <h2>Home</h2>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- Add Cart section start -->
  <section>
    <div class="custom-container">
     
       <div class="row">
                        <div class="col-lg-12">
                            <div class="sg-table sa-box">
                                <div class="table-responsive">
                      
                               <table class="table">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Amount</th>
            <th>Qty</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sql51 = "SELECT * FROM cart WHERE order_id='$oid' ORDER BY id DESC";
        $result51 = mysqli_query($link, $sql51);

        $grand_total = 0; // initialize total

        if ($result51->num_rows > 0) {
            while ($row51 = $result51->fetch_assoc()) {
                $grand_total += $row51['total']; // accumulate total
        ?>
            <tr>
                <td><?php echo $row51['product_name']; ?></td>
                <td><?php echo number_format($row51['total'], 2); ?></td>
                <td><?php echo $row51['quantity']; ?></td>
                <td><?php echo $row51['date']; ?></td>
            </tr>
        <?php
            }
            // Show total row
            echo "
            <tr>
                <td colspan='1'><strong>Total</strong></td>
                <td><strong>" . number_format($grand_total, 2) . "</strong></td>
                <td colspan='2'></td>
            </tr>";
        } else {
            echo "<tr><td colspan='5' style='color:red;'>Data Not Found</td></tr>";
        }
        ?>
    </tbody>
</table>
 
                                </div> 
                            </div>                           
                        </div>
                         
                        </div>
        

    </div>
  </section>
  
  <br><br><br><br>
  <!-- Add Cart section end -->


  <!-- delivery address section end -->

  <!-- pay popup start -->
  <!--<div class="pay-popup" style="margin-bottom:100px !important;">-->
  <!--  <div class="price-items">-->
  <!--    <h3>$18</h3>-->
  <!--    <h6>2 item Added</h6>-->
  <!--  </div>-->
  <!--  <a href="address.php" class="btn theme-btn pay-btn mt-0">Pay Now</a>-->
  <!--</div>-->
  <!-- pay popup end -->

  <!-- bootstrap js -->
  
   <div class="navbar-menu">
        <ul>
            <li>
                <a href="landing.php" class="icon logo">
                    <img class=" img-fluid" src="../assets/images/svg/home.svg" alt="logo" />
                    
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="categories.php" class="icon">
                    <img src="../assets/images/svg/dashboard.svg" alt="food" />
                    
                    <span>Category</span>
                </a>
            </li>
            <li>
                <a href="grocery-home.php?main_cat=women special" class="icon">

                    <img class="unactive" src="../assets/images/svg/grocery.svg" alt="grocery" />
                   
                    <span>Womens Special</span>
                </a>
            </li>

            <li class="active">
                <a href="cart.php" class="icon">

                    <img class="unactive" src="../assets/images/svg/cart.svg" alt="pharmacy" />
                    <img class="active" src="../assets/images/svg/cart-fill.svg" alt="pharmacy" />
                    <span>Cart</span>
                </a>
            </li>
            <li> 
                <a href="profile.php" class="icon">

                    <img class="unactive" src="../assets/images/svg/user.svg" alt="user" />
                    <img class="active" src="../assets/images/svg/user-fill.svg" alt="user" />
                    <span class="active">You</span>
                </a>
            </li>
        </ul>
    </div>
  <!-- bottom navbar start -->
    <div class="navbar-menu">
        <ul>
            <li class="active">
                <a href="landing.php" class="icon logo">
                    <img class=" img-fluid unactive" src="../assets/images/svg/home.svg" alt="logo" />
                     <img class="active" src="../assets/images/svg/home-fill.svg" alt="grocery" />
                    <span>Home</span>
                </a>
            </li> 
            <li>
                <a href="categories.php" class="icon">
                    <img class="unactive" src="../assets/images/svg/dashboard.svg" alt="food" />
                    
                    <span>Category</span>
                </a>
            </li>
            <li>
                <a href="grocery-home.php" class="icon">

                    <img class="unactive" src="../assets/images/svg/grocery.svg" alt="grocery" />
                   
                    <span>Reward</span>
                </a>
            </li>

            <li>
                <a href="cart.php" class="icon">

                    <img class="unactive" src="../assets/images/svg/cart.svg" alt="pharmacy" />
                    <img class="active" src="../assets/images/svg/cart-fill.svg" alt="pharmacy" />
                    <span>Cart</span>
                </a>
            </li>
            <li> 
                <a href="profile.php" class="icon">

                    <img class="unactive" src="../assets/images/svg/user.svg" alt="user" />
                    <img class="active" src="../assets/images/svg/user-fill.svg" alt="user" />
                    <span class="active">You</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- bottom navbar end -->
<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
    <!-- bootstrap js -->
    <script src="../assets/js/bootstrap.bundle.min.js">
    </script>

    <!-- swiper js -->
    <script src="../assets/js/swiper-bundle.min.js"> </script>
    <script src="../assets/js/custom-swiper.js"> </script>

    <!-- script js -->
    <script src="../assets/js/script.js">
    </script>
</body>

</html>