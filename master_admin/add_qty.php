<?php include('header.php'); ?>
<div class="page-wrapper">
       <div class="page-content">
    

         <div class="col-lg-12">
          <div class="alert alert-dark border-0 bg-dark alert-dismissible fade show" style="height:60px;background:#198754 !important;">
                           <div class="text-white"><h5 class="text-white">Add Quantity</h5></div>
                        </div>
          </div>
                    
      
      
        <?php
                    $id=$_GET['id'];
                    $sql1 = "SELECT * FROM product WHERE id='$id' AND `by`='$u_uname'";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {

                             $id=$usr1['id'];
                              $product_name=$usr1['product_name'];
                             $category=$usr1['sub_cat'];
                             $main_cat=$usr1['main_cat'];
                             $short_desc=$usr1['short_desc'];
                             $long_desc=$usr1['long_desc'];
                             $unit=$usr1['unit'];
                             $price=$usr1['price'];
                             $shop_name=$usr1['shop_name'];
                             $city=$usr1['city'];
                             $stars=$usr1['stars'];
                             $status=$usr1['status'];
                             $qty=$usr1['qty'];
                             $datetime=$usr1['date'];

                      }
                    }
                    ?>
        <div class="card">
         <div class="card-body">
                 <form class="row g-3" action="add_qty1.php" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">
                    <label for="inputFirstName" class="form-label">Product Name</label>
                     <input type="text" class="form-control" id="inputFirstName" name="p_name" value="<?php echo $product_name;?>" readonly>


                  </div>
                   <div class="col-md-12">
                    <label for="inputFirstName" class="form-label">Add Quantity</label>
                    <input type="text" class="form-control" id="inputFirstName" name="qty" value="<?php echo $qty;?>">
                    <input type="hidden" class="form-control" id="inputFirstName" name="id" value="<?php echo $id;?>">
                    <input type="hidden" class="form-control" id="inputFirstName" name="sku" value="<?php echo $main_cat;?>">


                  </div>
                   <div class="col-md-12">
                    <label for="inputFirstName" class="form-label">Price Per Unit</label>
                    <input type="text" class="form-control" id="inputFirstName" name="price_p">
                


                  </div>
                  
               
                 
                  <div class="col-12" align="center">
                    <button type="submit" class="btn btn-outline-success px-5">Add Qty</button>
                  </div>
                </form>
     </div>
    </div>
