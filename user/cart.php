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
   ?>
<?php $page_title='Bharari App'; $body_class='grocery-color'; include('includes/header.php'); ?>
      <style>
         * {box-sizing: border-box;}
         body {font-family: Verdana, sans-serif;}
         .mySlides {display: none;}
         img {vertical-align: middle;}
         /* Slideshow container */
         .slideshow-container {
         max-width: 1000px;
         position: relative;
         margin: auto;
         }
         /* Caption text */
         .text {
         color: #f2f2f2;
         font-size: 15px;
         padding: 8px 12px;
         position: absolute;
         bottom: 8px;
         width: 100%;
         text-align: center;
         }
         /* Number text (1/3 etc) */
         .numbertext {
         color: #f2f2f2;
         font-size: 12px;
         padding: 8px 12px;
         position: absolute;
         top: 0;
         } 
         /* The dots/bullets/indicators */
         .dot {
         height: 15px;
         width: 15px;
         margin: 0 2px;
         background-color: #bbb;
         border-radius: 50%;
         display: inline-block;
         transition: background-color 0.6s ease;
         }
         .active {
         background-color: #e9ecef00;
         }
         /* Fading animation */
         .fade {
         animation-name: fade;
         animation-duration: 1.5s;
         }
         @keyframes fade {
         from {opacity: .4} 
         to {opacity: 1}
         }
         /* On smaller screens, decrease text size */
         @media only screen and (max-width: 300px) {
         .text {font-size: 11px}
         }
         
             .product-name {
    white-space: normal !important;
    word-wrap: break-word;
    overflow-wrap: break-word;
    font-size: 14px;
    line-height: 1.3;
  

      </style>
   </head>
   <body class="grocery-color">
      <!-- header start -->
      <header class="section-t-space">
         <div class="custom-container">
            <div class="header-panel">
               <a href="landing.php">
               <i class="ri-arrow-left-s-line"></i>
               </a>
               <h2>Home</h2>
            </div>
         </div>
      </header>
      <!-- header end -->
      <!-- Add Cart section start -->
      <section>
         <div class="custom-container"> 
            <section>
               <div class="custom-container">
                
                  <?php 
                     $sql51 = "SELECT * FROM cart WHERE user_id='$u_uname' AND status='Incart'";
                     $result51 = mysqli_query($link, $sql51);

                     if ($result51->num_rows > 0) {
                         while ($row51 = $result51->fetch_assoc()) {
                             $cart_id = $row51['id'];
                             $user_id = $row51['user_id'];
                  ?>
                  
                  <div class="horizontal-product-box mt-3">
                     <div class="product-img">
                        <img class="img-fluid img" src="uploads/<?php echo $row51['image'];?>" alt="rp1">
                     </div>
                     <div class="product-content">
                        <h5 class="product-name"><?php echo $row51['product_name'];?></h5>
                        <h6>Price : ₹ <?php echo $row51['price']; ?>/-</h6>
                        <h6>Qty : <?php echo $row51['quantity']; ?> (Weight : <?php echo $row51['unit'] ;?><?php echo $row51['weight_per_kg'] ;?>) </h6>
                        <a href="delete_cart.php?cid=<?php echo $cart_id; ?>" style="color:red !important;"> 
                        <img class="red-symbol" src="trash.png" alt="non-veg" style="width:13px;"/></a>
                        <h3 class="product-price">₹ <?php echo $row51['total']; ?>/-</h3>
                     </div>
                  </div>  
                  <?php 
                         }
                     } else {
                         echo "<p style='color:red; text-align:center; margin-top:20px;'><b>Your Cart is Empty</b></p>";
                     }
                  ?>
               </div>
            </section>

            <?php if ($result51->num_rows > 0) { ?>
            <section class="bill-details">
               <div class="custom-container">
                  <h3 class="fw-semibold dark-text">Bill Details</h3>
                  <div class="total-detail mt-3">
                     <div class="sub-total">
                        <h5>Sub Total</h5>
                        <h5 class="fw-semibold"><?php
                           $sql443 = "SELECT sum(total) as ss FROM cart WHERE user_id='$u_uname' AND status='Incart'";
                           $result443 = $link->query($sql443);
                           if ($result443->num_rows > 0) {
                               while ($row443 = $result443->fetch_assoc()) {
                                   $toal_income_no443 = $row443['ss'];
                                   
                                   $formatted_amount = number_format($toal_income_no443, 2);

                                   echo "₹. $formatted_amount/-";
                                   
                                   
                                   ?>
                                   
                                   <?php
                               }
                           } else {
                               echo $toal_income_no443 = "0";
                           }
                           
                           
   
                           
                           
                         
                        ?></h5>
                     </div>

                     <h6 class="delivery-info light-text mt-2">Save 5Rs. on Delivery fee by ordering above 100</h6>
                     <div class="sub-total pb-3">
                        <h5>Delivery Charge</h5>
                        <h5 class="fw-semibold"> <?php 
                        
                           if($toal_income_no443 <2000)
                           {
                               $charge = 49.00;
                               echo "₹" . number_format($charge, 2) . "/-";
                              
                            
                           }
                           else if($toal_income_no443 > 2000 && $toal_income_no443 <6999)
                           {
                               echo "Free Delivery";
                           }
                            else if($toal_income_no443 > 7000 && $toal_income_no443 <14499)
                           {
                              $charge=99.00;
                               echo "₹.".number_format($charge,2) ."/-";
                           }
                           else
                           {
                              $charge=199.00;
                               echo "₹.".number_format($charge,2) ."/-";
                               
                           }
                        
                        ?>
                         
                        </h5>
                     </div> 
                     
                       
                     <!--<div class="sub-total pb-3">-->
                     <!--   <h5>GST</h5>-->
                     <!--   <h5 class="fw-semibold">₹.  --
                        
                           
                        //   $gst_base = $toal_income_no443 + $charge;
                        //   $gst = round($gst_base * 0.18, 2);

                        //     echo $gst;
                           
                        
                     <!--   -->
                         
                     <!--   </h5>-->
                     <!--</div> -->
                     
                     
                     <div class="grand-total">
                        <h5 class="fw-semibold">Total Amount</h5>
                        <h5 class="fw-semibold amount">₹. <?php 
                        
                        //      if($toal_income_no443 >750)
                        //   {
                               echo $toal_income_no443+$charge; 
                        //   }
                        //   else
                        //   {
                        //       echo $toal_income_no443;
                        //   }
                        
                       ?>/-</h5>
                     </div>
                      
                       <h6 class="delivery-info light-text mt-2">GST included where applicable</h6>
                       
                    
                     <img class="dots-design" src="../assets/images/svg/dots-design.svg" alt="dots">
                  </div>
               </div>
            </section>
            
              <div class="custom-container mb-4">
               <div class="order-summary sa-box">
                  <form method="post" action="place_order.php">
                     <!--<input type="radio" name="MyRadio" value="Cash">&nbsp;Cash On Delivery<br>-->
                     <!-- <input type="radio" name="MyRadio" value="Cash">&nbsp;Online<br>-->
                     
                     <!--This one is automatically checked when the user opens the page-->
                     <!--<input type="radio" name="MyRadio" value="Online">&nbsp;Pay Now-->
                     <input type="hidden" name="name" value="<?php echo $u_uname;?>">
                     <input type="hidden" name="amount" value="<?php echo $toal_income_no443+$charge;?>"
                     </br>
                     <?php
                        if($toal_income_no443>=100)
                        {
                            ?>
                     <input type="submit" value="Cash On Delivery" name="Result" class="btn theme-btn apply-btn w-100"> <!--This button opens Result.php--><br>
                     <?php 
                     
                     $to=round($toal_income_no443+$charge);?>
                     <a href="payment.php?amount=<?php echo $to;?>" class="btn theme-btn apply-btn w-100"> Online Payment</a>
                     <?php
                        }
                        else
                        {
                            ?>
                     <span style="color:red"><b>Minimum Order Should be 100 Rs. </b></span>
                     <?php
                        }
                        ?>
                  </form >
                  <!--<h6>Disclaimer: Orders accepted till 8:00 AM</h6><br>-->
                  <!--<h6>Delivery Time: Morning 8:30 to 11:30</h6>-->
                  <!--<h6>Note: Loose items are weighed during packing.<br>-->
                  <!--      Customers should be present at that time</h6><br>-->
               
                  <!--<h6>Delivery Charges: Free delivery on orders above ₹2000</h6>-->
                  <!--<h6>₹49 delivery charge on orders below ₹2000</h6>-->
                  <!--<h6>bulk handling charge ₹99 on orders above ₹7000</h6><br>-->
                  <!--<h6>Note:Printed bill available on request.<br>-->
                  
                  <!--₹3 extra for hardcopy.</h6><br>        -->


                  <br><br><br><br><br>
            <?php } ?>
         </div>
      </section>
      <!-- bottom navbar start -->
      <div class="navbar-menu">
         <ul>
            <li>
               <a href="landing.php" class="icon logo">
               <img class=" img-fluid unactive" src="../assets/images/svg/home.svg" alt="logo" />
               <img class="active" src="../assets/images/svg/home-fill.svg" alt="grocery" />
               <span>Home</span>
               </a>
            </li>
            <li>
               <a href="categories.php" class="icon">
               <img class="unactive" src="../assets/images/svg/dashboard.svg" alt="food" />
               <span>Category</span>
               </a>
            </li>
            <li>
                <a href="grocery-home.php?main_cat=women special" class="icon">

                    <img class="unactive" src="../assets/images/svg/grocery.svg" alt="grocery" />
                   
                    <span>Womens Special</span>
                </a>
            </li>
            <li class="active">
               <a href="feedback.php" class="icon">
               <img class="unactive" src="../assets/images/svg/cart.svg" alt="pharmacy" />
               <img class="active" src="../assets/images/svg/cart-fill.svg" alt="pharmacy" />
               <span>Feedback</span>
               </a>
            </li>
            <li> 
               <a href="profile.php" class="icon">
               <img class="unactive" src="../assets/images/svg/user.svg" alt="user" />
               <img class="active" src="../assets/images/svg/user-fill.svg" alt="user" />
               <span class="active">You</span>
               </a>
            </li>
         </ul>
      </div>
      <!-- bottom navbar end -->
<?php include('includes/footer.php'); ?>