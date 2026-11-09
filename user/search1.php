<?php
session_start();

include("connection.php");

$current_time = date("M d, Y H:i:s");



if (isset($_COOKIE['uuid'])) {

    $u_uname = mysqli_real_escape_string($link, $_COOKIE['uuid']);

}
else {

    $u_uname = '';

}


// if (isset($_COOKIE['city'])) {

//     $city = mysqli_real_escape_string($link, $_COOKIE['city']);



// }
// else {

//     $city = '';

// }


$sql4q = "SELECT * FROM otp WHERE uuid='$u_uname' AND status='verified'";

$result4q = mysqli_query($link, $sql4q);

if ($result4q->num_rows > 0) {

    while ($row4q = $result4q->fetch_assoc()) {

        $u_uname = mysqli_real_escape_string($link, $row4q['user_id']);

        $otp = mysqli_real_escape_string($link, $row4q['otp']);



    }

}
else {

    header("location:logout.php");

    exit;

}

$search=$_POST['search'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Agrovita" />
    <meta name="keywords" content="Agrovita" />
    <meta name="author" content="Agrovita" />
    <link rel="manifest" href="../manifest.json" />

    <link rel="icon" href="logo.png" type="image/x-icon" />
    <title>Agrovita App</title>
    <link rel="apple-touch-icon" href="logo.png" />
    <meta name="theme-color" content="#0b53bf" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="Agrovita" />
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
    <div class="offcanvas sidebar-offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft">
        <div class="offcanvas-header">
            <img class="img-fluid profile-pic" src="logo.png" alt="profile" />
            <h3>Restaurant</h3>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="sidebar-content">
                <ul class="link-section">
                    
                     <li>
                        <a href="categories.php" class="pages">
                            <h3>All Categories</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                     <li>
                        <a href="profile.php" class="pages">
                            <h3>Your Profile</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                     <li>
                        <a href="mailto:help@agrovita.com" class="pages">
                            <h3>help@agrovita.com</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                    <li>
                        <a href="refund.php" class="pages">
                            <h3>Refund Policy</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                     <li>
                        <a href="terms.php" class="pages">
                            <h3>Terms & Conditions</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                    <li>
                        <a href="about.php" class="pages">
                            <h3>About</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                   
                    <li>
                        <a href="login.php" class="pages">
                            <h3>Logout</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- side bar end -->

    <!-- header start -->
    <header class="section-t-space">
        <div class="custom-container">
            <div class="header">
                <div class="head-content">
                    <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasLeft">
                        <i class="ri-menu-line"></i>
                    </button>
                    <div class="header-location">
                         <img src="logo.png" style="width:100px;">
                        <!--<a href="#location" data-bs-toggle="modal">-->
                        <!--    <h2>Ontario, Canada</h2>-->
                        <!--    <i class="ri-arrow-down-s-line d-arrow"></i>-->
                        <!--</a>-->
                    </div>
                </div>
                <a href="#">
                    <i class="ri-notification-2-fill"></i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- search section starts -->
    <section class="search-section">
        <div class="custom-container">
            <form class="auth-form search-head" action="search1.php" method="post">
                <div class="form-group">
                    <div class="form-input">
                        <input type="search" class="form-control search" id="inputusername"
                            placeholder="Restaurant, item & more" />
                        <i class="ri-search-line search-icon"></i>
                    </div>

                    <button type="submit" class="btn filter-button mt-0">
                        <i class="ri-search-line search-icon"></i>
                    </button>
                </div>
            </form>
        </div>
    </section>
    <!-- search section end -->

    <!-- banner section start -->
    <section class="banner-section section-t-space">
    <div class="custom-container">
    <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="../assets/images/banner/banner1.png" style="width:100%">
  
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="../assets/images/banner/banner2.png" style="width:100%">
  
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="../assets/images/banner/banner3.png" style="width:100%">
  <!--<div class="text">Caption Three</div>-->
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

   
     <!--<div class="swiper banner1">-->
     <!--   <div class="swiper-wrapper">-->
     <!--     <div class="swiper-slide">-->
     <!--       <img class="img-fluid banner-img" src="../assets/images/banner/banner1.png" alt="banner1" />-->
     <!--     </div>-->

     <!--     <div class="swiper-slide">-->
     <!--       <div class="home-banner2">-->
     <!--         <img class="img-fluid banner-img" src="../assets/images/banner/banner2.png" alt="banner2" />-->
     <!--       </div>-->
     <!--     </div>-->

     <!--     <div class="swiper-slide">-->
     <!--       <img class="img-fluid banner-img" src="../assets/images/banner/banner3.png" alt="banner3" />-->
     <!--     </div>-->
     <!--     <div class="swiper-pagination"></div>-->
     <!--   </div>-->
     <!-- </div>-->
    </div>
  </section>

  <!-- banner section end -->

   
 <!--<section class="categories section-lg-b-space" style="margin-bottom:10px;">
    <div class="custom-container" style="margin-bottom:100px !important;">
          <div class="title mb-5">
                <h3 class="mt-0">Category</h3>
              
            </div>
      <div class="row gy-5 ratio_square">
          
          <?php

$sql4 = "SELECT * FROM category";

$result4 = mysqli_query($link, $sql4);

if ($result4->num_rows > 0) {

    while ($row4 = $result4->fetch_assoc()) {

          ?>
          
          
        <div class="col-4">
          <a href="sub_cat.php?main_id=<?php echo $row4['category_name']; ?>">
            <div class="food-categories food">
              <img class="img-fluid categories-img" src="uploads/<?php echo $row4['image']; ?>" alt="<?php echo $row4['category_name']; ?>" />
            </div>
            <h6><?php echo $row4['category_name']; ?></h6> 
          </a>
        </div>

          <?php
          
    }

}
else {



}
?>		
       
    
       
      </div>
    </div>
  </section>-->
  
   <section class="categories section-lg-b-space" style="margin-bottom:10px;">
    <div class="custom-container" style="margin-bottom:100px !important;">
      <div class="row gy-5 ratio_square">
         <?php

  $sql4 = "SELECT * FROM sub_cat WHERE status='Approved'";
  $result4 = mysqli_query($link, $sql4);
  if ($result4->num_rows > 0) {

    while ($row4 = $result4->fetch_assoc()) {

          ?>
          
          
        <div class="col-4">
          <a href="listing.php?sub_cat=<?php echo $row4['sub_cat']; ?>">
            <div class="food-categories food">
              <img class="img-fluid categories-img" src="uploads/<?php echo $row4['image']; ?>" alt="<?php echo $row4['sub_cat']; ?>" />
            </div>
            <h6><?php echo $row4['sub_cat']; ?></h6>
          </a>
        </div>

          <?php
          
    }

}
else {

  echo "<h1>Not Found</h1>";

}
?>
      </div>
    </div>
  </section>
   <!-- offer product section starts -->
    <section class="search-section">
        <div class="custom-container">
            <div class="title mb-0">
                <h3 class="mt-0">Essential item</h3>
                <a href="listing.php?sub_cat=Essential Item">See All</a>
            </div>
            <h6 class="sub-title light-text mb-3">Special offer on first purchase</h6>

            <div class="swiper grocery-product">
                <div class="swiper-wrapper">
                    
                    
                        <?php

$sql45 = "SELECT * FROM product WHERE sub_cat='Essential Item' LIMIT 3";

$result45 = mysqli_query($link, $sql45);

if ($result45->num_rows > 0) {

    while ($row45 = $result45->fetch_assoc()) {

          ?>
          
          <div class="swiper-slide">
                        <div class="grocery-product-box">
                            <h6 class="offer-tag"><?php echo $row45['stars']; ?>% off</h6>

                            <div class="grocery-product-img">
                                 <a href="single.php?id=<?php echo $row45['id'];?>">
                                     <img class="img-fluid img" src="uploads/<?php echo $row45['image']; ?>" alt="p1">
                                 </a>     
                            </div>
                            <div class="grocery-product-details">
                                <h4 class="dark-text"><?php echo $row45['product_name']; ?></h4>
                                 <a href="single.php?id=<?php echo $row45['id'];?>">
                                     <h4 class="light-text price"><span class="theme-color">Rs.<?php echo $row45['price']; ?>/- </span></h4>
                                </a>
                                <a href="add_cart.php?ids=<?php echo $row45['id'];?>&qty=1" class="btn theme-btn add-btn w-100   mt-3">+ Add</a>
                            </div>
                        </div>
                    </div>
        

          <?php
          
    }

}
else {



}
?>
                    
                    
                  
                </div>
            </div>
        </div>
    </section>
    <!-- offer product section end -->
    <!-- popular product section starts -->
    <section>
        <div class="custom-container">
            <div class="title mb-0">
                <h3 class="mt-0">Popular Product</h3>
                <a href="listing.php?sub_cat=Popular Product">See All</a>
            </div>
            <h6 class="sub-title light-text mb-3">Fresh product from our mart</h6>

            <ul class="grocery-horizontal-product-box gap-0 mt-3">
                
                   <?php

$sql455 = "SELECT * FROM product WHERE sub_cat='Popular Product' LIMIT 3";

$result455 = mysqli_query($link, $sql455);

if ($result455->num_rows > 0) {

    while ($row455 = $result455->fetch_assoc()) {

          ?>
          
          <li class="w-100"> 
                    <div class="horizontal-product-img">
                       <a href="single.php?id=<?php echo $row455['id'];?>"> <img class="img-fluid img" src="uploads/<?php echo $row455['image']; ?>" alt="p4" /></a>
                    </div>
                    <div class="horizontal-product-details">
                        <div>
                            <h5 class="fw-semibold dark-text"><?php echo $row455['product_name']; ?></h5>
                          <a href="single.php?id=<?php echo $row455['id'];?>"><h4 class="light-text price mt-1 mb-1"><span class="theme-color">Rs.<?php echo $row455['price']; ?>/-</a>
                        </div>
                       
                             <div class="d-flex align-items-center gap-1">
                           
                            <h6 class="offer-tag"><?php echo $row455['stars']; ?>% off</h6>
                        </div>

                        <a href="add_cart.php?ids=<?php echo $row455['id'];?>&qty=1" class="btn theme-btn add-btn mt-0">+ Add</a>
                    </div>
                </li>
        

          <?php
          
    }

}
else {



}
?>
  
               

                
            </ul>
        </div>
    </section>
    <!-- popular product section end -->


    <!-- best selling section starts -->
    <section class="search-section">
        <div class="custom-container">
            <div class="title mb-0">
                <h3 class="mt-0">Best Selling</h3>
                <a href="details.php">See All</a>
            </div>
            <h6 class="sub-title light-text mb-3">Get your product from best seller</h6>
            <div class="row">
                
                
                   <?php

$sql4555 = "SELECT * FROM product WHERE sub_cat='Best Selling' LIMIT 2";

$result4555 = mysqli_query($link, $sql4555);

if ($result4555->num_rows > 0) {

    while ($row4555 = $result4555->fetch_assoc()) {

          ?>
           <div class="col-6">
                    <div class="grocery-product-box">
                            <h6 class="offer-tag"><?php echo $row4555['stars']; ?>% off</h6>

                            <div class="grocery-product-img">
                                 <a href="single.php?id=<?php echo $row4555['id'];?>">
                                <img class="img-fluid img" src="uploads/<?php echo $row4555['image']; ?>" alt="p1">
                                </a>
                            </div>
                            <div class="grocery-product-details">
                                <h4 class="dark-text"><?php echo $row4555['product_name']; ?></h4>
                                 <a href="single.php?id=<?php echo $row4555['id'];?>">
                                <h4 class="light-text price"><span class="theme-color">Rs.<?php echo $row4555['price']; ?>/- </span></h4>
                                </a>
                                <a href="add_cart.php?ids=<?php echo $row4555['id'];?>&qty=1" class="btn theme-btn add-btn w-100   mt-3">+ Add</a>
                            </div>
                        </div>
                </div>
         
        

          <?php
          
    }

}
else {



}
?>
               
               
            </div>
        </div>
    </section>
    <!-- best selling section end -->

    <!-- Recent Items section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <div class="title mb-0">
                <h3 class="mt-0">Recent Items</h3>
                <a href="details.php">See All</a>
            </div>
            <h6 class="sub-title light-text mb-3">Fresh product from our mart</h6>

            <div class="row g-3">
                <div class="col-12">
                    <div class="grocery-horizontal-product-box2 ">
                        <div class="horizontal-product-img">
                            <img class="img-fluid img" src="../assets/images/grocery/p4.png" alt="p4" />
                        </div>
                        <div class="horizontal-product-details">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="fw-semibold dark-text">Oatmeal cookies</h5>
                                <div class="d-flex align-items-center gap-1">
                                    <img class="img-fluid" src="../assets/images/svg/rating-star.svg" alt="star">
                                    <h6 class="rate-color">4.5</h6>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <h6 class="light-text price mt-1 mb-1">20 min away home</h6>
                                <h5 class="theme-color"> <span class="fw-semibold">$16</span>/kg</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="grocery-horizontal-product-box2">
                        <div class="horizontal-product-img">
                            <img class="img-fluid img" src="../assets/images/grocery/p5.png" alt="p5" />
                        </div>
                        <div class="horizontal-product-details">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="fw-semibold dark-text">Organic Nuts</h5>
                                <div class="d-flex align-items-center gap-1">
                                    <img class="img-fluid" src="../assets/images/svg/rating-star.svg" alt="star">
                                    <h6 class="rate-color">4.5</h6>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <h6 class="light-text price mt-1 mb-1">20 min away home</h6>
                                <h5 class="theme-color"> <span class="fw-semibold">$16</span>/kg</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="grocery-horizontal-product-box2">
                        <div class="horizontal-product-img">
                            <img class="img-fluid img" src="../assets/images/grocery/p3.png" alt="p3" />
                        </div>
                        <div class="horizontal-product-details">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="fw-semibold dark-text">Orange Juice</h5>
                                <div class="d-flex align-items-center gap-1">
                                    <img class="img-fluid" src="../assets/images/svg/rating-star.svg" alt="star">
                                    <h6 class="rate-color">4.5</h6>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <h6 class="light-text price mt-1 mb-1">20 min away home</h6>
                                <h5 class="theme-color"> <span class="fw-semibold">$16</span>/kg</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="grocery-horizontal-product-box2">
                        <div class="horizontal-product-img">
                            <img class="img-fluid img" src="../assets/images/grocery/p7.png" alt="p7" />
                        </div>
                        <div class="horizontal-product-details">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="fw-semibold dark-text">Butter Biscuit
                                </h5>
                                <div class="d-flex align-items-center gap-1">
                                    <img class="img-fluid" src="../assets/images/svg/rating-star.svg" alt="star">
                                    <h6 class="rate-color">4.5</h6>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <h6 class="light-text price mt-1 mb-1">20 min away home</h6>
                                <h5 class="theme-color"> <span class="fw-semibold">$16</span>/kg</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Recent Items section end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

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
                <a href="grocery-home.php?sub_cat=Reward" class="icon">

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
  setTimeout(showSlides, 4000); // Change image every 2 seconds
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