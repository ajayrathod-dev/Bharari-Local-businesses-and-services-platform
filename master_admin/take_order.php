<?php 
include('header.php');
 ?>
<div class="page-wrapper">
       <div class="page-content">
    

         <div class="col-lg-12">
          <div class="alert alert-dark border-0 alert-dismissible fade show" style="height:60px;background: #0b53bf;">
                           <div class="text-white"><h5 class="text-white">Order List</h5></div>
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
                     <th>Print Invoice</th>
                     <th>Order Id</th>
                     <th>Mobile No</th>
                     <th>Business</th>  
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
                    $playsound = 0;
                    $sql1 = "SELECT * FROM order_place WHERE status='Placed' order by id DESC";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {
                        $playsound = 1;
                        $oid=$usr1['order_id'];
                    ?>
                       <tr>
                         <td><?php echo $sr; ?></td>
                         <td>
                          <a href="invoice_print.php?oid=<?php echo $oid; ?>" class="btn btn-sm btn-primary">Print</a>
                         </td>
                         <td><a href="cart.php?oid=<?php echo $usr1['order_id']; ?>"><?php echo $usr1['order_id']; ?></a></td> 
                         <td><?php echo $usr1['user_id']; ?></td>  
                            <td><?php $bs=$usr1['sub_cat'];
                           
                    $sql12 = "SELECT * FROM sub_cat where mobile_no='$bs' order by id DESC";
                    $result12 = mysqli_query($link, $sql12);
                    if ($result12->num_rows > 0) {
                      while ($usr12 = mysqli_fetch_array($result12)) {
                          
                          echo $usr12['sub_cat']."(".$usr12['mobile_no'].")";
                          
                      }
                      
                    }                           ?></td> 
                         <!--<td><?php echo $usr1['company_name']; ?></td>-->
                         <!--<td><?php echo $usr1['floor']; ?></td>-->
                         <!--<td><?php echo $usr1['tower']; ?></td>-->
                         <!--<td><?php echo $usr1['landmark']; ?></td>-->
                         <!--<td><?php echo $usr1['pincode']; ?></td>-->
                         <td><?php echo $usr1['address']; ?>
                         <td><?php echo $usr1['total']; ?></td>
                          <form method="post" action="packed.php">
                         <td>
                             <?php 
                             if($usr1['status']=='Packed')
                             {
                                 echo '<span class="badge rounded-pill bg-success text-dark">'.$usr1['status'].'</span>';
                             }
                             else
                             {
                                 ?>
                            
                                 <input type="hidden" name="oid" value="<?php echo $oid; ?>">
                             <select name="status">
                                 <option><?php echo $usr1['status']; ?></option>
                                
                                 <option>Packed</option>
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