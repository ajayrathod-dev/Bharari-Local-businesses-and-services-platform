<?php include('header.php');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    // Run the update query
    mysqli_query($link, "UPDATE sub_cat SET status='$status' WHERE id='$id'");
//echo "UPDATE sub_cat SET status='$status' WHERE id='$id'";
    // Redirect properly
    header("Location:sub_cat.php?success=1");
   
}
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
                    <input type="text" class="form-control" id="inputFirstName" name="owner">
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
                    <button type="submit" class="btn btn-outline-primary px-5">Add Business</button>
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

         <div class="col-lg-12">
          <div class="alert alert-dark border-0 alert-dismissible fade show" style="height:60px;background: #0b53bf;">
                           <div class="text-white"><h5 class="text-white">List Of Business</h5></div>
                        </div>
          </div>
                    
        
     <div class="card">
         <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                  <thead>
                   <tr>
                     <th>Sr.No</th>
                     <th>Image</th>
                     <th>Business Owner Name</th>
                     <th>Category Name</th>
                     <th>Business Name</th>
                     <th>Business Mobile No</th>
                     <th>Address</th>
                     <th>Password</th>
                     <th>GPS Location</th>
                     <th>Date</th>
                     <th>Status</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $sr = 1;
                    $sql1 = "SELECT * FROM sub_cat where status='Pending' order by id DESC";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {
                          
                        //  $id= $usr1['main_cat'];
                    ?>
                       <tr>
                         <td><?php echo $sr; ?></td>
                         <td><img src="../user/uploads/<?php  echo  $usr1['image'];?>" style="width: 100px;"></td>
                           <td><?php echo $usr1['bus_owner']; ?></td> 
                         <td><?php echo $usr1['main_cat']; ?></td> 
                         <td><?php echo $usr1['sub_cat']; ?></td> 
                         <td><?php echo $usr1['mobile_no']; ?></td> 
                         <td><?php echo $usr1['address']; ?></td> 
                           <td><?php echo $usr1['password']; ?></td> 
                         <td><?php echo $usr1['latitude']; ?><?php echo $usr1['longitude']; ?></td> 
                         <td><?php echo $usr1['date']; ?></td>
                         <td>
                            
                              <form method="POST">
                                  <select name="status">
                                       <option><?php echo $usr1['status'];    ?></option>
                                      <option>Pending</option>
                                       <option>Approved</option>
                                        <option>Rejected</option>
                                  </select>
                                  <input type="hidden" name="id" value="<?php echo $usr1['id']; ?>">
                                  <input type="submit" value="submit" name="submit">
                                  
                              </form>
                             
                         </td>
                       
                       </tr>

                   <?php
                        $sr++;
                      }
                    }
                    ?>
                 </tbody>

               </table>
            </div>
         </div>
      </div>
    
    </div>
  </div>    
  <?php include('footer.php');?>