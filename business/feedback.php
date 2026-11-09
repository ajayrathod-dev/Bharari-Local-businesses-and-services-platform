<?php include('header.php'); ?>
<div class="page-wrapper">
       <div class="page-content">
    

         <div class="col-lg-12">
          <div class="alert alert-dark border-0 bg-dark alert-dismissible fade show" style="height:60px;background: #0b53bf;
background: linear-gradient(90deg, rgba(255, 103, 31, 1) 0%, rgba(255, 255, 255, 1) 48%, rgba(4, 106, 56, 1) 100%);">
                           <div class="text-white"><h5 class="text-white">Feedback</h5></div>
                        </div>
          </div>
     
     <div class="card">
         <div class="card-body">
            <div class="table-responsive">
                 <div class="card">
         <div class="card-body">
            <div class="table-responsive">
               <table id="example2" class="table table-striped table-bordered">
                  <thead>
                   <tr>
                     <th>Sr.No</th>
                     <th>Feedback</th>
                     <th>User Id</th>
             
                     <th>Date</th>
                   <!--   <th>Action</th> -->
                     

                   </tr>
                 </thead>
                 <tbody>
                    <?php
                    $sr = 1;
                    $sql1 = "SELECT * FROM feedback order by id DESC";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {
                    ?>
                       <tr>
                         <td><?php echo $sr; ?></td>
                         <td><?php echo $usr1['feedback']; ?></td> 
                         <td><?php echo $usr1['user_id']; ?></td> 
                         
                           <td><?php echo $usr1['date']; ?></td>

                            <!-- <td><a href="edit.php?id=<?php echo $usr1['id']; ?>">Edit</a></td> -->
                       
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
      </div>
    
    </div>
  </div>    
  <?php include('footer.php');?>