<?php
session_start();
include("connection.php");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
$owner= $_POST['owner'];
$category= $_POST['category'];
$cat_name= $_POST['cat_name'];
$mobile_no= $_POST['mobile_no'];
$address= $_POST['address'];
$password= $_POST['password'];
$latitude= $_POST['latitude'];
$longitude= $_POST['longitude'];
$upload_dir = 'uploads/'; // upload directory
  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

  $imgFile = $_FILES['uploadfile']['name'];
  $tmp_dir = $_FILES['uploadfile']['tmp_name'];
  $imgSize = $_FILES['uploadfile']['size'];
  $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
  $productPic = date('iYshmd') . "" . rand(1000, 1000000) . "." . $imgExt;
  if (in_array($imgExt, $valid_extensions)) {
    if ($imgSize < 50000000000) {
      move_uploaded_file($tmp_dir, $upload_dir . $productPic);
    } else {
      $errMSG = "Sorry, your file is too large.";
    }
  } else {
    echo $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    exit;
  }


$location = 0;
 
           
          $sql="INSERT INTO `sub_cat`(`main_cat`,`sub_cat`,`image`,`mobile_no`,`address`,`location`,`latitude`,`longitude`,`password`,`by`,`bus_owner`) VALUES ('$category','$cat_name','$productPic','$mobile_no','$address','$location','$latitude','$longitude','$password','$mobile_no','$owner')";
         
           $result=mysqli_query($link,$sql);
           if($result>0)
           {

                     
            $success_message = "Business registred successfully!";
           }
          else
          {
            $error_message = "Business Not registred!";
            
          }
             
      
   
}

?>
<?php $page_title='Business Registration - bharari'; $body_class='grocery-color'; include('includes/header.php'); ?>
     <!-- side bar start -->
    <!-- side bar provided by includes/header.php -->


    <!-- header start -->
    <!-- header provided by includes/header.php -->

    <!-- Business Registration Form start -->
    <section class="section-b-space">
        <div class="custom-container">
            <div class="header-panel">
                <h2>Business Registration</h2>
            </div>
            
            <?php if (isset($success_message)): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $success_message; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            
            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $error_message; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            
             <form class="row g-3" action="reg_business.php" method="post" enctype="multipart/form-data"  onsubmit="return validateAndSubmit();">
                                   <div class="col-md-12">
                    <label for="inputFirstName" class="form-label">Business Owner Name</label>
                    <input type="text" class="form-control" id="inputFirstName" name="owner">
                  </div>
                                   <div class="col-md-12">
                  <label class="form-label">Main Category</label>
                  <select class="form-control" id="categorySelect" name="category">
                      <option value="">Select</option>
<?php
                    $sql1 = "SELECT category_name FROM category ORDER BY id ASC";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {
                    ?>
                      <option value="<?php echo $usr1['category_name']; ?>"><?php echo $usr1['category_name']; ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                  <input class="form-control mt-2" id="categorySearch" list="categoriesList" placeholder="Search category" style="display:none">
                  <datalist id="categoriesList">
<?php
                    $sql1 = "SELECT category_name FROM category ORDER BY id ASC";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {
                    ?>
                      <option value="<?php echo $usr1['category_name']; ?>"></option>
                    <?php
                      }
                    }
                    ?>
                  </datalist>
                  <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="categoryToggle">Search</button>

                  </div>
                    <div class="col-md-12">
                    <label for="inputFirstName" class="form-label">Business Name</label>
                    <input type="text" class="form-control" id="inputFirstName" name="cat_name">
                  </div>
                   <div class="col-md-12">
                    <label for="inputFirstName" class="form-label">Business Mobile No</label>
                    <input type="text" class="form-control" id="inputFirstName" name="mobile_no">
                  </div>
                   <div class="col-md-12">
                    <label for="inputFirstName" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputFirstName" name="address">
                  </div>
                   <div class="col-md-12">
                    <label for="inputFirstName" class="form-label">Password</label>
                    <input type="text" class="form-control" id="inputFirstName" name="password">
                  </div>
                    <div class="col-md-12">
                    <label for="inputLastName" class="form-label">Upload Image</label>

                     <input type="file" class="form-control" id="exampleInputEmail1" required name="uploadfile">

                   </div>
                     <input type="hidden" id="latitude" name="latitude">
                     <input type="hidden" id="longitude" name="longitude">
                            
                  <div class="col-12" align="center">
                    <button type="submit" class="btn btn-primary px-5">Add Business</button>
                  </div>
                </form>
                <script>
          
  // Get location
  navigator.geolocation.getCurrentPosition(
    (pos) => {
      document.getElementById('latitude').value = pos.coords.latitude;
      document.getElementById('longitude').value = pos.coords.longitude;
    },
    (err) => {
      alert('❌ Location permission denied. Please enable location services.');
      console.error(err);
    }
  );



  // Validation before submit
  function validateAndSubmit() {
    if (!selfieData.value) {
      alert("⚠️ Please capture your selfie.");
      return false;
    }
    if (!document.getElementById('latitude').value || !document.getElementById('longitude').value) {
      alert("⚠️ Location not available. Please allow location access.");
      return false;
    }
    return true;
  }
</script>
<script>
  const categorySelect = document.getElementById('categorySelect');
  const categorySearch = document.getElementById('categorySearch');
  const categoryToggle = document.getElementById('categoryToggle');
  function showSearchMode() {
    categorySelect.style.display = 'none';
    categorySelect.removeAttribute('name');
    categorySearch.style.display = 'block';
    categorySearch.setAttribute('name', 'category');
    categoryToggle.textContent = 'Select';
  }
  function showSelectMode() {
    categorySearch.style.display = 'none';
    categorySearch.removeAttribute('name');
    categorySelect.style.display = 'block';
    categorySelect.setAttribute('name', 'category');
    categoryToggle.textContent = 'Search';
  }
  categoryToggle.addEventListener('click', function() {
    if (categorySelect.style.display !== 'none') {
      showSearchMode();
    } else {
      showSelectMode();
    }
  });
  categorySelect.addEventListener('change', function() {
    categorySearch.value = categorySelect.value;
  });
  categorySearch.addEventListener('change', function() {
    var val = categorySearch.value;
    for (var i = 0; i < categorySelect.options.length; i++) {
      var opt = categorySelect.options[i];
      if (opt.value === val || opt.text === val) {
        categorySelect.value = opt.value;
        break;
      }
    }
  });
  showSelectMode();
</script>
            
            <div class="text-center mt-3">
                <p>Already have a business account? <a href="https://ordor.in/bharari/business/login.php">Login to Business Panel</a></p>
            </div>
        </div>
    </section>
    <!-- Business Registration Form end -->

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
    function confirmLogout() {
        return confirm("Are you sure you want to log out?");
    }
    </script>

<?php include('includes/footer.php'); ?>