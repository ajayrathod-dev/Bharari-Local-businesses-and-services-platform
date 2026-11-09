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
    <title>Bharari App</title>
    <link rel="apple-touch-icon" href="logo.png" />
    <meta name="theme-color" content="#0b53bf" />
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
</head>

<body>
  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <a href="cart.php">
          <i class="ri-arrow-left-s-line"></i>
        </a>
        <h2>Saved Address</h2>
        <a href="address-details.php">
          <i class="ri-add-line theme-color add-square-img"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!--choose Address section start -->
  <section class="section-b-space">
    <div class="custom-container">
      <ul class="address-list">
        <li>
          <div class="address-icon">
            <span>
              <i class="ri-home-5-line"></i>
            </span>
          </div>
          <div class="address-content">
            <div class="form-check address-checkbox p-0">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed1" checked />
            </div>
            <div class="address-place">
              <h5>Home</h5>
            </div>
            <p>21, Thornridge Cir.Syracuse, Connecticut USA - 35624</p>
          </div>
        </li>
        <li>
          <div class="address-icon">
            <span>
              <i class="ri-building-line"></i>
            </span>
          </div>
          <div class="address-content">
            <div class="form-check address-checkbox p-0">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="fixed2" />
            </div>
            <div class="address-place">
              <h5>Work</h5>
            </div>
            <p>21, Thornridge Cir.Syracuse, Connecticut USA - 35624</p>
          </div>
        </li>
      </ul>
      <a href="confirm-location.php" class="btn theme-btn add-select w-100" role="button">Select</a>
    </div>
  </section>
  <!--choose Address section start -->

  <!-- bootstrap js -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>

  <!-- script js -->
  <script src="../assets/js/script.js"></script>
</body>

</html>