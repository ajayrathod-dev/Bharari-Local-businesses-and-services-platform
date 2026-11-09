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

$sub_cat=$_GET['sub_cat'];


$search=$_GET['search'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="bharari" />
    <meta name="keywords" content="bharari" />
    <meta name="author" content="bharari" />
    <link rel="manifest" href="../manifest.json" />

    <link rel="icon" href="logo.png" type="image/x-icon" />
    <title>bharari</title>
    <link rel="apple-touch-icon" href="logo.png" />
    <meta name="theme-color" content="#0b53bf" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="bharari" />
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
        
        .product-title-full1 {
    white-space: normal !important;
    word-wrap: break-word;
    font-size: 14px;
    margin-bottom: 5px;
}

.product-box-detail1 {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
   
}
.product-box {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  padding: 10px;
  border-radius: 10px;
  background-color: #fff;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.05);
}
    </style>
    <style>
/* Full-page loader */
#pageLoader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #ffffff;
  z-index: 9999;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: opacity 0.5s ease, visibility 0.5s ease;
}

#pageLoader.hidden {
  opacity: 0;
  visibility: hidden;
}

/* Spinner style */
#pageLoader .spinner {
  border: 6px solid #f3f3f3;
  border-top: 6px solid #0b53bf; /* same blue theme */
  border-radius: 50%;
  width: 60px;
  height: 60px;
  animation: spin 1s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>

<body class="grocery-color">
      <div id="pageLoader">
  <div class="spinner"></div>
</div>
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
                        <a href="order_det.php" class="pages">
                            <h3>My Orders</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://ordor.in/bharari/business/login.php" class="pages">
                            <h3>Business Admin Panel</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                      <li>
                        <a href="https://ordor.in/bharari/business/sub_cat.php" class="pages">
                            <h3>Register Businessl</h3>
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
                        <a href="mailto:help@bharari.com" class="pages">
                            <h3>help@bharari.com</h3>
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
    <a href="login.php" class="pages" onclick="return confirmLogout();">
        <h3>Logout</h3>
        <i class="ri-arrow-drop-right-line"></i>
    </a>
</li>

<script>
function confirmLogout() {
    return confirm("Are you sure you want to log out?");
}
</script>
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
  <!-- header start -->
 <header class="section-t-space">
         <div class="custom-container">
            <div class="header-panel">
               <a href="landing.php">
               <i class="ri-arrow-left-s-line"></i>
               </a>
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
   if($search!='')
   {
        $sql4 = "SELECT * FROM product WHERE product_name LIKE '%$search%'";
   }
   else
   {
        //  $sql4 = "SELECT * FROM product WHERE sub_cat ='$sub_cat' GROUP BY product_name";
        
        $sql4 = "SELECT * FROM product WHERE sub_cat ='$sub_cat'";

   }
  $result4 = mysqli_query($link, $sql4);
  if ($result4->num_rows > 0) {

    while ($row4 = $result4->fetch_assoc()) {

          ?>
          
       
        <div class="col-6 pt-4">
          <div class="product-box product-box-bg">
            <a href="single.php?id=<?php echo $row4['id']; ?>" class="product-box-img">
              <img class="img-fluid" src="uploads/<?php echo $row4['image']; ?>" alt="p1" />
            </a>
            <div class="product-box-detail1">
            <h5 class="product-title-full"><?php echo $row4['product_name']; ?></h5>

              <ul class="timing">
                <!--<li>-->
                <!--  <span class="star"><i class="ri-star-s-fill"></i></span> 3.7-->
                <!--</li>-->
                <li><?php echo $row4['unit'];?><?php echo $row4['weight_per_kg'];?></li>
              </ul>
              <div class="bottom-panel">
                <div class="price">₹ <?php echo $row4['price']; ?>/-</div>
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
  <br><br><br><br>
  <!-- food section start -->
  <!-- bottom navbar start -->
    <div class="navbar-menu">
        <ul>
            <li>
                <a href="landing.php" class="icon logo">
                    <img class=" img-fluid unactive" src="../assets/images/svg/home.svg" alt="logo" />
                     <img class="active" src="../assets/images/svg/home-fill.svg" alt="grocery" />
                    <span>Home</span>
                </a>
            </li>
            <li class="active">
                <a href="categories.php" class="icon">
                    <img class="unactive" src="../assets/images/svg/dashboard.svg" alt="food" />
                     <img class="active" src="../assets/images/svg/cube.svg" alt="user" />
                    
                    <span>Category</span>
                </a>
            </li>
 <li>
                <a href="grocery-home.php?main_cat=women special" class="icon">

                    <img class="unactive" src="../assets/images/svg/grocery.svg" alt="grocery" />
                   
                    <span>Womens Special</span>
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

    <!-- bootstrap js -->
    <script src="../assets/js/bootstrap.bundle.min.js">
    </script>

    <!-- swiper js -->
    <script src="../assets/js/swiper-bundle.min.js"> </script>
    <script src="../assets/js/custom-swiper.js"> </script>

    <!-- script js -->
    <script src="../assets/js/script.js">
    </script>
     <script>
// Wait for all content (including images) to finish loading
window.addEventListener("load", function() {
  const loader = document.getElementById("pageLoader");
  setTimeout(() => {
    loader.classList.add("hidden");
  }, 400); // small delay for smooth fade
});
</script>
</body>

</html>