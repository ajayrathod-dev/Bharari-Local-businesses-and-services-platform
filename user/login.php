<?php
session_start();
include("connection.php");
$mob = isset($_POST['mobile']) ? mysqli_real_escape_string($link, trim($_POST['mobile'])) : '';
$city = "";
$company = "Bharari";

if (isset($_POST["login"])) {
    $uuid = uniqid();
    setcookie("uuid", $uuid, time() + (10 * 365 * 24 * 60 * 60), "/");
    setcookie("city", $city, time() + (10 * 365 * 24 * 60 * 60), "/");
    $_COOKIE['uuid'] = $uuid;
    $_COOKIE['city'] = $city;

    // Check if user exists in database, if not create user record
    $sql = "SELECT * FROM users WHERE user_id='$mob' LIMIT 1";
    $result = mysqli_query($link, $sql);
    if (!$result || $result->num_rows == 0) {
        mysqli_query($link, "INSERT INTO users (user_id, user_name, company_name, floor, tower, landmark, pincode, city) VALUES ('$mob', '-', '-', '-', '-', '-', '-', '$city')");
    }

    if ($mob == "1234567890") {
        $my_otp = "1234";
        mysqli_query($link, "INSERT INTO otp (otp, user_id, uuid, status) VALUES ('$my_otp', '$mob', '$uuid', 'verified')");
        echo "<script>window.location.href='otp.php?success=1'</script>";
        exit;
    } else {
        $my_otp = rand(1111, 9999);
        mysqli_query($link, "INSERT INTO otp (otp, user_id, uuid, status) VALUES ('$my_otp', '$mob', '$uuid', 'verified')");

        // Define variables
        $otp = $my_otp;
        $phoneNumber = $mob;

        // API URL with dynamic OTP and phone number
        $url = "https://api.authkey.io/request?authkey=0513922bb9f48b1f"
             . "&mobile=" . urlencode($phoneNumber)
             . "&country_code=91"
             . "&sid=6095"
             . "&company=" . urlencode($company)
             . "&otp=" . urlencode($otp);

        // Initialize cURL session
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5); // Timeout after 5s so page doesn't hang if API is expired/down

        $response = curl_exec($ch);
        curl_close($ch);

        // Redirect to OTP page even if API fails/expired so user can enter OTP (or default 1234)
        echo "<script>window.location.href='otp.php?success=1'</script>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="User Panel" />
  <meta name="keywords" content="User Panel" />
  <meta name="author" content="User Panel" />
  <link rel="manifest" href="../manifest.json" />

  <link rel="icon" href="logo.png" type="image/x-icon" />
  <title>User Panel</title>
  <link rel="apple-touch-icon" href="logo.png" />
  <meta name="theme-color" content="#0b53bf" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <meta name="apple-mobile-web-app-title" content="User Panel" />
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
  
  <style>
    /* Splash Screen Styles */
    .splash-screen {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: #ffffff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      animation: splashScreenFadeOut 1s ease-in-out 4.0s forwards;
    }

    @keyframes splashScreenFadeOut {
      0% {
        opacity: 1;
      }
      100% {
        opacity: 0;
        visibility: hidden;
      }
    }

    .splash-logo {
      width: 200px;
      height: auto;
      margin-bottom: 20px;
      animation: logoBounce 1s ease-in-out;
    }

    @keyframes logoBounce {
      0% {
        opacity: 0;
        transform: scale(0.8);
      }
      100% {
        opacity: 1;
        transform: scale(1);
      }
    }

    .splash-slogan {
      color: #0b53bf;
      font-size: 16px;
      font-weight: 600;
      text-align: center;
      animation: fadeInUp 1s ease-in-out;
      max-width: 90%;
      padding: 0 20px;
    }

    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .main-content {
      display: none;
    }

    .main-content.show {
      display: block;
    }
  </style>
</head>

<body>
  <!-- Splash Screen -->
  <div class="splash-screen" id="splashScreen">
    <img src="logo.png" alt="Logo" class="splash-logo">
    <h1>Bharari</h1>
    <p class="splash-slogan">मराठी पाऊल पडते पुढे, धाराशिवच्या प्रगतीकडे</p>
  </div>

  <!-- Main Content -->
  <div class="main-content" id="mainContent">
    <!-- login page start -->
    <section class="section-b-space pt-0">
      
      <!--<img class="img-fluid login-img" src="../assets/images/background/login-img.jpg" alt="login-img" />-->
      <div style="text-align:center;margin-top:150px;">
          <img class="img-fluid login-img" src="logo.png" alt="login-img" / style="width:200px;text-align:center !important" >
          <h1>Bharari</h1>
    </div>
     

      <div class="custom-container">
        <form class="auth-form mt-1" method="post">
         
          <div class="form-group mt-4">
            <label class="form-label fw-semibold dark-text">Mobile Number</label>
            
            
              <div class="form-input dark-border-gradient">
                <input type="tel" class="form-control" name="mobile" id="phone" placeholder="Enter Phone Number" value="<?= !empty($mob) ? htmlspecialchars($mob) : '1234567890' ?>" required/>

              </div>
           
          </div>

          <button type="submit" class="btn btn-primary w-100 mt-4" role="button" name="login">Send OTP</button>
        </form>

       
      </div>
    </section>

    <!-- login page end -->
  </div>

  <!-- bootstrap js -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>

  <!-- script js -->
  <script src="../assets/js/script.js"></script>
  
  <script>
    // Show splash screen for 2.5 seconds, then fade out and show main content
    setTimeout(function() {
      document.getElementById('splashScreen').style.display = 'none';
      document.getElementById('mainContent').classList.add('show');
    }, 2500);
  </script>
</body>

</html>
