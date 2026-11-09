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

$main_cat = $_GET['main_id'];
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
    <title>Bharari</title>
    <link rel="apple-touch-icon" href="logo.png" />
    <meta name="theme-color" content="#398B34" />
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
        .business-card {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: white;
        }
        
        .business-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .business-image {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            object-fit: cover;
        }
        
        .business-name {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }
        
        .business-category {
            color: #666;
            font-size: 14px;
            margin-bottom: 5px;
        }
        
        .business-owner {
            color: #888;
            font-size: 13px;
            margin-bottom: 5px;
        }
        
        .business-address {
            color: #666;
            font-size: 12px;
            margin-bottom: 10px;
        }
        
        .view-profile-btn {
            background: #0d6efd;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 15px;
            font-size: 12px;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s ease;
        }
        
        .view-profile-btn:hover {
            background: #0b5ed7;
            color: white;
        }
        
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
            <form class="auth-form search-head" target="_blank">
                <div class="form-group">
                    <div class="form-input">
                        <input type="search" class="form-control search" id="inputusername"
                            placeholder="Business,Services & more" />
                        <i class="ri-search-line search-icon"></i>
                    </div>
                    <a href="#search-filter" class="btn filter-button mt-0" data-bs-toggle="modal">
                        <i class="ri-equalizer-line"></i>
                    </a>
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
                <h2><?php echo htmlspecialchars($main_cat); ?></h2>
            </div>
        </div>
    </header>

    <!-- Businesses Section -->
    <section class="categories section-lg-b-space" style="margin-bottom:10px;">
        <div class="custom-container" style="margin-bottom:100px !important;">
            <div class="row">
                <?php
                // Query to get businesses under this category with approved status
                $sql4 = "SELECT * FROM sub_cat WHERE main_cat='$main_cat' AND status='Approved'";
                $result4 = mysqli_query($link, $sql4);
                
                if ($result4->num_rows > 0) {
                    while ($row4 = $result4->fetch_assoc()) {
                ?>
                <div class="col-12">
                    <a href="business_profile.php?business_id=<?php echo $row4['id']; ?>" style="text-decoration: none; color: inherit;">
                        <div class="business-card d-flex align-items-center">
                            <div class="me-3">
                                <img class="business-image" src="uploads/<?php echo $row4['image']; ?>" alt="<?php echo $row4['sub_cat']; ?>" onerror="this.src='logo.png'" />
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="business-name"><?php echo $row4['sub_cat']; ?></h6>
                                <p class="business-category mb-1"><?php echo $row4['main_cat']; ?></p>
                                <p class="business-owner mb-1">
                                    <i class="ri-user-fill"></i> <?php echo $row4['bus_owner']; ?>
                                </p>
                                <p class="business-address mb-2">
                                    <i class="ri-map-pin-fill"></i> <?php echo $row4['address']; ?>
                                </p>
                                <span class="view-profile-btn">View Profile</span>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                    }
                } else {
                    echo '<div class="col-12 text-center py-5">
                            <h3>No businesses found in this category</h3>
                            <p>Be the first to register your business!</p>
                            <a href="reg_business.php" class="btn btn-primary">Register Business</a>
                          </div>';
                }
                ?>
            </div>
        </div>
    </section>

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