<?php include('header.php'); ?>


<div class="page-wrapper">
       <div class="page-content">
    

         <div class="col-lg-12">
          <div class="alert alert-dark border-0 alert-dismissible fade show" style="height:60px;background: #0b53bf;">
                           <div class="text-white"><h5 class="text-white">Add Product</h5></div>
                        </div>
          </div>
                    
   
          
           <div class="card">
         <div class="card-body">
            <div class="table-responsive">
                <div class="table-responsive">
               <table id="example2" class="table table-striped table-bordered">
                  <thead>
                   <tr>
                     <th>Sr.No</th>
                     <th>Product Name </th>
                     <th>Quantity</th>
                     <th>Cost Per Unit</th>
                     <th>Date</th>
                     
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $sr = 1;
                    $sql1 = "SELECT * FROM add_qty_log WHERE `by`='$u_uname' order by id desc";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {
                    ?>
                       <tr>
                         <td><?php echo $sr; ?></td>
                         <td><?php echo $usr1['product_name']; ?></td>
                         <td><?php echo $usr1['qty']; ?></td>
                          <td><?php echo $usr1['cost_per_unit']; ?></td> 
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
  </div>   
 
   <?php include('footer.php');?>













