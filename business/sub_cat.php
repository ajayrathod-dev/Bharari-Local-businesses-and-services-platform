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
include('header.php');

?>

<div class="page-wrapper">
       <div class="page-content">
    
         <div class="col-lg-12">
          <div class="alert alert-dark border-0 alert-dismissible fade show" style="height:60px;background: #0b53bf;">
                           <div class="text-white"><h5 class="text-white">Add Business</h5></div>
                        </div>
          </div>
                    
        <div class="card">
         <div class="card-body">
           
             <form class="row g-3" action="sub_cat1.php" method="post" enctype="multipart/form-data"  onsubmit="return validateAndSubmit();">
                                   <div class="col-md-6">
                    <label for="inputFirstName" class="form-label">Business Owner Name</label>
                    <input type="text" class="form-control" id="inputFirstName" name="">
                  </div>
                                   <div class="col-md-6">
                    <label for="inputPassword" class="form-label">Main Category</label>
                     <select class="form-control" id="inputLastName" name="category">
                      <option>Select</option>

<?php

               $sql1 = "SELECT * FROM category order by id DESC";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {
                    ?>


                      <option><?php echo $usr1['category_name']; ?></option>
                                          
                       

                   <?php
                                              }
                    }
                    ?>
                  </select>

                  </div>
                    <div class="col-md-6">
                    <label for="inputFirstName" class="form-label">Business Name</label>
                    <input type="text" class="form-control" id="inputFirstName" name="cat_name">
                  </div>
                   <div class="col-md-6">
                    <label for="inputFirstName" class="form-label">Business Mobile No</label>
                    <input type="text" class="form-control" id="inputFirstName" name="mobile_no">
                  </div>
                   <div class="col-md-6">
                    <label for="inputFirstName" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputFirstName" name="address">
                  </div>
                   <div class="col-md-6">
                    <label for="inputFirstName" class="form-label">Password</label>
                    <input type="text" class="form-control" id="inputFirstName" name="password">
                  </div>
                    <div class="col-md-6">
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

     </div>
    </div>    

       
    
    </div>
  </div>    
  <?php include('footer.php');?>