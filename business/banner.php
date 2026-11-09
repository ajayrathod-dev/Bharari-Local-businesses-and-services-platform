<?php include('header.php'); ?>
<div class="page-wrapper">
       <div class="page-content">
    

         <div class="col-lg-12">
          <div class="alert alert-dark border-0 bg-dark alert-dismissible fade show" style="height:60px;background: #FF671F;
background: linear-gradient(90deg, rgba(255, 103, 31, 1) 0%, rgba(255, 255, 255, 1) 48%, rgba(4, 106, 56, 1) 100%);">
                           <div class="text-white"><h5 class="text-white">Add Banner</h5></div>
                        </div>
          </div>
                    
        <div class="card">
         <div class="card-body">
           
           <form class="row g-3" action="banner1.php" method="post" enctype="multipart/form-data">
                                 
                  <div class="col-md-6">
                    <label for="inputFirstName" class="form-label">Upload Image1</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" required name="uploadfile1">
                  </div>

                    <div class="col-md-6">
                    <label for="inputLastName" class="form-label">Upload Image2</label>

                     <input type="file" class="form-control" id="exampleInputEmail1" required name="uploadfile2">

                   </div>
                   <div class="col-md-6">
                    <label for="inputLastName" class="form-label">Upload Image3</label>

                     <input type="file" class="form-control" id="exampleInputEmail1" required name="uploadfile3">

                   </div>
                          
                  <div class="col-12" align="center">
                    <button type="submit" class="btn btn-outline-success px-5">Add Banner</button>
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
                     <th>Image1</th>
                     <th>Image2</th>
                     <th>Image3</th>
                     <th>Date</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $sr = 1;
                    $sql1 = "SELECT * FROM banner order by id DESC";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {
                        
                    ?>
                       <tr>
                         <td><?php echo $sr; ?></td>
                           <td><img src="../user/banner/<?php  echo  $usr1['image1'];?>" style="width: 100px;"></td>
                           <td><img src="../user/banner/<?php  echo  $usr1['image2'];?>" style="width: 100px;"></td>
                           <td><img src="../user/banner/<?php  echo  $usr1['image3'];?>" style="width: 100px;"></td>
                           <td><?php echo $usr1['date']; ?></td>
                         
                       
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