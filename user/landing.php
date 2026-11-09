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

$search = isset($_GET['search']) ? $_GET['search'] : '';
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
        .category-title {
            white-space: normal !important;
            word-wrap: break-word;
            overflow-wrap: break-word;
            font-size: 13px;
            text-align: center;
            margin-top: 5px;
            line-height: 1.3em;
            min-height: 2.6em;
        }
        
        /* Updated Tab Styles with Full Hover Effect */
        .nav-tabs .nav-link {
            border: 1px solid #0d6efd;
            border-radius: 20px;
            margin: 0 5px;
            padding: 8px 25px;
            color: #0d6efd;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .nav-tabs .nav-link:hover {
            background-color: #e3f2fd;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(13, 110, 253, 0.2);
        }

        .nav-tabs .nav-link.active {
            background-color: #0d6efd;
            color: #fff;
            border-color: #0d6efd;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
        }

        .nav-tabs .nav-link.active:hover {
            background-color: #0b5ed7;
            border-color: #0b5ed7;
        }

        /* Search Results Styles */
        .search-results-header {
            background: linear-gradient(45deg, #0d6efd, #398B34);
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
            text-align: center;
        }

        .no-results {
            text-align: center;
            padding: 40px 20px;
            color: #666;
        }

        .no-results i {
            font-size: 48px;
            color: #ddd;
            margin-bottom: 15px;
        }

        /* Business Card Styles */
        .business-card {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            background: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
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
                        <input type="search" class="form-control search" placeholder="Business,Services & more" name="search" value="<?php echo htmlspecialchars($search); ?>" />
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
    <center>
        <style>
            .custom-slideshow-wrapper {
                position: relative;
                width: 80%;
                max-width: 600px;
                overflow: hidden;
                border-radius: 10px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            }

            .custom-slides-track {
                display: flex;
                transition: transform 1.5s ease;
            }

            .custom-slide-item {
                min-width: 100%;
                box-sizing: border-box;
            }

            .custom-slide-item img {
                width: 100%;
                display: block;
            }

            .custom-prev-btn, .custom-next-btn {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                background-color: rgba(0, 0, 0, 0.01);
                color: white;
                padding: 10px;
                border: none;
                cursor: pointer;
                font-size: 18px;
            }

            .custom-prev-btn {
                left: 10px;
            }

            .custom-next-btn {
                right: 10px;
            }

            .custom-prev-btn:hover, .custom-next-btn:hover {
                background-color: rgba(0, 0, 0, 0.8);
            }

            .home {
                max-width: 600px;
                margin: 0 auto;
                text-align: center;
            }

            .home img {
                width: 100%;
                margin-bottom: 15px;
                border-radius: 8px;
                box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
            }
        </style>
        
        <?php
        $sql1 = "SELECT * FROM banner order by id DESC LIMIT 1";
        $result1 = mysqli_query($link, $sql1);
        if ($result1->num_rows > 0) {
            while ($usr1 = mysqli_fetch_array($result1)) {
                $img1=$usr1['image1'];
                $img2=$usr1['image2'];
                $img3=$usr1['image3'];
            }
        }
        ?>
        
        <div class="custom-slideshow-wrapper mt-3">
            <div class="custom-slides-track">
                <div class="custom-slide-item">
                    <img src="banner/<?php echo $img1; ?>" alt="Image 1">
                </div>
                <div class="custom-slide-item">
                    <img src="banner/<?php echo $img2; ?>" alt="Image 2">
                </div>
                <div class="custom-slide-item">
                    <img src="banner/<?php echo $img3; ?>" alt="Image 3">
                </div>
            </div>

            <button class="custom-prev-btn" onclick="customGoToPrevSlide()">❮</button>
            <button class="custom-next-btn" onclick="customGoToNextSlide()">❯</button>
        </div>

        <script>
            const customSlidesTrack = document.querySelector('.custom-slides-track');
            const customSlides = document.querySelectorAll('.custom-slide-item');
            let customCurrentIndex = 0;

            function customShowSlide(index) {
                const customSlideWidth = customSlides[0].clientWidth;
                customSlidesTrack.style.transform = `translateX(${-index * customSlideWidth}px)`;
            }

            function customGoToNextSlide() {
                if (customCurrentIndex < customSlides.length - 1) {
                    customCurrentIndex++;
                } else {
                    customCurrentIndex = 0;
                }
                customShowSlide(customCurrentIndex);
            }

            function customGoToPrevSlide() {
                if (customCurrentIndex > 0) {
                    customCurrentIndex--;
                } else {
                    customCurrentIndex = customSlides.length - 1;
                }
                customShowSlide(customCurrentIndex);
            }

            setInterval(customGoToNextSlide, 5000);
            customShowSlide(customCurrentIndex);
            window.addEventListener('resize', () => customShowSlide(customCurrentIndex));
        </script>
    </center>
    <!-- banner section end --> 

    <?php if (!empty($search)): ?>
        <!-- Search Results Header -->
        <div class="custom-container">
            <div class="search-results-header">
                <h4 class="mb-0">Search Results for "<?php echo htmlspecialchars($search); ?>"</h4>
            </div>
        </div>

        <!-- Search Results Section - Shows both Categories and Businesses -->
        <div class="custom-container">
            <?php
            // Search in categories
            $sql_categories = "SELECT * FROM category WHERE 
                (category_name LIKE '%$search%' OR 
                 category_type LIKE '%$search%') 
                ORDER BY category_type, category_name";
            $result_categories = mysqli_query($link, $sql_categories);
            $categories_count = $result_categories->num_rows;

            // Search in businesses (sub_cat table)
            $sql_businesses = "SELECT * FROM sub_cat WHERE 
                (sub_cat LIKE '%$search%' OR 
                 main_cat LIKE '%$search%' OR 
                 bus_owner LIKE '%$search%' OR 
                 address LIKE '%$search%') 
                AND status = 'Approved' 
                ORDER BY main_cat, sub_cat";
            $result_businesses = mysqli_query($link, $sql_businesses);
            $businesses_count = $result_businesses->num_rows;

            // Search in products
            $sql_products = "SELECT * FROM product WHERE 
                (product_name LIKE '%$search%' OR 
                 main_cat LIKE '%$search%') 
                AND status = 'Instock' 
                ORDER BY product_name";
            $result_products = mysqli_query($link, $sql_products);
            $products_count = $result_products->num_rows;
            ?>

            <!-- Categories Results -->
            <?php if ($categories_count > 0): ?>
            <section class="section-t-space">
                <h4 class="mb-4">Categories (<?php echo $categories_count; ?>)</h4>
                <div class="row gy-5 ratio_square">
                    <?php while ($category = $result_categories->fetch_assoc()): ?>
                    <div class="col-4">
                        <a href="sub_cat.php?main_id=<?php echo urlencode($category['category_name']); ?>">
                            <div class="food-categories food">
                                <img class="img-fluid categories-img" src="uploads/<?php echo $category['image']; ?>" alt="<?php echo $category['category_name']; ?>" onerror="this.src='logo.png'" />
                            </div>
                            <h6 class="category-title"><?php echo $category['category_name']; ?></h6>
                            <small class="text-muted"><?php echo $category['category_type']; ?></small>
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
            </section>
            <?php endif; ?>

            <!-- Businesses Results -->
            <?php if ($businesses_count > 0): ?>
            <section class="section-t-space">
                <h4 class="mb-4">Businesses (<?php echo $businesses_count; ?>)</h4>
                <div class="row">
                    <?php while ($business = $result_businesses->fetch_assoc()): ?>
                    <div class="col-12">
                        <a href="business_profile.php?business_id=<?php echo $business['id']; ?>" style="text-decoration: none;">
                            <div class="business-card d-flex align-items-center">
                                <div class="me-3">
                                    <img class="business-image" src="uploads/<?php echo $business['image']; ?>" alt="<?php echo $business['sub_cat']; ?>" onerror="this.src='logo.png'" />
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="business-name"><?php echo $business['sub_cat']; ?></h6>
                                    <p class="business-category mb-1"><?php echo $business['main_cat']; ?></p>
                                    <p class="business-owner mb-1">
                                        <i class="ri-user-fill"></i> <?php echo $business['bus_owner']; ?>
                                    </p>
                                    <p class="business-address mb-2">
                                        <i class="ri-map-pin-fill"></i> <?php echo $business['address']; ?>
                                    </p>
                                    <span class="view-profile-btn">View Business</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endwhile; ?>
                </div>
            </section>
            <?php endif; ?>

            <!-- Products Results -->
            <?php if ($products_count > 0): ?>
            <section class="products section-t-space section-b-space">
                <h4 class="mb-4">Products (<?php echo $products_count; ?>)</h4>
                <div class="row gy-4">
                    <?php while ($product = $result_products->fetch_assoc()): ?>
                    <div class="col-6 pt-4">
                        <div class="product-box product-box-bg">
                            <a href="single.php?id=<?php echo $product['id']; ?>" class="product-box-img">
                                <img class="img-fluid" src="uploads/<?php echo $product['image']; ?>" alt="<?php echo $product['product_name']; ?>" onerror="this.src='logo.png'" />
                            </a>
                            <div class="product-box-detail">
                                <h5><?php echo $product['product_name']; ?></h5>
                                <ul class="timing">
                                    <li>
                                        <span class="star"><i class="ri-star-s-fill"></i></span> 3.7
                                    </li>
                                    <li><?php echo $product['unit'] . $product['weight_per_kg']; ?></li>
                                </ul>
                                <div class="bottom-panel">
                                    <div class="price">₹ <?php echo $product['price']; ?>/-</div>
                                    <a href="#" class="cart mb-0">
                                        <i class="ri-shopping-cart-2-fill"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </section>
            <?php endif; ?>

            <!-- No Results Message -->
            <?php if ($categories_count == 0 && $businesses_count == 0 && $products_count == 0): ?>
            <div class="text-center py-5">
                <div class="no-results">
                    <i class="ri-search-line"></i>
                    <h5>No Results Found</h5>
                    <p>No categories, businesses, or products found for "<?php echo htmlspecialchars($search); ?>"</p>
                </div>
            </div>
            <?php endif; ?>
        </div>

    <?php else: ?>
        <!-- Regular Categories Display (when no search) -->
        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs justify-content-center mt-4 mb-5" id="categoryTab" role="tablist" style="margin-bottom:10px !important;">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="services-tab" data-bs-toggle="tab" 
                    data-bs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false">
                    Services
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="goods-tab" data-bs-toggle="tab" 
                    data-bs-target="#goods" type="button" role="tab" aria-controls="goods" aria-selected="true">
                    Goods
                </button>
            </li>
        </ul>

        <section class="categories section-lg-b-space" style="margin-bottom:10px;">
            <div class="custom-container" style="margin-bottom:100px !important;">
                <div class="row gy-5 ratio_square">
                    <!-- Tabs Content -->
                    <div class="tab-content" id="categoryTabContent" style="margin-top:20px;">

                        <!-- Services Tab -->
                        <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
                            <div class="row gy-5 ratio_square">
                                <?php
                                $sql4 = "SELECT * FROM category WHERE category_type='Services'";
                                $result4 = mysqli_query($link, $sql4);

                                if ($result4->num_rows > 0) {
                                    while ($row4 = $result4->fetch_assoc()) {
                                ?>
                                    <div class="col-4">
                                        <a href="sub_cat.php?main_id=<?php echo urlencode($row4['category_name']); ?>">
                                            <div class="food-categories food">
                                                <img class="img-fluid categories-img" src="uploads/<?php echo $row4['image']; ?>" alt="<?php echo $row4['category_name']; ?>" onerror="this.src='logo.png'" />
                                            </div>
                                            <h6 class="category-title"><?php echo $row4['category_name']; ?></h6> 
                                        </a>
                                    </div>
                                <?php
                                    }
                                } else {
                                ?>
                                    <div class="col-12">
                                        <div class="no-results">
                                            <i class="ri-inbox-line"></i>
                                            <h5>No Services Available</h5>
                                            <p>Check back later for new services</p>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <!-- Goods Tab -->
                        <div class="tab-pane fade show active" id="goods" role="tabpanel" aria-labelledby="goods-tab">
                            <div class="row gy-5 ratio_square">
                                <?php
                                $sql4 = "SELECT * FROM category WHERE category_type='Goods'";
                                $result4 = mysqli_query($link, $sql4);

                                if ($result4->num_rows > 0) {
                                    while ($row4 = $result4->fetch_assoc()) {
                                ?>
                                    <div class="col-4">
                                        <a href="sub_cat.php?main_id=<?php echo urlencode($row4['category_name']); ?>">
                                            <div class="food-categories food">
                                                <img class="img-fluid categories-img" src="uploads/<?php echo $row4['image']; ?>" alt="<?php echo $row4['category_name']; ?>" onerror="this.src='logo.png'" />
                                            </div>
                                            <h6 class="category-title"><?php echo $row4['category_name']; ?></h6> 
                                        </a>
                                    </div>
                                <?php
                                    }
                                } else {
                                ?>
                                    <div class="col-12">
                                        <div class="no-results">
                                            <i class="ri-inbox-line"></i>
                                            <h5>No Goods Available</h5>
                                            <p>Check back later for new goods</p>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->
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

    <script>
        // Wait for all content (including images) to finish loading
        window.addEventListener("load", function() {
            const loader = document.getElementById("pageLoader");
            setTimeout(() => {
                loader.classList.add("hidden");
            }, 400);
        });

        function confirmLogout() {
            return confirm("Are you sure you want to log out?");
        }

        // Auto-activate Services tab when searching and showing results
        document.addEventListener('DOMContentLoaded', function() {
            const searchParam = new URLSearchParams(window.location.search).get('search');
            if (searchParam) {
                // Show Services tab by default when searching
                const servicesTab = new bootstrap.Tab(document.getElementById('services-tab'));
                servicesTab.show();
            }
        });
    </script>

    <!-- bootstrap js -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <!-- swiper js -->
    <script src="../assets/js/swiper-bundle.min.js"></script>
    <script src="../assets/js/custom-swiper.js"></script>

    <!-- script js -->
    <script src="../assets/js/script.js"></script>
</body>
</html>