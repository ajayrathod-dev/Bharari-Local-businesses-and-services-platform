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

$business_id = $_GET['business_id'];

// Get business details
$sql_business = "SELECT * FROM sub_cat WHERE id='$business_id'";
$result_business = mysqli_query($link, $sql_business);

if ($result_business->num_rows > 0) {
    $business = $result_business->fetch_assoc();
    
    $business_name = $business['sub_cat'];
    $business_owner = $business['bus_owner'];
    $mobile_no = $business['mobile_no'];
    $address = $business['address'];
    $business_image = $business['image'];
    $main_cat = $business['main_cat'];
} else {
    header("location:sub_cat.php?main_id=" . urlencode($main_cat));
    exit;
}

// Get products for this business
$sql_products = "SELECT * FROM product WHERE sub_cat='$mobile_no' AND status='Instock'";
$result_products = mysqli_query($link, $sql_products);
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
    <title><?php echo $business_name; ?> - Bharari</title>
    <link rel="apple-touch-icon" href="logo.png" />
    <meta name="theme-color" content="#0d6efd" />
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
        .business-header {
            background: linear-gradient(248deg, #0d6efd, #70b46d);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .business-header p,
        .business-header .info-item {
            color: #ffffff !important;
            margin-bottom: 8px;
        }
        
        .business-image-large {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            object-fit: cover;
            border: 3px solid white;
        }
        
        .info-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .info-item i {
            color: #ffffff;
            font-size: 16px;
            width: 20px;
        }
        
        .gallery-section {
            margin: 30px 0;
        }
        
        .gallery-item {
            margin-bottom: 15px;
        }
        
        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }
        
        .product-card {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .product-image {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            object-fit: cover;
        }
        
        .call-btn-large {
            background: white;
            color: #398B34;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 10px;
        }
        
        .call-btn-large:hover {
            background: #f8f9fa;
            color: #2d6c2a;
        }

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

        #pageLoader .spinner {
            border: 6px solid #f3f3f3;
            border-top: 6px solid #398B34;
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
                    <a href="womens_special.php" class="sidebar-btn">
                        <i class="ri-menu-line"></i>
                    </a>
                    <div class="header-location" style="display: flex; align-items: center; gap: 10px;">
                        <img src="logo.png" style="width: 80px; height: auto;">
                        <h2 style="margin: 0; font-size: 28px; font-weight: 600;">Bharari</h2>
                    </div>
                </div>
               
            </div>
        </div>
    </header>
    <!-- header end -->

    <header class="section-t-space">
        <div class="custom-container">
            <div class="header-panel">
                <a href="womens_special.php" class="back-btn">
                    <i class="ri-arrow-left-s-line"></i>
                </a>
                <h2>Business Profile</h2>
            </div>
        </div>
    </header>

    <!-- Business Details Section -->
    <div class="custom-container">
        <div class="business-header">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img class="business-image-large" src="uploads/<?php echo $business_image; ?>" alt="<?php echo $business_name; ?>" />
                </div>
                <div class="col">
                    <h2 class="mb-3" style="color: #ffffff;"><?php echo $business_name; ?></h2>
                    <div class="info-item">
                        <i class="ri-user-fill"></i>
                        <span><?php echo $business_owner; ?></span>
                    </div>
                    <div class="info-item">
                        <i class="ri-map-pin-fill"></i>
                        <span><?php echo $address; ?></span>
                    </div>
                    <div class="info-item">
                        <i class="ri-phone-fill"></i>
                        <span><?php echo $mobile_no; ?></span>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="tel:<?php echo $mobile_no; ?>" class="call-btn-large">
                    <i class="ri-phone-fill"></i> Call Now
                </a>
            </div>
        </div>

        <!-- Products Section -->
        <?php if ($result_products->num_rows > 0): ?>
        <section class="products section-t-space">
            <h4 class="mb-4">Available Products</h4>
            <div class="row">
                <?php while ($product = $result_products->fetch_assoc()): ?>
                <div class="col-12">
                    <a href="single.php?id=<?php echo $product['id']; ?>" style="text-decoration: none; color: inherit;">
                        <div class="product-card d-flex align-items-center">
                            <div class="me-3">
                                <img class="product-image" src="uploads/<?php echo $product['image']; ?>" alt="<?php echo $product['product_name']; ?>" />
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1"><?php echo $product['product_name']; ?></h6>
                                <p class="mb-1 text-muted"><?php echo $product['unit'] . $product['weight_per_kg']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-primary">₹ <?php echo $product['price']; ?>/-</span>
                                    <?php if($product['qty'] < 5): ?>
                                        <span class="badge bg-danger">Low Stock</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endwhile; ?>
            </div>
        </section>
        <?php endif; ?>

        <!-- Gallery Section (You can extend this to show business gallery images) -->
        <section class="gallery-section">
            <h4 class="mb-4">Business Gallery</h4>
            <div class="row">
                <!-- Main business image -->
                <div class="col-6 gallery-item">
                    <img src="uploads/<?php echo $business_image; ?>" alt="<?php echo $business_name; ?>" />
                </div>
                <!-- Additional gallery images can be added here -->
                <!-- You can create a separate gallery table and query it -->
            </div>
        </section>
    </div>

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

    <!-- bootstrap js -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <!-- script js -->
    <script src="../assets/js/script.js"></script>
    
    <script>
    // Wait for all content (including images) to finish loading
    window.addEventListener("load", function() {
        const loader = document.getElementById("pageLoader");
        setTimeout(() => {
            loader.classList.add("hidden");
        }, 400);
    });
    </script>
</body>
</html>