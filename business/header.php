<?php



session_start();

include("connection.php");

$current_time = date("M d, Y H:i:s");



if (isset($_COOKIE['uuid'])) {

	$u_uname = mysqli_real_escape_string($link, $_COOKIE['uuid']);

} else {

	$u_uname = '';

}



 $sql4 = "SELECT * FROM ods WHERE uuid='$u_uname' AND status='verified'";

$result4 = mysqli_query($link, $sql4);

if ($result4->num_rows > 0) {

	while ($row4 = $result4->fetch_assoc()) {

		$u_uname = mysqli_real_escape_string($link, $row4['user_id']);

		$br_id = mysqli_real_escape_string($link, $row4['user_id']);

	}

} else {

	header("location:logout.php");

	exit;

}



$sql44 = "SELECT * FROM admin ";

$result44 = mysqli_query($link, $sql44);

if ($result44->num_rows > 0) {

	while ($row44 = $result44->fetch_assoc()) {

		$unit_rate = mysqli_real_escape_string($link, $row44['unit_rate']);


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
    <title>Bharari</title>
    <link rel="apple-touch-icon" href="../assets/images/logo/favicon.png" />
    <meta name="theme-color" content="#0b53bf" />
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

    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/swiper-bundle.min.css" />

    <!-- bootstrap css -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="../assets/css/vendors/bootstrap.min.css" />

    <!-- Theme css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="style.css" />
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

     <!-- toastr css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            <?php if(isset($_GET['success']) && $_GET['success'] == 21) { ?>
                toastr.success('Record inserted successfully');
            <?php } ?>
             
          
        });
    </script>
   
</head>

<body>
    <!-- side bar start -->
    <div class="offcanvas sidebar-offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft">
        <div class="offcanvas-header">
            <img class="img-fluid profile-pic" src="agr.png" alt="" />
            <h3>Business Admin Panel</h3>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="sidebar-content">
                <ul class="link-section">
                   
                    <li>
                        <a href="home.php" class="pages">
                            <h3>Home</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                    <li>
                        <a href="policy.php" class="pages">
                            <h3>Compliance Policy</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                     <li>
                        <a href="sub_cat.php" class="pages">
                            <h3>Register Business</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                  
                    <li>
                        <a href="add_product.php" class="pages">
                            <h3>Add Product</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                   
                     <li>
                        <a href="add_qty_log.php" class="pages">
                            <h3>Add Quantity Log</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                     <li>
                        <a href="https://ordor.in/ubhari/user/mobile_no_take_orderewdfdjnod.php" class="pages">
                            <h3>Customer Backdoor</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                   
                     <li>
                        <a href="incart.php" class="pages">
                            <h3>Incart</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                     <li>
                        <a href="take_order.php" class="pages">
                            <h3>All Order</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                     <li>
                        <a href="kitchen.php" class="pages">
                            <h3>Packaging</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                     <li>
                        <a href="transfer.php" class="pages">
                            <h3>Transportation</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                    
                    <li>
                        <a href="delivery.php" class="pages">
                            <h3>Delivery</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                    
                     <li>
                        <a href="cancel.php" class="pages">
                            <h3>Cancel</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                    

                    <li>
                        <a href="login.php" class="pages">
                            <h3>Logout</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- side bar end -->

    <!-- header start -->
    <header class="section-t-space">
        <div class="custom-container">
            <div class="header">
                <div class="head-content">
                    <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasLeft">
                        <i class="ri-menu-line"></i>
                    </button>
                    <div class="header-location"> 
                       
                            <h2><img src="agr.png" style="width:100px;"></h2>
                           
                        </a>
                    </div>
                </div>
                <a href="#">
                    <i class="ri-notification-2-fill"></i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

  
  <!-- profile listing start -->
  <section class="section-b-space">
    <div class="custom-container">