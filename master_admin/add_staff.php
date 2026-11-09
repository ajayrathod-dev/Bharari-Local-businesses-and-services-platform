<?php include('header.php'); ?>


<div class="page-wrapper">
       <div class="page-content">
    

         <div class="col-lg-12">
          <div class="alert alert-dark border-0 alert-dismissible fade show" style="height:60px;background: #0b53bf;">
                           <div class="text-white"><h5 class="text-white">Add Staff</h5></div>
                        </div>
          </div>
                    
        <div class="card">
         <div class="card-body">
         <form class="row g-3" action="add_staff1.php" method="post" enctype="multipart/form-data">
             
            <div class="col-md-6">
             <label for="inputPassword" class="form-label">Staff Name</label>
        
            <input type="text" class="form-control" placeholder="" name="s_name" />
          </div>
   
                   <div class="col-md-6">
                    <label for="inputPassword" class="form-label">Address</label>
                      <input type="text" class="form-control" id="inputFirstName" name="address">
                  </div>
                   
                   <div class="col-md-6">
                    <label for="inputPassword" class="form-label">Mobile No</label>
                      <input type="text" class="form-control" id="inputFirstName" name="mobile_no">
                  </div> 
                     <div class="col-md-6">
                    <label for="inputPassword" class="form-label">User Id</label>
                      <input type="text" class="form-control" id="inputFirstName" name="uid">
                  </div>
                  
                  <div class="col-md-6">
                    <label for="inputFirstName" class="form-label">Password</label>
                    <input type="text" class="form-control" id="inputFirstName" name="pwd">
                  </div>
                  
               
                  
                  <div class="col-12" align="center">
                    <button type="submit" class="btn btn-outline-primary px-5">Add Staff</button>
                  </div>
                </form>
   
          </div>
          </div>

          
           <div class="card">
         <div class="card-body">
            <div class="table-responsive">
               <table id="example2" class="table table-striped table-bordered">
                  <thead>
                   <tr>
                     <th>Sr.No</th>
                     <th>Name </th>
                     <th>Address</th>
                     <th>Mobile No</th>
                     <th>User Id</th>
                     <th>Password</th>
                     <th>By</th>
                     <th>Date</th>
                     <th>Action</th>
                     

                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $sr = 1;
                    $sql1 = "SELECT * FROM delivery order by id DESC";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {
                    ?>
                       <tr>
                         <td><?php echo $sr; ?></td>
                       
                         <td><?php echo $usr1['name']; ?></td> 
                         <td><?php echo $usr1['address']; ?></td> 
                         <td><?php echo $usr1['mobile_no']; ?></td>
                         <td><?php echo $usr1['user_id']; ?></td>
                         <td><?php echo $usr1['password']; ?> </td>
                         <td><?php echo $usr1['by']; ?></td>
                         <td><?php echo $usr1['date']; ?></td>
                         <td><a href="delete_staff.php?id=<?php echo $usr1['id']; ?>">Delete</a></td>
                       
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