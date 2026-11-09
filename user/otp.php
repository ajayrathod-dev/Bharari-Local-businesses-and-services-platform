<?php

session_start();

include("connection.php");

$current_time = date("M d, Y H:i:s");



if (isset($_COOKIE['uuid'])) {

    $u_uname = mysqli_real_escape_string($link, $_COOKIE['uuid']);

} else {

    $u_uname = '';

}

$otp = '';

$sql4 = "SELECT * FROM otp WHERE uuid='$u_uname' AND status='verified'";

$result4 = mysqli_query($link, $sql4);

if ($result4 && $result4->num_rows > 0) {

    while ($row4 = $result4->fetch_assoc()) {

        $user_id = mysqli_real_escape_string($link, $row4['user_id']);

        $otp = mysqli_real_escape_string($link, $row4['otp']);

    }

} else {

    header("location:logout.php");

    exit;

}


if (isset($_POST["login"])) {

    $otps = isset($_POST['otp']) ? mysqli_real_escape_string($link, trim($_POST['otp'])) : '';

    $is_valid = false;

    // Check if entered OTP is default '1234', matches current session OTP, or is found in DB
    if ($otps === '1234' || (!empty($otp) && $otps === $otp)) {
        $is_valid = true;
    } else {
        $sql = "SELECT * FROM otp WHERE otp='$otps' ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($link, $sql);
        if ($result && $result->num_rows > 0) {
            $is_valid = true;
        }
    }

    if ($is_valid) {
        echo "<script>window.location.href='address-details.php?success=1'</script>";
        exit;
    } else {
        echo "<script>window.location.href='otp.php?error=1'</script>";
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
</head>

<body>
  <!-- login page start -->
  <section class="section-b-space pt-0">
    
    <!--<img class="img-fluid login-img" src="../assets/images/background/login-img.jpg" alt="login-img" />-->
    <div style="text-align:center;margin-top:150px;">
        <img class="img-fluid login-img" src="logo.png" alt="login-img" / style="width:200px;text-align:center !important" >
  </div>
   

    <div class="custom-container">
      <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger text-center mt-3" role="alert">
          Invalid OTP! Please try again or use default OTP: <strong>1234</strong>
        </div>
      <?php } ?>
      <form class="auth-form mt-1" method="post">
       
        <div class="form-group mt-4">
          <label class="form-label fw-semibold dark-text">Verify OTP</label>
          
          
            <div class="form-input dark-border-gradient">
              <input type="number" class="form-control" id="phone" placeholder="Enter OTP" value="1234" name="otp" required />

            </div>
         
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-4" role="button" name="login">Verify OTP</button>
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