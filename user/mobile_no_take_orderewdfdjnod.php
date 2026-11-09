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
    <title>bharari</title>
    <link rel="apple-touch-icon" href="../assets/images/logo/favicon.png" />
    <meta name="theme-color" content="#0b53bf" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="bharari" />
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
    <link rel="stylesheet" id="change-link" type="text/css" href="../assets/css/style.css" />
     <!-- toastr css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            <?php if(isset($_GET['success']) && $_GET['success'] == 21) { ?>
                toastr.success('Product inserted successfully');
            <?php } ?>
             
          
        });
    </script>
   
</head>

<body>
    <!-- side bar start -->
    <div class="offcanvas sidebar-offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft">
        <div class="offcanvas-header">
            <img class="img-fluid profile-pic" src="logo.png" alt="" />
            <h3>Warehouse</h3>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!--<div class="sidebar-content">-->
            <!--    <ul class="link-section">-->
                   
            <!--        <li>-->
            <!--            <a href="home.php" class="pages">-->
            <!--                <h3>Home</h3>-->
            <!--                <i class="ri-arrow-drop-right-line"></i>-->
            <!--            </a>-->
            <!--        </li>-->
                    
            <!--        <li>-->
            <!--            <a href="all_users.php" class="pages">-->
            <!--                <h3>All Users</h3>-->
            <!--                <i class="ri-arrow-drop-right-line"></i>-->
            <!--            </a>-->
            <!--        </li>-->
                    
            <!--        <li>-->
            <!--            <a href="add_product.php" class="pages">-->
            <!--                <h3>Add Product</h3>-->
            <!--                <i class="ri-arrow-drop-right-line"></i>-->
            <!--            </a>-->
            <!--        </li>-->
            <!--        <li>-->
            <!--            <a href="otps.php" class="pages">-->
            <!--                <h3>Otp History</h3>-->
            <!--                <i class="ri-arrow-drop-right-line"></i>-->
            <!--            </a>-->
            <!--        </li>-->
            <!--         <li>-->
            <!--            <a href="add_cat.php" class="pages">-->
            <!--                <h3>Take Order Direct</h3>-->
            <!--                <i class="ri-arrow-drop-right-line"></i>-->
            <!--            </a>-->
            <!--        </li>-->
            <!--         <li>-->
            <!--            <a href="sub_cat.php" class="pages">-->
            <!--                <h3>Add Category</h3>-->
            <!--                <i class="ri-arrow-drop-right-line"></i>-->
            <!--            </a> -->
            <!--        </li>-->
                    
            <!--        <li>-->
            <!--            <a href="banner.php" class="pages">-->
            <!--                <h3>Add Banner</h3>-->
            <!--                <i class="ri-arrow-drop-right-line"></i>-->
            <!--            </a>-->
            <!--        </li>-->
            <!--         <li>-->
            <!--            <a href="incart.php" class="pages">-->
            <!--                <h3>Incart</h3>-->
            <!--                <i class="ri-arrow-drop-right-line"></i>-->
            <!--            </a>-->
            <!--        </li>-->
            <!--         <li>-->
            <!--            <a href="take_order.php" class="pages">-->
            <!--                <h3>All Order</h3>-->
            <!--                <i class="ri-arrow-drop-right-line"></i>-->
            <!--            </a>-->
            <!--        </li>-->
            <!--         <li>-->
            <!--            <a href="kitchen.php" class="pages">-->
            <!--                <h3>Packaging</h3>-->
            <!--                <i class="ri-arrow-drop-right-line"></i>-->
            <!--            </a>-->
            <!--        </li>-->
            <!--         <li>-->
            <!--            <a href="transfer.php" class="pages">-->
            <!--                <h3>Transportation</h3>-->
            <!--                <i class="ri-arrow-drop-right-line"></i>-->
            <!--            </a>-->
            <!--        </li>-->
                    
            <!--        <li>-->
            <!--            <a href="delivery.php" class="pages">-->
            <!--                <h3>Delivery</h3>-->
            <!--                <i class="ri-arrow-drop-right-line"></i>-->
            <!--            </a>-->
            <!--        </li>-->
                    
            <!--         <li>-->
            <!--            <a href="cancel.php" class="pages">-->
            <!--                <h3>Cancel</h3>-->
            <!--                <i class="ri-arrow-drop-right-line"></i>-->
            <!--            </a>-->
            <!--        </li>-->


            <!--        <li>-->
            <!--            <a href="login.php" class="pages">-->
            <!--                <h3>Logout</h3>-->
            <!--                <i class="ri-arrow-drop-right-line"></i>-->
            <!--            </a>-->
            <!--        </li>-->
            <!--    </ul>-->
            <!--</div>-->
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
                       
                            <h2><img src="logo.png" style="width:100px;"></h2>
                           
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
<div class="page-wrapper">
       <div class="page-content">
    

         <div class="col-lg-12">
          <div class="alert alert-dark border-0 bg-dark alert-dismissible fade show" style="height:60px;background: #0b53bf !important;">
                           <div class="text-white"><h5 class="text-white">Take Order Direct</h5></div>
           </div>
          </div>
                    
        <div class="card">
         <div class="card-body">
           
              <form class="row g-3" action="mobile_no_take_orderewdfdjnod1.php" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">
                    <label for="inputFirstName" class="form-label">Mobile No</label>
                    <input type="text" class="form-control" id="inputFirstName" name="mobile_no" required>
                  </div>
                  <div class="col-12" align="center">
                    <button type="submit" class="btn btn-outline-warning px-5">Login</button>
                  </div>
                </form>
                
     </div>
    </div>    
     
    </div>
  </div>    
  <?php include('footer.php');?>