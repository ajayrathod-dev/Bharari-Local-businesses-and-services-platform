<?php

session_start();
include("connection.php");
error_reporting('0');
$username = $_POST['uname'];
$password = $_POST['password'];

if (isset($_POST["login"])) {
    $sql = "SELECT * FROM sub_cat WHERE mobile_no='$username' AND password='$password' LIMIT 1"; 
    $result = mysqli_query($link, $sql);
    
    if ($result->num_rows > 0) {
        while ($usr = $result->fetch_assoc()) {
            $uuid = uniqid();
            setcookie("uuid", $uuid, time() + (10 * 365 * 24 * 60 * 60));
            $my_otp = rand(111111, 999999);
            mysqli_query($link, "INSERT INTO ods (ots, user_id, uuid, status) VALUES ('$my_otp', '$username', '$uuid', 'verified')");
            echo "<script>window.location.href='home.php?success=1'</script>";
        }
    } else {
        echo "<script>window.location.href='login.php?alert=incorrect_credentials'</script>";
    }
}
?>


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
    <link rel="icon" href="agr.png" type="image/x-icon" />
    <title>Business Admin Panel</title>
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
        <div style="text-align:center;margin-top:150px;">
            <img class="img-fluid login-img" src="agr.png" alt="login-img" style="width:200px;text-align:center !important" />
            <h4>BUSINESS ADMIN PANEL</h4>
        </div>

        <div class="custom-container">
            <form class="auth-form mt-1" action="" method="post">
                <div class="form-group mt-4">
                    <label class="form-label fw-semibold dark-text">Admin Id</label>
                    <div class="form-input dark-border-gradient">
                        <input type="text" class="form-control" name="uname" id="phone" placeholder="Admin Id" />
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label class="form-label fw-semibold dark-text">Password</label>
                    <div class="form-input dark-border-gradient">
                        <input type="password" class="form-control" name="password" id="phone" placeholder="Password" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-4" role="button" name="login">Login</button>
            </form>
        </div>
    </section>
    <!-- login page end -->

    <!-- bootstrap js -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <!-- script js -->
    <script src="../assets/js/script.js"></script>

    <!-- Custom JavaScript to display alert -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('alert')) {
                const alertType = urlParams.get('alert');
                if (alertType === 'incorrect_credentials') {
                    alert('User ID or password incorrect');
                }
            }
        });
    </script>
</body>
</html>
