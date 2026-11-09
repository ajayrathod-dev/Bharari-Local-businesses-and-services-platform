<?php include('header.php'); ?>
<div class="page-wrapper">
       <div class="page-content">
    

         <div class="col-lg-12">
          <div class="alert alert-dark border-0 alert-dismissible fade show" style="height:60px;background: #0b53bf;">
                           <div class="text-white"><h5 class="text-white">Incart List</h5></div>
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
                     <th>Category</th>
                     <th>Business</th>
                     <th>Product Name</th>
                     <th>Quantity</th>
                     <th>Price</th>
                     <th>Total</th>
                     <th>User Id</th>
                     <th>Order Id</th> 
                     <th>Shop Name</th>
                     <th>Status</th>
                     <th>Date</th>
                   <!--   <th>Action</th> -->
                     

                   </tr>
                 </thead>
                 <tbody>
                    <?php
                    $sr = 1;
                    $sql1 = "SELECT * FROM cart order by id DESC";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {
                    ?>
                       <tr>
                         <td><?php echo $sr; ?></td>
                         <td><?php echo $usr1['main_cat']; ?></td> 
                           <td><?php $bs=$usr1['sub_cat'];
                           
                    $sql12 = "SELECT * FROM sub_cat where mobile_no='$bs' order by id DESC";
                    $result12 = mysqli_query($link, $sql12);
                    if ($result12->num_rows > 0) {
                      while ($usr12 = mysqli_fetch_array($result12)) {
                          
                          echo $usr12['sub_cat']."(".$usr12['mobile_no'].")";
                          
                      }
                      
                    }                           ?></td> 
                         <td><?php echo $usr1['product_name']; ?></td> 
                         <td><?php echo $usr1['quantity']; ?></td> 
                         <td><?php echo $usr1['price']; ?></td>
                         <td><?php echo $usr1['total']; ?></td>
                         <td><?php echo $usr1['user_id']; ?></td>
                         <td><?php echo $usr1['order_id']; ?></td>
                         <td><?php echo $usr1['vender_name']; ?></td>
                         <td>

                          <span class="badge rounded-pill bg-warning text-dark"><?php echo $usr1['status']; ?></span></td>
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