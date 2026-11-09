<?php include('header.php'); ?>
<div class="page-wrapper">
       <div class="page-content">
    

         <div class="col-lg-12">
          <div class="alert alert-dark border-0 bg-dark alert-dismissible fade show"  style="height:60px;background: #0b53bf;
background: linear-gradient(90deg, rgba(255, 103, 31, 1) 0%, rgba(255, 255, 255, 1) 48%, rgba(4, 106, 56, 1) 100%);">
                           <div class="text-white"><h5 class="text-white">Edit Product</h5></div>
                        </div>
          </div>
                    
      
      
        <?php
                    $id=$_GET['id'];
                    $sql1 = "SELECT * FROM product WHERE id='$id'";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {

                             $id=$usr1['id'];
                              $product_name=$usr1['product_name'];
                             $category=$usr1['sub_cat'];
                             $short_desc=$usr1['short_desc'];
                             $long_desc=$usr1['long_desc'];
                             $unit=$usr1['unit'];
                             $price=$usr1['price'];
                             $shop_name=$usr1['shop_name'];
                             $city=$usr1['city'];
                             $stars=$usr1['stars'];
                             $status=$usr1['status'];
                             $qty=$usr1['qty'];
                             $gst=$usr1['gst'];
                             $weight_per_kg=$usr1['weight_per_kg'];
                             $datetime=$usr1['date'];
                             $barcode=$usr1['barcode'];

                      }
                    }
                    ?>
        <div class="card">
         <div class="card-body">
                 <form class="row g-3" action="edit_pro1.php" method="post" enctype="multipart/form-data">
                                   <div class="col-md-6">
                    <label for="inputFirstName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="inputFirstName" name="p_name" value="<?php echo $product_name;?>">
                                        <input type="hidden" class="form-control" id="inputFirstName" name="id" value="<?php echo $id;?>">

                  </div>
                    <div class="col-md-6">
                    
                
                 <label for="inputPassword" class="form-label">Sub Category</label>
                     <select class="form-control" id="inputLastName" name="sub_cat">
                      <option><?php echo $category; ?></option>

<?php

               $sql10 = "SELECT * FROM sub_cat order by id DESC";
                    $result10 = mysqli_query($link, $sql10);
                    if ($result10->num_rows > 0) {
                      while ($usr10 = mysqli_fetch_array($result10)) {
                    ?>


                      <option><?php echo $usr10['sub_cat']; ?></option>
                                          
                       

                   <?php
                                              }
                    }
                    ?>
                  </select>
                
                  </div>
                     <div class="col-md-6">
                    <label for="inputPassword" class="form-label">Unit</label>
                      <input type="text" class="form-control" id="inputFirstName" name="unit" value="<?php echo $unit;?>">
                  </div>
                   <div class="col-md-6">
                    <label for="inputPassword" class="form-label">Symbol</label>
                      <input type="text" class="form-control" id="inputFirstName" name="symbol" value="<?php echo $weight_per_kg;?>">
                  </div>
                  
                   <div class="col-md-6">
                    <label for="inputPassword" class="form-label">Quantity</label>
                      <input type="text" class="form-control" id="inputFirstName" name="qty" value="<?php echo $qty;?>">
                  </div>
                  
                  <div class="col-md-6">
                    <label for="inputFirstName" class="form-label">Short Description</label>
                    <textarea class="form-control" id="inputFirstName" name="s_desc"> <?php echo $short_desc; ?></textarea> 
                  </div>
                  <div class="col-md-6">
                    <label for="inputPassword" class="form-label">Long Description</label>
                   <textarea class="form-control" id="inputFirstName" name="l_desc"><?php echo $long_desc;?> </textarea> 

                  </div>
               
                  <div class="col-md-6">
                    <label for="inputFirstName" class="form-label">Price</label>
                    <input type="text" class="form-control" id="inputFirstName" name="price" value="<?php echo $price; ?>">
                  </div>
                   
                   <div class="col-md-6">
                    <label for="inputLastName" class="form-label">Shop Name</label>
                                        <input type="text" class="form-control" id="inputFirstName" name="shop_name" value="<?php echo $shop_name;?>">

                  </div>
                    <div class="col-md-6">
                    <label for="inputLastName" class="form-label">City</label>
                                        <input type="text" class="form-control" id="inputFirstName" name="city" value="<?php echo $city;?>">

                  </div>
                  <div class="col-md-6">
                    <label for="inputLastName" class="form-label">Status</label>
                    
                    <select class="form-control" id="inputLastName" name="status" value="<?php echo $status; ?>">
                      <option>Avialable</option>
                      <option>Not Avialable</option>
                    </select>
                  </div>
                    <div class="col-md-6">
                    <label for="inputPassword" class="form-label">GST</label>
                      <input type="text" class="form-control" id="inputFirstName" name="gst" value="<?php echo $gst;?>">
                  </div>
                   <div class="col-md-6">
                    <label for="inputLastName" class="form-label">Stars</label>
                                        <input type="text" class="form-control" id="inputFirstName" name="stars" value="<?php echo $stars;?>">

                  </div>
                    <div class="col-md-6">
                    <label for="inputLastName" class="form-label">Barcode</label>
                     <input type="text" class="form-control" id="inputFirstName" name="barcode" value="<?php echo $barcode;?>">

                  </div>

                   <div class="col-md-6">
                    <label for="inputLastName" class="form-label">Upload Image 1</label>

                     <input type="file" class="form-control" id="exampleInputEmail1" name="uploadfile">

                   </div>

                   
                 

                  
                  <div class="col-12" align="center">
                    <button type="submit" class="btn btn-outline-success px-5">Update Product</button>
                  </div>
                </form>
     </div>
    </div>
