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

$search=$_GET['search'];
?>

<?php $page_title='bharari'; $body_class='grocery-color'; include('includes/header.php'); ?>
    
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
  <style>
        
      .category-title {
    white-space: normal !important;
    word-wrap: break-word;
    overflow-wrap: break-word;
    font-size: 13px;
    text-align: center;
    margin-top: 5px;
    line-height: 1.3em;
    min-height: 2.6em; /* ensures room for at least 2 lines */
}

    </style>
</head>
<body class="grocery-color">
       <!-- side bar start -->
    <div class="offcanvas sidebar-offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft">
        <div class="offcanvas-header">
            <img class="img-fluid profile-pic" src="logo.png" alt="profile" />
            <h3>Business/Services</h3>
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
                        <a href="reg_business.php" class="pages">
                            <h3>Register Business</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                    <li>
                        <a href="feedback.php" class="pages">
                            <h3>Feedback</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                    <li>
                        <a href="privacy.php" class="pages">
                            <h3>Privacy Policy</h3>
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
                        <a href="login.php" class="pages" onclick="return confirmLogout();">
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
                      <div class="header-location" style="display: flex; align-items: center; gap: 10px;">
    <img src="logo.png" style="width: 80px; height: auto;">
    <h2 style="margin: 0; font-size: 28px; font-weight: 600;">Bharari</h2>
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
            <form class="auth-form search-head" action="" method="get">
                <div class="form-group">
                    <div class="form-input">
                        <input type="search" class="form-control search" placeholder="Business,Services & more" name="search" />
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
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <a href="landing.php">
          <i class="ri-arrow-left-s-line"></i>
        </a>
        <h2>Categories</h2>
      </div>
    </div>
  </header>


  
  
  <!--==================================================-->
   <section class="categories mb-5">
    <div class="custom-container" style="margin-bottom:100px !important;">
        <div class="title">
          <h3 class="mt-0">Categories</h3>
        
        </div>
      <div class="row gy-5 ratio_square">
         <?php

  $sql4 = "SELECT * FROM sub_cat WHERE sub_cat LIKE '%$search%'";
  $result4 = mysqli_query($link, $sql4);
  if ($result4->num_rows > 0) {

    while ($row4 = $result4->fetch_assoc()) {

          ?>
          
          
        <div class="col-4">
          <a href="listing.php?sub_cat=<?php echo $row4['sub_cat']; ?>">
            <div class="food-categories1 food1">
              <img class="img-fluid categories-img" src="uploads/<?php echo $row4['image']; ?>" alt="<?php echo $row4['sub_cat']; ?>" />
            </div>
            <h6 class="category-title"><?php echo $row4['sub_cat']; ?></h6>
          </a>
        </div>

          <?php
          
    }

}
else {

  echo "<h1>Category Not Found</h1>";

}
?>
      </div>
    </div>
  </section>
  <br>
  <br>
  <br>
  
    <!-- bottom navbar start -->
    <div class="navbar-menu">
        <ul>
            <li class="active">
                <a href="landing.php" class="icon logo">
                    <img class="img-fluid unactive" src="../assets/images/svg/home.svg" alt="logo" />
                    <img class="active" src="../assets/images/svg/home-fill.svg" alt="grocery" />
                    <span>Home</span>
                </a>
            </li> 
            <li>
                <a href="single.php" class="icon">
                    <img class="unactive" src="../assets/images/svg/dashboard.svg" alt="food" />
                    <img class="active" src="../assets/images/svg/cube.svg" alt="user" />
                    <span>My Business</span>
                </a>
            </li>
            <li>
                <a href="womens_special.php" class="icon">
                    <img class="unactive" src="../assets/images/svg/grocery.svg" alt="grocery" />
                    <img class="active" src="../assets/images/svg/cube.svg" alt="user" />
                    <span>Womens Special</span>
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
<?php include('includes/footer.php'); ?>