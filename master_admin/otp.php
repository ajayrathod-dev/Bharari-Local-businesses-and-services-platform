
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
  <title>Agrovita App</title>
  <link rel="apple-touch-icon" href="agr.png" />
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
  <!-- login page start -->
  <section class="section-b-space pt-0">
    
    <!--<img class="img-fluid login-img" src="../assets/images/background/login-img.jpg" alt="login-img" />-->
    <div style="text-align:center;margin-top:150px;">
        <img class="img-fluid login-img" src="agr.png" alt="login-img" / style="width:200px;text-align:center !important" >
  </div>
   

    <div class="custom-container">
      <form class="auth-form mt-1" action="restaurant-partner-details.php" method="post">
       
        <div class="form-group mt-4">
          <label class="form-label fw-semibold dark-text">Verify OTP</label>
          
          
            <div class="form-input dark-border-gradient">
              <input type="number" class="form-control" id="phone" placeholder="Enter OTP" />

            </div>
         
        </div>

        <button type="submit" class="btn theme-btn w-100 mt-4" role="button">Verify OTP</button>
      </form>

     
    </div>
  </section>

  <!-- login page end -->

  <!-- bootstrap js -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>

  <!-- script js -->
  <script src="../assets/js/script.js"></script>
</body>

</html>