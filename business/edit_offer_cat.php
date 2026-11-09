<?php

include('header.php');
$id=$_GET['id'];
   
?>

   
       <div class="page-wrapper">
       <div class="page-content">
    

         <div class="col-lg-12">
             <div class="alert alert-dark border-0 bg-dark alert-dismissible fade show" style="height:60px;">
                           <div class="text-white"><h5 class="text-white"> Edit Offer</h5></div>
                        </div>
                     </div>
         <div class="card">
         <div class="card-body">
           
            <div class="mb-2">

                                     <form class="row g-3" action="edit_offer_cat1.php" method="post" enctype="multipart/form-data">
                    

                    <div class="col-md-12">
                    <label for="inputLastName" class="form-label">Upload Image</label>

                     <input type="file" class="form-control" id="exampleInputEmail1" required name="uploadfile">
                <input type="hidden" class="form-control" id="exampleInputEmail1" required name="id" value="<?php echo $id; ?>">


                   </div>
                          
                  <div class="col-12" align="center">
                    <button type="submit" class="btn btn-outline-success px-5">Edit Offer</button>
                  </div>
                </form>


            
                        </div>
                      </div>
                    </div>
         </div>
           
           
           
           
         </div>
     <?php include('footer.php');