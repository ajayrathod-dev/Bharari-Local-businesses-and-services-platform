<?php
if (!isset($page_title) || !$page_title) {
    $page_title = 'bharari';
}
$logo_path = (file_exists(__DIR__ . '/../logo.png')) ? 'logo.png' : 'agr.png';
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
    <link rel="icon" href="<?php echo $logo_path; ?>" type="image/x-icon" />
    <title><?php echo $page_title; ?></title>
    <link rel="apple-touch-icon" href="<?php echo $logo_path; ?>" />
    <meta name="theme-color" content="#0b53bf" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="bharari" />
    <meta name="msapplication-TileImage" content="<?php echo $logo_path; ?>" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="../assets/css/vendors/metropolis.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/remixicon.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/swiper-bundle.min.css" />
    <link rel="stylesheet" id="rtl-link" type="text/css" href="../assets/css/vendors/bootstrap.min.css" />
    <link rel="stylesheet" id="change-link" type="text/css" href="../assets/css/style.css" />
</head>
<?php $cls = isset($body_class) && $body_class ? ' class="'.$body_class.'"' : ''; ?>
<body<?php echo $cls; ?>>
    <div class="offcanvas sidebar-offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft">
        <div class="offcanvas-header">
            <img class="img-fluid profile-pic" src="<?php echo $logo_path; ?>" alt="profile" />
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
                    <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
                        <i class="ri-menu-line"></i>
                    </button>
                    <div class="header-location" style="display: flex; align-items: center; gap: 10px;">
                        <img src="<?php echo $logo_path; ?>" style="width: 80px; height: auto;">
                        <h2 style="margin: 0; font-size: 28px; font-weight: 600;">Bharari</h2>
                    </div>
                </div>
                <a href="#">
                    <i class="ri-notification-2-fill"></i>
                </a>
            </div>
        </div>
    </header>