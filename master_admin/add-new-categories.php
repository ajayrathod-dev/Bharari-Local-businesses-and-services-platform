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

    <link rel="icon" href="../assets/images/logo/favicon.png" type="image/x-icon" />
    <title>Agrovita App</title>
    <link rel="apple-touch-icon" href="../assets/images/logo/favicon.png" />
    <meta name="theme-color" content="#51bc00" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="Agrovita" />
    <meta name="msapplication-TileImage" content="../assets/images/logo/favicon.png" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- font link -->
    <link rel="stylesheet" href="../assets/css/vendors/metropolis.min.css" />

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/remixicon.css" />

    <!-- bootstrap css -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="../assets/css/vendors/bootstrap.min.css" />

    <!-- Theme css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="../assets/css/style.css" />
</head>

<body>
    <!-- header start -->
    <header class="section-t-space">
        <div class="custom-container">
            <div class="header-panel">
                <a href="restaurant-menu.php">
                    <i class="ri-arrow-left-s-line"></i>
                </a>
                <h2>Restaurant Details</h2>

            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- add categories section starts -->
    <section class="section-b-space">
        <div class="custom-container">
            <form class="auth-form" target="_blank">
                <h3 class="mt-0 mb-3 dark-text fw-semibold heading">Upload Category Image</h3>
                <div class="d-block w-100">
                    <div class="form-group box-bg">
                        <div class="upload-image">
                            <input class="form-control upload-file" type="file" id="formFileLg">
                            <img class="img-fluid upload-icon " src="../assets/images/svg/gallery-add.svg"
                                alt="gallery-add">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group mt-3">
                            <label class="form-label fw-semibold">Category Name</label>
                            <input type="text" class="form-control shadow-none" placeholder="Enter category name" />
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="fixed-btn">
            <div class="custom-container">
                <div class="d-flex align-items-center flex-nowrap gap-2">
                    <a href="restaurant-menu.php" class="btn gray-btn mt-0 w-100">Cancel</a>
                    <a href="restaurant-menu.php" class="btn theme-btn mt-0 w-100">Save</a>
                </div>
            </div>
        </div>
    </section>
    <!-- add categories section starts -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- bootstrap js -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <!-- script js -->
    <script src="../assets/js/script.js"></script>
</body>

</html>