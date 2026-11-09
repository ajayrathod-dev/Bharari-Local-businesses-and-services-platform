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
$business_id = 0;
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $business_id = intval($_GET['id']);
} elseif (isset($_SESSION['current_business_id'])) {
    $business_id = intval($_SESSION['current_business_id']);
}
if ($business_id <= 0) {
    header("location:single.php");
    exit;
}
$sql_business = "SELECT * FROM sub_cat WHERE id='$business_id' AND mobile_no='$u_uname' LIMIT 1";
$result_business = mysqli_query($link, $sql_business);
if ($result_business && $result_business->num_rows > 0) {
    $b = $result_business->fetch_assoc();
    $main_cat = $b['main_cat'];
    $sub_cat = $b['sub_cat'];
    $bus_owner = $b['bus_owner'];
    $mobile_no = $b['mobile_no'];
    $address = $b['address'];
    $business_image = $b['image'];
} else {
    header("location:single.php");
    exit;
}
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
    <title>Edit My Business - bharari</title>
    <link rel="apple-touch-icon" href="logo.png" />
    <meta name="theme-color" content="#0b53bf" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="bharari" />
    <meta name="msapplication-TileImage" content="logo.png" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../assets/css/vendors/metropolis.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/bootstrap.min.css" />
    <link rel="stylesheet" id="change-link" type="text/css" href="../assets/css/style.css" />
</head>
<body class="grocery-color">
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
                        <a href="login.php" class="pages" onclick="return confirm('Are you sure you want to log out?');">
                            <h3>Logout</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <header class="section-t-space">
        <div class="custom-container">
            <div class="header">
                <div class="head-content">
                    <a href="single.php"><i class="ri-arrow-left-s-line"></i></a>
                    <h2>Edit My Business</h2>
                </div>
                <a href="#"><i class="ri-notification-2-fill"></i></a>
            </div>
        </div>
    </header>
    <section class="section-b-space">
        <div class="custom-container">
            <form action="update_business.php" method="post" class="row g-3" enctype="multipart/form-data">
                <input type="hidden" name="business_id" value="<?php echo $business_id; ?>" />
                <div class="form-group">
                    <label class="form-label fw-semibold">Business Name</label>
                    <div class="form-input mb-3">
                        <input type="text" class="form-control" name="sub_cat" value="<?php echo htmlspecialchars($sub_cat); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label fw-semibold">Owner Name</label>
                    <div class="form-input mb-3">
                        <input type="text" class="form-control" name="bus_owner" value="<?php echo htmlspecialchars($bus_owner); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label fw-semibold">Mobile Number</label>
                    <div class="form-input mb-3">
                        <input type="text" class="form-control" name="mobile_no" readonly value="<?php echo htmlspecialchars($mobile_no); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label fw-semibold">Address</label>
                    <div class="form-input mb-3">
                        <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($address); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label fw-semibold">Main Category</label>
                    <div class="form-input mb-3">
                        <input type="text" class="form-control" name="main_cat" value="<?php echo htmlspecialchars($main_cat); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label fw-semibold">Business Image</label>
                    <div class="form-input mb-3">
                        <div style="display:flex;align-items:center;gap:12px;">
                            <img src="uploads/<?php echo htmlspecialchars($business_image); ?>" alt="Current Image" style="width:64px;height:64px;object-fit:cover;border-radius:6px;" onerror="this.src='logo.png'" />
                            <input type="file" class="form-control" name="image" accept="image/*" />
                        </div>
                        <small class="text-muted">Leave empty to keep current image.</small>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update</button>
            </form>
        </div>
    </section>
    <section class="panel-space"></section>
    <div class="navbar-menu">
        <ul>
            <li>
                <a href="landing.php" class="icon logo">
                    <img class="img-fluid unactive" src="../assets/images/svg/home.svg" alt="logo" />
                    <img class="active" src="../assets/images/svg/home-fill.svg" alt="grocery" />
                    <span>Home</span>
                </a>
            </li>
            <li class="active">
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
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</body>
</html>