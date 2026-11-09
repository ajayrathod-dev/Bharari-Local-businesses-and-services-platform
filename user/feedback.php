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
    <meta name="apple-mobile-web-app-title" content="Agrovita" />
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
  <style>
    :root{
      --accent: #0d6efd; /* Red theme */
      --accent-600: #c81e1e;
      --bg: #fff7f7;
      --text: #1f2937;
      --muted: #6b7280;
      --border: #f1d4d4;
    }
 
    .wrap{ min-height:100svh; display:grid; place-items:center; padding:24px; }
    .card{
      width:min(680px, 96vw);
      background:#fff; border:1px solid var(--border); border-radius:20px;
      padding:24px; box-shadow: 0 10px 30px rgba(224,36,36,0.08);
    }
    h1{ margin:0 0 8px; font-size: clamp(20px, 2.5vw, 28px); font-weight:700; }
    p.subtitle{ margin:0 0 18px; color:var(--muted); }

    /* Rating */
    .rating-block{ display:flex; align-items:center; gap:14px; flex-wrap:wrap; }
    .stars{ display:inline-flex; flex-direction: row-reverse; gap:6px; }
    .stars input{ display:none; }
    .stars label{
      font-size:38px; cursor:pointer; line-height:1; user-select:none;
      filter: drop-shadow(0 1px 0 rgba(0,0,0,0.06));
      transition: transform .12s ease;
      color:#d1d5db; /* default gray */
    }
    /* Hover fill */
    .stars label:hover, .stars label:hover ~ label{ color: var(--accent); transform: translateY(-1px) scale(1.02); }
    /* Checked fill */
    .stars input:checked ~ label{ color: var(--accent); }

    .hint{ font-weight:600; color:var(--accent); min-width:120px; }

    textarea{
      width:100%; min-height:110px; resize:vertical; padding:12px 14px;
      border:1px solid var(--border); border-radius:14px; outline:none; font-size:16px;
    }
    textarea:focus{ border-color: var(--accent); box-shadow:0 0 0 4px rgba(224,36,36,0.10); }

    .row{ display:grid; gap:12px; margin-top:16px; }
    .btns{ display:flex; gap:10px; justify-content:flex-end; margin-top:10px; }
    button{
      padding:10px 18px; border-radius:12px; border:1px solid transparent; font-weight:700; cursor:pointer; font-size:15px;
    }
    .btn-outline{ background:#fff; border-color: var(--border); color:var(--text); }
    .btn-primary{ background:var(--accent); color:#fff; }
    .btn-primary:hover{ background:var(--accent-600); }

    .req{ color:var(--accent); }
    .sr-only{ position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border:0; }

    .small{ color:var(--muted); font-size:13px; }
  </style>

</head>

<body class="grocery-color">
    <!-- side bar start -->
    <div class="offcanvas sidebar-offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft">
        <div class="offcanvas-header">
            <img class="img-fluid profile-pic" src="logo.png" alt="profile" />
            <h3>Business/Services</h3>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="sidebar-content">
                <ul class="link-section">
                    <li>
                        <a href="categories.php" class="pages">
                            <h3>All Categories</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                    <li>
                        <a href="profile.php" class="pages">
                            <h3>Your Profile</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                    <li>
                        <a href="reg_business.php" class="pages">
                            <h3>Register Business</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                    <li>
                        <a href="feedback.php" class="pages">
                            <h3>Feedback</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                    <li>
                        <a href="privacy.php" class="pages">
                            <h3>Privacy Policy</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                    <li>
                        <a href="terms.php" class="pages">
                            <h3>Terms & Conditions</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                    <li>
                        <a href="about.php" class="pages">
                            <h3>About</h3>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                    <li>
                        <a href="login.php" class="pages" onclick="return confirmLogout();">
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
  <div class="header-location" style="display: flex; align-items: center; gap: 10px;">
    <img src="logo.png" style="width: 80px; height: auto;">
    <h2 style="margin: 0; font-size: 28px; font-weight: 600;">Bharari</h2>
</div>
                </div>
                <a href="#">
                    <i class="ri-notification-2-fill"></i>
                </a>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- search section starts -->
  

 

  <!-- profile listing start -->
  <section class="section-b-space">
    <div class="custom-container">
      	<form action="feedback1.php" method="post"> 
        <div class="form-group">
          <label class="form-label fw-semibold">Star Rating</label>
          <div class="form-input mb-3">
             
                  <fieldset>
                
          <div class="stars" role="radiogroup" aria-labelledby="ratingLabel">
            <!-- Radio in reverse order so the CSS ~ selector paints all left stars -->
            <input type="radio" name="rating" id="star5" value="5" />
            <label for="star5" title="अतिशय उत्तम">★</label>

            <input type="radio" name="rating" id="star4" value="4" />
            <label for="star4" title="छान">★</label>

            <input type="radio" name="rating" id="star3" value="3" />
            <label for="star3" title="चालेल">★</label>

            <input type="radio" name="rating" id="star2" value="2" />
            <label for="star2" title="मध्यम">★</label>

            <input type="radio" name="rating" id="star1" value="1" />
            <label for="star1" title="खराब">★</label>
          </div>
        </div>
        <div class="small">* 1 = खराब, 2 = मध्यम, 3 = चालेल, 4 = छान, 5 = अतिशय उत्तम</div>
      </fieldset>
          </div>
        </div>
       
        <button type="submit" class="btn btn-primary w-100">Submit</button>
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
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const message = urlParams.get('msg');

    if (message === 'success') {
        alert("Feedback submitted successfully!");
    } else if (message === 'fail') {
        alert("Failed to submit feedback. Try again.");
    }
</script>
    <!-- bootstrap js -->
    <script src="../assets/js/bootstrap.bundle.min.js">
    </script>

    <!-- swiper js -->
    <script src="../assets/js/swiper-bundle.min.js"> </script>
    <script src="../assets/js/custom-swiper.js"> </script>

    <!-- script js -->
    <script src="../assets/js/script.js">
    </script>
</body>

</html>