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

$sub_cat=$_GET['main_cat'];
?>
<?php $page_title='Bharari App'; $body_class='grocery-color'; include('includes/header.php'); ?>
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
  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
       
        <h2>Product</h2>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- food section start -->
  <section class="products section-t-space section-b-space">
    <div class="custom-container">
      <div class="row gy-4">
           <?php

  $sql4 = "SELECT * FROM product WHERE main_cat='$sub_cat'";
  $result4 = mysqli_query($link, $sql4);
  if ($result4->num_rows > 0) {

    while ($row4 = $result4->fetch_assoc()) {

          ?>
          
       
        <div class="col-6 pt-4">
          <div class="product-box product-box-bg">
            <a href="single.php?id=<?php echo $row4['id']; ?>" class="product-box-img">
              <img class="img-fluid" src="uploads/<?php echo $row4['image']; ?>" alt="p1" />
            </a>
            <div class="product-box-detail">
              <h5><?php echo $row4['product_name']; ?></h5>
              <ul class="timing">
                <li>
                  <span class="star"><i class="ri-star-s-fill"></i></span> 3.7
                </li>
                <li>20 min</li>
              </ul>
              <div class="bottom-panel">
                <div class="price"><?php echo $row4['price']; ?>/-</div>
                <a href="#" class="cart mb-0">
                  <i class="ri-shopping-cart-2-fill"></i>
                </a>
              </div>
            </div>
          </div>
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
  <!-- food section start -->
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