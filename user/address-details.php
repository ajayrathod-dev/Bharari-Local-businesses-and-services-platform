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


$sql51 = "SELECT * FROM users WHERE user_id='$u_uname'";

$result51 = mysqli_query($link, $sql51);

if ($result51->num_rows > 0) {

    while ($row51 = $result51->fetch_assoc()) {
      

       $company_name=$row51['company_name'];
       $user_id=$row51['user_id']; 
       $floor=$row51['floor'];
       $tower=$row51['tower'];
       $landmark=$row51['landmark']; 
     




  }
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
    <title>bharari App</title>
    <link rel="apple-touch-icon" href="logo.png" />
    <meta name="theme-color" content="#0b53bf" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="bharari" />
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
        <a href="address.php">
          <i class="ri-arrow-left-s-line"></i>
        </a>
        <h2>Complete Address</h2>
      </div>
    </div>
  </header>
  <!-- header end -->

  <!-- filter section start -->
  <section class="food-filter address-filter">
    <div class="custom-container">
    

      <div class="tab-content restaurant-content" id="TabContent">
        <div class="tab-pane fade show active" id="home-tab">
          <form class="auth-form" action="address1.php" method="post">
               <div class="form-group">
          <label class="form-label fw-semibold">My Name</label>
          <div class="form-input mb-3">
            <input type="text" class="form-control" placeholder="Enter your name" name="name" required/>
          </div>
        </div>
        <div class="form-group">
          <label class="form-label fw-semibold">Mobile Number</label>
          <div class="form-input mb-3">
            <input type="text" class="form-control" placeholder="Enter phone number" readonly name="pno" value="<?php echo $u_uname; ?>" required/>
          </div>
        </div>
              <div class="form-group">
              <label class="form-label fw-semibold">Village</label>
              <div class="form-input mb-3">
                <input type="text" class="form-control" placeholder="Enter Village " name="company" value="<?php echo $company_name ;?>"/>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label fw-semibold">Taluka</label>
              <div class="form-input mb-3">
                <input type="text" class="form-control" placeholder="Enter Taluka" name="floor" value="<?php echo $floor ;?>"/>
              </div>
            </div>
            <div class="form-group">
              <label class="form-label fw-semibold">District</label>
              <div class="form-input mb-3">
                <input type="text" class="form-control" placeholder="Enter District" name="tower" required value="<?php echo $tower;?>">
               
              </div>
            </div>
            <div class="form-group">
              <label class="form-label fw-semibold">State</label>
              <div class="form-input mb-3">
                <input type="text" class="form-control" placeholder="Enter State" name="landmark" value="<?php echo $landmark ;?>" />
              </div>
            </div>
            <button type="submit" class="btn btn-primary save-address w-100">Save Address</button>
          </form>
        </div>
              
      </div>
  </section>
  <!-- filter section start -->

  <!-- address form section start -->
  <section class="section-b-space">

  </section>
  <!-- address form section start -->

  <!-- bootstrap js -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>

  <!-- script js -->
  <script src="../assets/js/script.js"></script>
</body>

</html>