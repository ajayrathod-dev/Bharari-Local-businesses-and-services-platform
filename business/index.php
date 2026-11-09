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

  <link rel="icon" href="agr.png" type="image/x-icon" />
  <title>Master Admin Panel</title>
  <link rel="apple-touch-icon" href="agr.png" />
  <meta name="theme-color" content="#0b53bf" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <meta name="apple-mobile-web-app-title" content="Agrovita" />
  <meta name="msapplication-TileImage" content="agr.png" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!--Google font-->
  <link rel="stylesheet" href="../assets/css/vendors/metropolis.min.css" />

  <!-- bootstrap css -->
  <link rel="stylesheet" id="rtl-link" type="text/css" href="../assets/css/vendors/bootstrap.min.css" />

  <!-- Theme css -->
  <link rel="stylesheet" id="change-link" type="text/css" href="../assets/css/style.css" />
</head>
<body>
  <!-- onboarding section start -->
  <section class="home">
    <!--<video autoplay muted loop class="cooking-video">-->
    <!--  <source src="../6.mp4" type="video/mp4" />-->
    <!--</video>-->

    <div class="theme-content">
      <div class="custom-container bg-transparent">
        <!--<img class="img-fluid logo" src="agr.png" alt="logo" />-->
        <ul class="slogan">
          <li>Master</li>
          <li><img src="../assets/images/svg/slogan-star.svg" alt="star" /></li>
          <li>Admin</li>
          <li><img src="../assets/images/svg/slogan-star.svg" alt="star" /></li>
          <li>Panel</li>
        </ul>
        <p>Only For Internal Use</p>
        <a href="login.php" class="btn theme-btn start-btn w-100" role="button">Get Started</a>
      </div>
    </div>
  </section>
  <!-- onboarding section end -->

  <!-- pwa install app popup start -->
  <div class="offcanvas offcanvas-bottom addtohome-popup theme-offcanvas" tabindex="-1" id="offcanvas">
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    <div class="offcanvas-body small">
      <div class="app-info">
        <img src="../assets/images/logo/48.png" class="img-fluid" alt="" />
        <div class="content">
          <h3>Master Admin Panel</h3>
          <a href="#">www.indiadoor.com</a>
        </div>
      </div>
      <a href="#!" class="btn theme-btn install-app btn-inline home-screen-btn m-0" id="installApp">Add to Home
        Screen</a>
    </div>
  </div>
  <!-- pwa install app popup start -->

  <!-- bootstrap js -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>

  <!-- homescreen popup js -->
  <!-- <script src="../assets/js/homescreen-popup.js"></script> -->

  <!-- PWA offcanvas popup js -->
  <!-- <script src="../assets/js/offcanvas-popup.js"></script> -->

  <!-- script js -->
  <script src="../assets/js/script.js"></script>
</body>

</html>