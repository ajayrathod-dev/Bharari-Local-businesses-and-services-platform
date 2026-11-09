<?php include('header.php'); ?>
<div class="page-wrapper">
       <div class="page-content">
    

         <div class="col-lg-12">
          <div class="alert alert-dark border-0 alert-dismissible fade show" style="height:60px;background: #0b53bf;">
                           <div class="text-white"><h5 class="text-white">Add Category</h5></div>
                        </div>
          </div>
                    
        <div class="card">
         <div class="card-body">
           
             <form class="row g-3" action="add_cat111.php" method="post" enctype="multipart/form-data">
                              
                    <div class="col-md-6">
                    <label for="inputFirstName" class="form-label"> Category Name</label>
                    <input type="text" class="form-control" id="inputFirstName" name="cat_name">
                  </div>
                    <div class="col-md-6">
                    <label for="inputFirstName" class="form-label"> Category Type</label>
                    <select class="form-control" id="inputFirstName" name="cat_type">
                        <option>Goods</option>
                        <option>Services</option>
                    </select>    
                  </div>
                   <div class="col-md-6">
                    <label for="inputLastName" class="form-label">Upload Image</label>

                     <input type="file" class="form-control" id="exampleInputEmail1" required name="uploadfile">

                   </div>
                          
                  <div class="col-12" align="center">
                    <button type="submit" class="btn btn-outline-primary px-5">Add Category</button>
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
                     <th>Image</th>
                     <th>Category Name</th>
                     <th>Category Type</th>
                      <th>Date</th>
                     <th>Action</th>
                    
                     

                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $sr = 1;
                    $sql1 = "SELECT * FROM category order by id DESC";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {
                          
                        //  $id= $usr1['main_cat'];
                    ?>
                       <tr>
                         <td><?php echo $sr; ?></td>
                           <td><img src="../user/uploads/<?php  echo  $usr1['image'];?>" style="width: 100px;"></td>
                        
                         <td><?php echo $usr1['category_name']; ?></td> 
                           <td><?php echo $usr1['category_type']; ?></td> 
                         <td><?php echo $usr1['date']; ?></td>
                         <td>
                              <a href="edit_cat.php?id=<?php echo $usr1['id']; ?>">Edit</a>

                               <a href="delete_cat.php?id=<?php echo $usr1['id']; ?>">Delete</a>
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