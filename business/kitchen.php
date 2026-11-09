<?php 

include('connection.php');
if (isset($_POST['submit'])) {

  $status=$_POST['status'];
  $oid=$_POST['oid'];
  
  mysqli_query($link,"UPDATE order_place SET status='$status' WHERE order_id='$oid'");
    mysqli_query($link,"UPDATE cart SET status='$status' WHERE order_id='$oid'");

  header('Location:kitchen.php?success=1717');
  
  

} 
include('header.php');
 ?>
<div class="page-wrapper">
       <div class="page-content">
    

         <div class="col-lg-12">
          <div class="alert alert-dark border-0 alert-dismissible fade show" style="height:60px;background: #0b53bf;">
                           <div class="text-white"><h5 class="text-white">Packaging List</h5></div>
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
                     <th>Order Id</th>
                     <th>Customer Number</th>
                     <th>Address</th>
                     <th>Total</th>
                     <th>Status</th>
                     <th>Pay Status</th> 
                     <th>Condition</th>
                     <th>Date</th>
                     
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $sr = 1;
                    $sql1 = "SELECT * FROM order_place WHERE status='Packed' AND `sub_cat`='$u_uname'order by id DESC";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {
                    ?>
                       <tr>
                         <td><?php echo $sr; ?></td>
                         <td><a href="cart.php?oid=<?php echo $usr1['order_id']; ?>"><?php echo $usr1['order_id']; ?></a></td> 
                         <td><?php echo $usr1['user_id']; ?></td> 
                         <td><?php echo $usr1['address']; ?></td>
                         <td><?php echo $usr1['total']; ?></td>
                         <form method="post">
                         <td>
                             <?php 
                             if($usr1['status']=='Transported')
                             {
                                 echo '<span class="badge rounded-pill bg-success text-dark">'.$usr1['status'].'</span>';
                             }
                             else
                             {
                                 ?>
                             
                                 <input type="hidden" name="oid" value="<?php echo $usr1['order_id']; ?>">
                             <select name="status">
                                 <option><?php echo $usr1['status']; ?></option>
                                
                                 <option>Transported</option>
                             </select>
                             <input type="submit" name="submit" value="Submit">
                             <?php } ?>
                            </td>
                            </form>
                         <td><?php echo $usr1['pay_status']; ?></td>
                         <td><?php echo $usr1['or_condition']; ?></td>
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
    
    </div>
  </div>    
  <?php include('footer.php');?>