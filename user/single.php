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
// Get all businesses for the logged-in user
$sql_all_businesses = "SELECT * FROM sub_cat WHERE mobile_no='$u_uname' ORDER BY id DESC";
$result_all_businesses = mysqli_query($link, $sql_all_businesses);
$all_businesses = array();
if ($result_all_businesses->num_rows > 0) {
    while ($business = $result_all_businesses->fetch_assoc()) {
        $all_businesses[] = $business;
    }
}
// Get current business ID from session or use first business
if (isset($_GET['switch_business']) && is_numeric($_GET['switch_business'])) {
    $_SESSION['current_business_id'] = $_GET['switch_business'];
    header("location: single.php");
    exit;
}
$current_business_id = isset($_SESSION['current_business_id']) ? $_SESSION['current_business_id'] : (count($all_businesses) > 0 ? $all_businesses[0]['id'] : 0);
// Handle image upload to database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_gallery_images'])) {
    $business_id = $_POST['business_id'];
    $image_data = json_decode($_POST['image_data'], true);
   
    if ($image_data && count($image_data) > 0) {
        foreach ($image_data as $image) {
            $image_name = $image['name'];
            $image_caption = mysqli_real_escape_string($link, $image['caption']);
            $image_file = $image['file_data'];
           
            // Generate unique filename
            $imgExt = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
            $galleryImageName = date('iYshmd') . "_" . rand(1000, 1000000) . "." . $imgExt;
            $upload_dir = 'uploads/gallery/';
           
            // Create gallery directory if it doesn't exist
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
           
            // Save image file
            $image_data_decoded = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image_file));
            file_put_contents($upload_dir . $galleryImageName, $image_data_decoded);
           
            // Insert into database
            $sql_gallery = "INSERT INTO business_gallery (business_id, image_name, caption, uploaded_by, created_at)
                           VALUES ('$business_id', '$galleryImageName', '$image_caption', '$u_uname', NOW())";
            mysqli_query($link, $sql_gallery);
        }
       
        $gallery_success = "Gallery images saved successfully!";
    }
}
// Get current business details
$current_business = null;
foreach ($all_businesses as $business) {
    if ($business['id'] == $current_business_id) {
        $current_business = $business;
        break;
    }
}
if (!$current_business && count($all_businesses) > 0) {
    $current_business = $all_businesses[0];
    $_SESSION['current_business_id'] = $current_business['id'];
}
if ($current_business) {
    $business_id = $current_business['id'];
    $business_name = $current_business['sub_cat'];
    $business_owner = $current_business['bus_owner'];
    $business_mobile = $current_business['mobile_no'];
    $business_address = $current_business['address'];
    $business_image = $current_business['image'];
    $main_cat = $current_business['main_cat'];
    $status = $current_business['status'];
   
    // Handle gallery image removal
    if (isset($_GET['remove_image']) && is_numeric($_GET['remove_image'])) {
        $imgId = (int)$_GET['remove_image'];
        $stmt = mysqli_prepare($link, "SELECT image_name FROM business_gallery WHERE id = ? AND business_id = ?");
        mysqli_stmt_bind_param($stmt, "ii", $imgId, $business_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $image_name);
        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_fetch($stmt);
            $filePath = 'uploads/gallery/' . $image_name;
            if (is_file($filePath)) {
                @unlink($filePath);
            }
            mysqli_stmt_close($stmt);
            $del = mysqli_prepare($link, "DELETE FROM business_gallery WHERE id = ? AND business_id = ?");
            mysqli_stmt_bind_param($del, "ii", $imgId, $business_id);
            mysqli_stmt_execute($del);
            mysqli_stmt_close($del);
            $gallery_success = "Image removed successfully!";
        } else {
            mysqli_stmt_close($stmt);
        }
    }
    // Get existing gallery images from database
    $sql_gallery_check = "SHOW TABLES LIKE 'business_gallery'";
    $result_gallery_check = mysqli_query($link, $sql_gallery_check);
   
    $gallery_images = array();
    if ($result_gallery_check->num_rows > 0) {
        $sql_gallery = "SELECT * FROM business_gallery WHERE business_id='$business_id' ORDER BY created_at DESC";
        $result_gallery = mysqli_query($link, $sql_gallery);
        if ($result_gallery) {
            while ($gallery = $result_gallery->fetch_assoc()) {
                $gallery_images[] = $gallery;
            }
        }
    }
} else {
    // If no business found, redirect to registration
    header("location:reg_business.php");
    exit;
}
// Get products for this business
$sql_products = "SELECT * FROM product WHERE sub_cat='$business_mobile' AND status='Instock'";
$result_products = mysqli_query($link, $sql_products);
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
    <title>My Business - bharari</title>
    <link rel="apple-touch-icon" href="agr.png" />
    <meta name="theme-color" content="#0d6efd" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="bharari" />
    <meta name="msapplication-TileImage" content="agr.png" />
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
       
        .status-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: <?php echo $status == 'Approved' ? '#28a745' : ($status == 'Pending' ? '#ffc107' : '#dc3545'); ?>;
            color: white;
            padding: 4px 8px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: 600;
        }
       
        /* Business Switcher Dropdown */
        .business-switcher {
            position: relative;
            display: inline-block;
        }
       
        .business-dropdown-btn {
            background: #0d6efd;
            color: white;
            border: 1px solid #0d6efd;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
            text-decoration: none;
            white-space: nowrap;
        }
       
        .business-dropdown-btn:hover {
            background: #0b5ed7;
            color: white;
        }
       
        .business-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            min-width: 220px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            z-index: 1000;
            margin-top: 5px;
        }
       
        .business-dropdown.show {
            display: block;
            animation: fadeIn 0.2s ease;
        }
       
        .business-dropdown-item {
            padding: 12px 15px;
            border-bottom: 1px solid #f0f0f0;
            cursor: pointer;
            transition: background 0.2s ease;
            color: #333;
        }
       
        .business-dropdown-item:hover {
            background: #f8f9fa;
        }
       
        .business-dropdown-item:last-child {
            border-bottom: none;
        }
       
        .business-dropdown-item.active {
            background: #e3f2fd;
            color: #0d6efd;
            font-weight: 600;
        }
       
        .gallery-section {
            margin: 30px 0;
        }
       
        .gallery-item {
            margin-bottom: 15px;
            position: relative;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
       
        .gallery-item:hover {
            transform: scale(1.03);
        }
       
        .gallery-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }
       
        .gallery-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 8px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            font-size: 14px;
        }
       
        .remove-image {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(255,0,0,0.8);
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            z-index: 10;
        }
       
        .add-image-btn {
            background: #0d6efd;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 10px;
            cursor: pointer;
        }
       
        .add-image-btn:hover {
            background: #0b5ed7;
            color: white;
        }
       
        .edit-profile-btn {
            background: white;
            color: #0d6efd;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 10px;
            cursor: pointer;
        }
       
        .edit-profile-btn:hover {
            background: #f8f9fa;
            color: #0b5ed7;
        }
       
        .image-upload-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            border: 2px dashed #dee2e6;
        }
       
        .caption-input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 10px;
            font-size: 14px;
        }
       
        .hidden {
            display: none;
        }
       
        .products-section {
            margin: 30px 0;
        }
       
        .product-item {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            background: white;
        }
       
        .product-image {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            object-fit: cover;
        }
       
        .save-to-db-btn {
            background: #28a745;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin: 10px 5px;
            transition: all 0.3s ease;
        }
       
        .save-to-db-btn:hover {
            background: #218838;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
       
        .save-to-db-btn:disabled {
            background: #6c757d;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
       
        .upload-actions {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
        }
        /* Full Image Preview Modal */
        .image-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            padding-top: 50px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.9);
            animation: fadeIn 0.3s ease;
        }
        .modal-content {
            margin: auto;
            display: block;
            max-width: 90%;
            max-height: 80vh;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.5);
        }
        .modal-caption {
            text-align: center;
            color: #fff;
            padding: 10px 0;
            font-size: 16px;
            margin-top: 10px;
        }
        .close-modal {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            z-index: 1001;
        }
        .close-modal:hover {
            color: #bbb;
        }
        .nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
            padding: 16px;
            background: rgba(0,0,0,0.5);
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.3s;
        }
        .nav-btn:hover {
            background: rgba(0,0,0,0.8);
        }
        .prev-btn {
            left: 20px;
        }
        .next-btn {
            right: 20px;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
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
            border-top: 6px solid #0d6efd;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
       
        .preview-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #495057;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .head-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .header-location {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .header-location img {
            width: 48px;
            height: auto;
        }
        .header-location h2 {
            margin: 0;
            font-size: 22px;
            font-weight: 600;
            letter-spacing: 0.2px;
        }
    </style>
</head>
<body class="grocery-color">
    <div id="pageLoader">
        <div class="spinner"></div>
    </div>
   
    <!-- Full Image Preview Modal -->
    <div id="imageModal" class="image-modal">
        <span class="close-modal">&times;</span>
        <button class="nav-btn prev-btn" onclick="changeImage(-1)">&#10094;</button>
        <button class="nav-btn next-btn" onclick="changeImage(1)">&#10095;</button>
        <img class="modal-content" id="modalImage">
        <div id="modalCaption" class="modal-caption"></div>
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
                    <div class="header-location">
                        <img src="logo.png" />
                        <h2>Bharari</h2>
                    </div>
                </div>
                <div class="header-right">
                    <?php if (count($all_businesses) > 1): ?>
                    <div class="business-switcher">
                        <button class="business-dropdown-btn" onclick="toggleBusinessDropdown()">
                            <i class="ri-store-2-line"></i>
                            Switch Business
                            <i class="ri-arrow-down-s-line"></i>
                        </button>
                        <div class="business-dropdown" id="businessDropdown">
                            <?php foreach ($all_businesses as $business): ?>
                            <div class="business-dropdown-item <?php echo $business['id'] == $current_business_id ? 'active' : ''; ?>"
                                 onclick="switchBusiness(<?php echo $business['id']; ?>)">
                                <?php echo $business['sub_cat']; ?>
                                <small>(<?php echo $business['main_cat']; ?>)</small>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <a href="#">
                        <i class="ri-notification-2-fill"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->
    <header class="section-t-space">
        <div class="custom-container">
            <div class="header-panel">
                <a href="landing.php">
                    <i class="ri-arrow-left-s-line"></i>
                </a>
                <h2>My Business</h2>
            </div>
        </div>
    </header>
    <!-- Business Profile Section -->
    <div class="custom-container">
        <?php if (isset($gallery_success)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $gallery_success; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
       
        <!-- Business Details Section -->
        <div class="business-header position-relative">
           
            <div class="status-badge">
                <?php echo $status; ?>
            </div>
            <div class="row align-items-center">
                <div class="col-auto">
                    <img class="business-image-large" src="uploads/<?php echo $business_image; ?>" alt="<?php echo $business_name; ?>" onerror="this.src='agr.png'" />
                </div>
                <div class="col">
                    <h2 class="mb-3" style="color: #ffffff;"><?php echo $business_name; ?></h2>
                    <div class="info-item">
                        <i class="ri-user-fill"></i>
                        <span><?php echo $business_owner; ?></span>
                    </div>
                    <div class="info-item">
                        <i class="ri-map-pin-fill"></i>
                        <span><?php echo $business_address; ?></span>
                    </div>
                    <div class="info-item">
                        <i class="ri-phone-fill"></i>
                        <span><?php echo $business_mobile; ?></span>
                    </div>
                    <div class="info-item">
                        <i class="ri-store-2-fill"></i>
                        <span><?php echo $main_cat; ?></span>
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <button class="edit-profile-btn" onclick="editProfile()">
                    <i class="ri-edit-fill"></i> Edit Profile
                </button>
            </div>
        </div>
        <!-- Products Section -->
        <?php if ($result_products->num_rows > 0): ?>
        <section class="products-section">
            <h4 class="mb-4">My Products</h4>
            <div class="row">
                <?php while ($product = $result_products->fetch_assoc()): ?>
                <div class="col-12">
                    <div class="product-item d-flex align-items-center">
                        <div class="me-3">
                            <img class="product-image" src="uploads/<?php echo $product['image']; ?>" alt="<?php echo $product['product_name']; ?>" onerror="this.src='agr.png'" />
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1"><?php echo $product['product_name']; ?></h6>
                            <p class="mb-1 text-muted"><?php echo $product['unit'] . $product['weight_per_kg']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">₹ <?php echo $product['price']; ?>/-</span>
                                <?php if($product['qty'] < 5): ?>
                                    <span class="badge bg-warning">Low Stock</span>
                                <?php else: ?>
                                    <span class="badge bg-success">In Stock</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </section>
        <?php else: ?>
      
        <?php endif; ?>
        <!-- Gallery Section -->
        <section class="gallery-section">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Business Gallery</h4>
                <button class="add-image-btn" onclick="document.getElementById('imageUpload').click()">
                    <i class="ri-add-circle-line"></i> Add Images
                </button>
            </div>
           
            <!-- Hidden file input for multiple images -->
            <input type="file" id="imageUpload" class="hidden" multiple accept="image/*" onchange="handleImageUpload(event)">
           
            <div class="row" id="galleryContainer">
                <!-- Main business image -->
                <div class="col-6 gallery-item" onclick="openModal('uploads/<?php echo $business_image; ?>', 'Business Logo')">
                    <img src="uploads/<?php echo $business_image; ?>" alt="<?php echo $business_name; ?>" onerror="this.src='agr.png'" />
                    <div class="gallery-caption">Business Logo</div>
                </div>
               
                <!-- Existing gallery images from database -->
                <?php foreach ($gallery_images as $index => $gallery_image): ?>
                <div class="col-6 gallery-item" onclick="openModal('uploads/gallery/<?php echo $gallery_image['image_name']; ?>', '<?php echo addslashes($gallery_image['caption']); ?>')">
                    <img src="uploads/gallery/<?php echo $gallery_image['image_name']; ?>" alt="<?php echo $gallery_image['caption']; ?>" onerror="this.src='agr.png'" />
                    <div class="gallery-caption"><?php echo $gallery_image['caption']; ?></div>
                    <button type="button" class="remove-image" onclick="event.stopPropagation(); removeGalleryImageFromDB(<?php echo $gallery_image['id']; ?>)">×</button>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
        <!-- Image Upload Section - This appears when images are selected -->
        <div class="image-upload-section" id="uploadSection" style="display: none;">
            <h5 class="preview-title">Image Preview</h5>
            <div class="row" id="imagePreviewContainer">
                <!-- Image previews will be added here dynamically -->
            </div>
           
            <!-- Save to Database Section - Always visible when upload section is shown -->
            <div class="upload-actions" id="saveSection">
                <form id="saveGalleryForm" method="POST" action="">
                    <input type="hidden" name="business_id" value="<?php echo $business_id; ?>">
                    <input type="hidden" name="image_data" id="imageDataInput">
                    <input type="hidden" name="save_gallery_images" value="1">
                    <button type="button" class="save-to-db-btn" onclick="saveImagesToDatabase()" id="saveButton">
                        <i class="ri-save-line"></i> Save
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="cancelUpload()">
                        <i class="ri-close-line"></i> Cancel
                    </button>
                </form>
            </div>
        </div>
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
    <script>
    let uploadedImages = [];
    let currentImageIndex = 0;
    let galleryImages = [];
   
    // Initialize gallery images array
    document.addEventListener('DOMContentLoaded', function() {
        // Collect all gallery images for navigation
        const galleryItems = document.querySelectorAll('.gallery-item');
        galleryItems.forEach((item, index) => {
            const img = item.querySelector('img');
            const caption = item.querySelector('.gallery-caption').textContent;
            if (img) {
                galleryImages.push({
                    src: img.src,
                    caption: caption
                });
            }
        });
       
        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('businessDropdown');
            const dropdownBtn = document.querySelector('.business-dropdown-btn');
            if (dropdown && !dropdown.contains(event.target) && !dropdownBtn.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });
    });
    // Business Switcher Functions
    function toggleBusinessDropdown() {
        const dropdown = document.getElementById('businessDropdown');
        dropdown.classList.toggle('show');
    }
    function switchBusiness(businessId) {
        window.location.href = 'single.php?switch_business=' + businessId;
    }
    // Page Loader
    window.addEventListener("load", function() {
        const loader = document.getElementById("pageLoader");
        setTimeout(() => {
            loader.classList.add("hidden");
        }, 400);
    });
    function confirmLogout() {
        return confirm("Are you sure you want to log out?");
    }
    // Full Image Preview Modal Functions
    function openModal(imageSrc, caption) {
        const modal = document.getElementById("imageModal");
        const modalImg = document.getElementById("modalImage");
        const captionText = document.getElementById("modalCaption");
       
        // Find the index of the clicked image
        currentImageIndex = galleryImages.findIndex(img => img.src === imageSrc);
        if (currentImageIndex === -1) currentImageIndex = 0;
       
        modal.style.display = "block";
        modalImg.src = imageSrc;
        captionText.innerHTML = caption || '';
       
        // Prevent background scrolling
        document.body.style.overflow = 'hidden';
    }
    function closeModal() {
        const modal = document.getElementById("imageModal");
        modal.style.display = "none";
        document.body.style.overflow = 'auto';
    }
    function changeImage(direction) {
        currentImageIndex += direction;
       
        // Loop around if at ends
        if (currentImageIndex >= galleryImages.length) {
            currentImageIndex = 0;
        } else if (currentImageIndex < 0) {
            currentImageIndex = galleryImages.length - 1;
        }
       
        const modalImg = document.getElementById("modalImage");
        const captionText = document.getElementById("modalCaption");
       
        modalImg.src = galleryImages[currentImageIndex].src;
        captionText.innerHTML = galleryImages[currentImageIndex].caption;
    }
    // Close modal when clicking on X or outside the image
    document.addEventListener('click', function(event) {
        const modal = document.getElementById("imageModal");
        if (event.target === modal) {
            closeModal();
        }
    });
    // Keyboard navigation
    document.addEventListener('keydown', function(event) {
        const modal = document.getElementById("imageModal");
        if (modal.style.display === "block") {
            if (event.key === "Escape") {
                closeModal();
            } else if (event.key === "ArrowLeft") {
                changeImage(-1);
            } else if (event.key === "ArrowRight") {
                changeImage(1);
            }
        }
    });
    // Image upload functionality
    function handleImageUpload(event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('imagePreviewContainer');
        previewContainer.innerHTML = '';
       
        if (files.length === 0) {
            return;
        }
       
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();
           
            reader.onload = function(e) {
                const previewDiv = document.createElement('div');
                previewDiv.className = 'col-6 mb-3';
                previewDiv.innerHTML = `
                    <div class="gallery-item">
                        <img src="${e.target.result}" alt="Preview" />
                        <button type="button" class="remove-image" onclick="removePreview(this)">×</button>
                        <input type="text" class="caption-input" placeholder="Enter caption for this image" />
                    </div>
                `;
                previewContainer.appendChild(previewDiv);
               
                uploadedImages.push({
                    name: file.name,
                    file_data: e.target.result, // Store base64 data for database
                    caption: '',
                    element: previewDiv
                });
            };
           
            reader.readAsDataURL(file);
        }
       
        // Show upload section and enable save button
        document.getElementById('uploadSection').style.display = 'block';
        document.getElementById('saveButton').disabled = false;
        document.getElementById('saveButton').innerHTML = '<i class="ri-save-line"></i> Save Images to Database';
    }
    function removePreview(button) {
        const previewItem = button.closest('.col-6');
        const index = Array.from(previewItem.parentNode.children).indexOf(previewItem);
       
        if (index > -1) {
            uploadedImages.splice(index, 1);
        }
       
        previewItem.remove();
       
        // Hide upload section if no images left
        if (uploadedImages.length === 0) {
            document.getElementById('uploadSection').style.display = 'none';
        }
    }
    function saveImagesToDatabase() {
        if (uploadedImages.length === 0) {
            alert('No images to save! Please select images first.');
            return;
        }
       
        // Update captions from input fields
        uploadedImages.forEach((imageData, index) => {
            const captionInput = imageData.element.querySelector('.caption-input');
            imageData.caption = captionInput.value || 'Business Image ' + (index + 1);
        });
       
        // Prepare data for form submission
        document.getElementById('imageDataInput').value = JSON.stringify(uploadedImages);
       
        // Show loading state
        const saveBtn = document.getElementById('saveButton');
        saveBtn.innerHTML = '<i class="ri-loader-4-line"></i> Saving...';
        saveBtn.disabled = true;
       
        // Submit the form
        document.getElementById('saveGalleryForm').submit();
    }
    function removeGalleryImageFromDB(imageId) {
        if (confirm('Are you sure you want to remove this image from gallery?')) {
            // You can implement AJAX call here to remove image from database
            // For now, we'll just reload the page
            window.location.href = 'single.php?remove_image=' + imageId;
        }
    }
    function cancelUpload() {
        uploadedImages = [];
        document.getElementById('uploadSection').style.display = 'none';
        document.getElementById('imageUpload').value = '';
        document.getElementById('imagePreviewContainer').innerHTML = '';
    }
    function editProfile() {
        window.location.href = 'edit_my_business.php?id=<?php echo $business_id; ?>';
    }
    </script>
    <!-- bootstrap js -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- script js -->
    <script src="../assets/js/script.js"></script>
</body>
</html>