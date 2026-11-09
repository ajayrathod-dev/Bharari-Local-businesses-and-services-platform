<?php include('header.php'); ?>


<div class="page-wrapper">
       <div class="page-content">
    

         <div class="col-lg-12">
          <div class="alert alert-dark border-0 alert-dismissible fade show" style="height:60px;background:#0b53bf;">
                           <div class="text-white"><h5 class="text-white">Add Product</h5></div>
                        </div>
          </div>
                    
        <div class="card">
         <div class="card-body">
         <form class="row g-3" action="add_product1.php" method="post" enctype="multipart/form-data">
             
            <div class="col-md-6">
             <label for="inputPassword" class="form-label">Product Name</label>
        
            <input type="text" class="form-control" placeholder="" name="p_name" />
          </div>
   
    
           <div class="col-md-6">
                    <label for="inputPassword" class="form-label">Business</label>
            <select class="form-control" id="inputLastName" name="sub_cat" required>
                      <option value="">Select</option>

               <?php
 
               $sql10 = "SELECT * FROM sub_cat WHERE status='Approved' order by id DESC";
                    $result10 = mysqli_query($link, $sql10);
                    if ($result10->num_rows > 0) {
                      while ($usr10 = mysqli_fetch_array($result10)) {
                          $main_cat=$usr10['main_cat'];
                    ?>


                      <option value="<?php echo $usr10['mobile_no']; ?>"><?php echo $usr10['sub_cat']; ?></option> 
                    <?php
                                 
                      
                                              }
                    }
                    ?>
                  </select>
          </div>
      
                
               
                  
                   <div class="col-md-6">
                    <label for="inputPassword" class="form-label">Unit</label>
                      <input type="text" class="form-control" id="inputFirstName" name="unit">
                  </div>
                   
                   <div class="col-md-6">
                    <label for="inputPassword" class="form-label">Symbol</label>
                      <input type="text" class="form-control" id="inputFirstName" name="wkg">
                  </div> 
                     <div class="col-md-6">
                    <label for="inputPassword" class="form-label">Quantity</label>
                      <input type="text" class="form-control" id="inputFirstName" name="qty">
                  </div>
                  
                  <div class="col-md-6">
                    <label for="inputFirstName" class="form-label">Short Description</label>
                    <textarea class="form-control" id="inputFirstName" name="s_desc"></textarea> 
                  </div>
                  <div class="col-md-6">
                    <label for="inputPassword" class="form-label">Long Description</label>
                   <textarea class="form-control" id="inputFirstName" name="l_desc"></textarea> 

                  </div>
               
                  <div class="col-md-6">
                    <label for="inputFirstName" class="form-label">Price</label>
                    <input type="text" class="form-control" id="inputFirstName" name="price">
                  </div>
                  
                  <div class="col-md-6">
                    <label for="inputFirstName" class="form-label">Discount</label>
                    <input type="text" class="form-control" id="inputFirstName" name="desc">
                  </div>
                  
                    <div class="col-md-6">
                    <label for="inputFirstName" class="form-label">GST</label>
                    <input type="text" class="form-control" id="inputFirstName" name="gst">
                  </div>
                   
                   <div class="col-md-6">
                    <label for="inputLastName" class="form-label">Shop Name</label>
                    <input type="text" class="form-control" id="inputFirstName" name="shop_name">

                  </div>
                    <div class="col-md-6">
                    <label for="inputLastName" class="form-label">City</label>
                     <input type="text" class="form-control" id="inputFirstName" name="city">

                  </div>
                  <div class="col-md-6">
                    <label for="inputLastName" class="form-label">Status</label>
                    <select class="form-control" id="inputLastName" name="status">
                      <option>Instock</option>
                      <option>Out Of Stock</option>
                    </select>
                  </div>
                   <div class="col-md-6">
                    <label for="inputLastName" class="form-label">Barcode</label>
                     <input type="text" class="form-control" id="inputFirstName" name="barcode">

                  </div>
                   <div class="col-md-6">
                    <label for="inputLastName" class="form-label">Upload Image 1</label>

                     <input type="file" class="form-control" id="exampleInputEmail1" required name="uploadfile">

                   </div>
                 
                 

                  
                  <div class="col-12" align="center">
                    <button type="submit" class="btn btn-outline-primary px-5">Add Product/Service</button>
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
                     <th>Image </th>
                     <th>Main Category</th>
                     <th>Business</th>
                     <th>Product Name/Service</th>
                     <th>Short Description</th>
                     <th>Long Description</th>
                     <th>Unit</th>
                     <th>Price</th> 
                     <th>MRP</th>
                     <th>GST</th>
                     <th>Star Rating</th>
                     <th>Shop Name</th>
                     <th>City</th>
                     <th>Status</th>
                     <th>Quantity</th>
                     <th>Add Quantity</th>
                     <th>Barcode</th>
                     <th>Stock Left For Days</th>
                     <th>Price Increase By In Percentage</th>
                     <th>Predicted Selling Price</th>
                     <th>Date</th>
                     <th>Action</th>
                     

                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $sr = 1;
                    $sql1 = "SELECT * FROM product order by id DESC";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {
                    ?>
                       <tr>
                         <td><?php echo $sr; ?></td>
                         <td><img src="../user/uploads/<?php  echo  $usr1['image'];?>" style="width: 100px;"></td>
                         <td><?php echo $usr1['main_cat']; ?></td> 
                         <td><?php $s1=$usr1['sub_cat'];
                         
                           
              
 
               $sql10 = "SELECT * FROM sub_cat WHERE mobile_no='$s1' order by id DESC";
                    $result10 = mysqli_query($link, $sql10);
                    if ($result10->num_rows > 0) {
                      while ($usr10 = mysqli_fetch_array($result10)) {
                            echo $usr10['sub_cat']."(".$usr10['mobile_no'].")"; 
                                              }
                    }
              
                         
                         ?></td>
                             <td><?php echo $usr1['product_name']; ?></td> 
                         <td><?php echo $usr1['short_desc']; ?></td>
                         <td><?php echo $usr1['long_desc']; ?></td>
                         <td><?php echo $usr1['unit']; ?> <?php echo $usr1['weight_per_kg']; ?></td>
                         <td><?php echo $usr1['price']; ?></td>
                         <td><?php echo $usr1['mrp']; ?></td>
                         <td><?php echo $usr1['gst']; ?></td>
                         <td><?php echo $usr1['stars']; ?></td>
                         <td><?php echo $usr1['shop_name']; ?></td>
                         <td><?php echo $usr1['city']; ?></td>
                         <td> <?php 
           
                         if ($usr1['qty'] > 5) {
                         ?>
                           <span class="badge rounded-pill bg-success text-white">Instock</span>
                         <?php
                           }
                            else
                            {
                              ?>
                             <span class="badge rounded-pill bg-danger text-white">Out Of Stock</span>
                
                              <?php
                
                               }
                              ?>
                         
                         
                         </td>
                          
                          <td><?php echo $usr1['qty']; ?></td>
                          
                            <td>
                             
                               <a href="add_qty.php?id=<?php echo $usr1['id']; ?>">Add Qty</a>
                            </td>
                           <td><?php echo $usr1['barcode']; ?></td>
                            <td>
                              <?php 
                                 $qty = $usr1['qty']; 
$id = $usr1['id'];
$eight_days_ago = date('Y-m-d', strtotime('-8 days'));

$sql12 = "SELECT SUM(quantity) AS total_sold FROM cart WHERE prod_id='$id' AND DATE(date) >= '$eight_days_ago'";
$result12 = mysqli_query($link, $sql12);

$total_sold = 0;
if ($result12 && mysqli_num_rows($result12) > 0) {
    $row12 = mysqli_fetch_assoc($result12);
    $total_sold = $row12['total_sold'] ?? 0;
}

if ($total_sold > 0) {
    $z = $total_sold / 8; // average sale per day
    if ($z > 0) {
        $r = $qty / $z; // estimated days stock will last
        echo round($r, 1) . " days";
    } else {
        echo "N/A";
    }
} else {
    echo "No sales";
}

                                   
                                ?>
                           </td>
                           <td>
                               
                               <form action="price_inc.php" method="post">
                                    <label>Percentage 1</label>
                                    <input type="hidden" value="<?php echo $usr1['id']; ?>" name="prod_id">
                                
                                    <input type="text" name="price_inc_1" value="<?php echo $usr1['price_inc_1']; ?>"><br>
                                    <label>Percentage 2</label>
                                    <input type="text" name="price_inc_2" value="<?php echo $usr1['price_inc_2']; ?>"><br>
                                    <label>Percentage 3</label>
                                    <input type="text" name="price_inc_3" value="<?php echo $usr1['price_inc_3']; ?>"><br>
                                    <label>Percentage 4</label>
                                    <input type="text" name="price_inc_4" value="<?php echo $usr1['price_inc_4']; ?>"><br>
                                    <label>Percentage 5</label>
                                    <input type="text" name="price_inc_5" value="<?php echo $usr1['price_inc_5']; ?>"><br>
                                    <label>Static Value 1</label>
                                    <input type="text" name="static_val1" value="<?php echo $usr1['static_val1']; ?>"><br>
                                    <label>Static Value 2</label>
                                    <input type="text" name="static_val2" value="<?php echo $usr1['static_val2']; ?>"><br>
                                    <label>Static Value 3</label>
                                    <input type="text" name="static_val3" value="<?php echo $usr1['static_val3']; ?>"><br>
                                    <label>Static Value 4</label>
                                    <input type="text" name="static_val4" value="<?php echo $usr1['static_val4']; ?>"><br>
                                    <label>Static Value 5</label>
                                    <input type="text" name="static_val5" value="<?php echo $usr1['static_val5']; ?>"><br>
                                  
                                   <input type="submit">
                                   
                               </form>
                               
                               
                           </td>
                         
                              <td>
                             
                             <?php
$sk = $usr1['main_cat'];
$sql12 = "SELECT * FROM add_qty_log WHERE main_cat='$sk' ORDER BY id DESC LIMIT 1";
$result12 = mysqli_query($link, $sql12);

$cost_per_unit = 0;
if ($result12 && mysqli_num_rows($result12) > 0) {
    $usr12 = mysqli_fetch_assoc($result12);
    $cost_per_unit = (float)$usr12['cost_per_unit'];
}

$pri1 = (float)$usr1['price_inc_1'];
$pri2 = (float)$usr1['price_inc_2'];
$pri3 = (float)$usr1['price_inc_3'];
$pri4 = (float)$usr1['price_inc_4'];
$pri5 = (float)$usr1['price_inc_5'];

$val1 = (float)$usr1['static_val1'];
$val2 = (float)$usr1['static_val2'];
$val3 = (float)$usr1['static_val3'];
$val4 = (float)$usr1['static_val4'];
$val5 = (float)$usr1['static_val5'];

$tot_p = $pri1 + $pri2 + $pri3 + $pri4 + $pri5;
$tot_v = $val1 + $val2 + $val3 + $val4 + $val5;

$yassa = ($cost_per_unit / 100) * $tot_p;
$xree = $cost_per_unit + $yassa;
$final_total = $xree + $tot_v;

// Debug
// echo "Unit Cost: $cost_per_unit<b;
// echo "Total Price Additions: $tot_p";
// echo "Total Static Values: $tot_v<br>";
// echo "Yassa: $yassa<br>";
// echo "Xree: $xree<br>";

echo number_format($final_total, 2);
?>

                              </td>
                                <td><?php echo $usr1['date']; ?></td>
                            <td><a href="edit_prod.php?id=<?php echo $usr1['id']; ?>">Edit</a>
                               <a href="delete_prod.php?id=<?php echo $usr1['id']; ?>">Delete</a>
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