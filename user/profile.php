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
      

       $user_name=$row51['user_name'];
       $user_id=$row51['user_id']; 
    
       $city=$row51['city']; 
       
       $company_name=$row51['company_name'];
       $floor=$row51['floor'];
       $tower=$row51['tower'];
       $landmark=$row51['landmark']; 
     




  }
}

?>
<?php $page_title='bharari'; $body_class='grocery-color'; include('includes/header.php'); ?>
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
</style>
</head>
<body class="grocery-color">

    <!-- search section starts -->
  

 

  <!-- profile listing start -->
  <section class="section-b-space">
    <div class="custom-container">
      	<form action="edit_pro.php" method="post"> 
        <div class="form-group">
          <label class="form-label fw-semibold">My Name</label>
          <div class="form-input mb-3">
            <input type="text" class="form-control" placeholder="Enter your name" name="name" value="<?php echo $user_name; ?>" />
          </div>
        </div>
        <div class="form-group">
          <label class="form-label fw-semibold">Mobile Number</label>
          <div class="form-input mb-3">
            <input type="text" class="form-control" placeholder="Enter phone number" readonly name="pno" value="<?php echo $user_id; ?>"/>
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
        <button type="submit" class="btn btn-primary w-100">Update </button>
      </form>
    </div>
  </section>
  <!-- profile listing end -->

   <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- bottom navbar start -->
    <div class="navbar-menu">
        <ul>
            <li class="active">
                <a href="landing.php" class="icon logo">
                    <img class="img-fluid unactive" src="../assets/images/svg/home.svg" alt="logo" />
                    <img class="active" src="../assets/images/svg/home-fill.svg" alt="grocery" />
                    <span>Home</span>
                </a>
            </li> 
            <li>
                <a href="single.php" class="icon">
                    <img class="unactive" src="../assets/images/svg/dashboard.svg" alt="food" />
                    <img class="active" src="../assets/images/svg/cube.svg" alt="user" />
                    <span>My Business</span>
                </a>
            </li>
            <li>
                <a href="womens_special.php" class="icon">
                    <img class="unactive" src="../assets/images/svg/grocery.svg" alt="grocery" />
                    <img class="active" src="../assets/images/svg/cube.svg" alt="user" />
                    <span>Womens Special</span>
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
<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
<?php include('includes/footer.php'); ?>