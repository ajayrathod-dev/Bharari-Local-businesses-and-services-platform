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

  <link rel="icon" href="../assets/images/logo/favicon.png" type="image/x-icon" />
  <title>Bharari App</title>
  <link rel="apple-touch-icon" href="../assets/images/logo/favicon.png" />
  <meta name="theme-color" content="#0b53bf" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <meta name="apple-mobile-web-app-title" content="Bharari" />
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
        <a href="food-home.php">
          <i class="ri-arrow-left-s-line"></i>
        </a>
        <h2>Empty-Cart</h2>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- cart start -->
  <div class="custom-container">
    <div class="empty-tab">
      <img class="img-fluid empty-cart w-100" src="../assets/images/empty-cart.svg" alt="empty-cart" />

      <h2>Your Cart is Empty!!</h2>
      <h5 class="mt-3">Looks like you haven’t added anything to your cart yet</h5>

      <a href="food-home.php" class="btn theme-btn w-100 mt-3 mb-3" role="button">Back to Home</a>
    </div>
  </div>
  <!-- cart end -->

  <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->

  <!-- bottom navbar start -->
  <div class="navbar-menu">
    <ul>
      <li>
        <a href="food-home.php">
          <div class="icon">
            <img class="unactive" src="../assets/images/svg/home.svg" alt="home" />
            <img class="active" src="../assets/images/svg/home-fill.svg" alt="home" />
          </div>
          <span>Home</span>
        </a>
      </li>
      <li>
        <a href="offer.php">
          <div class="icon">
            <img class="unactive" src="../assets/images/svg/offer.svg" alt="offer" />
            <img class="active" src="../assets/images/svg/offer-fill.svg" alt="offer" />
          </div>
          <span>Offer</span>
        </a>
      </li>

      <li class="active">
        <a href="cart.php">
          <div class="icon">
            <img class="unactive" src="../assets/images/svg/cart.svg" alt="cart" />
            <img class="active" src="../assets/images/svg/cart-fill.svg" alt="cart" />
          </div>
          <span class="active">Cart</span>
        </a>
      </li>
      <li>
        <a href="profile.php">
          <div class="icon">
            <img class="unactive" src="../assets/images/svg/user.svg" alt="user.svg" />
            <img class="active" src="../assets/images/svg/user-fill.svg" alt="user-fill.svg" />
          </div>
          <span>Profile</span>
        </a>
      </li>
    </ul>
  </div>
  <!-- bottom navbar end -->
  <!-- bootstrap js -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>

  <!-- script js -->
  <script src="../assets/js/script.js"></script>
</body>

</html>