<?php
session_start();
include("connection.php");




if (isset($_COOKIE['uuid'])) {

  $u_uname = mysqli_real_escape_string($link, $_COOKIE['uuid']);

} else {

  $u_uname = '';

}



 $sql4 = "SELECT * FROM ods WHERE uuid='$u_uname' AND status='verified'";

$result4 = mysqli_query($link, $sql4);

if ($result4->num_rows > 0) {

  while ($row4 = $result4->fetch_assoc()) {

    $u_uname = mysqli_real_escape_string($link, $row4['user_id']);

    $br_id = mysqli_real_escape_string($link, $row4['user_id']);

  }

} else {

  header("location:logout.php");

  exit;

}





$id= $_POST['id'];

$p_name= $_POST['p_name'];
$s_desc= $_POST['s_desc'];
$unit= $_POST['unit'];
$l_desc= $_POST['l_desc'];
$price= $_POST['price'];
$shop_name= $_POST['shop_name'];
$status= $_POST['status'];
$stars= $_POST['stars'];
$category= $_POST['sub_cat'];
$city= $_POST['city'];
$qty= $_POST['qty'];
$symbol= $_POST['symbol'];
$gst= $_POST['gst'];
$barcode= $_POST['barcode'];
$upload_dir = '../user/uploads/'; // upload directory
  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

  $imgFile = $_FILES['uploadfile']['name'];
  $tmp_dir = $_FILES['uploadfile']['tmp_name'];
  $imgSize = $_FILES['uploadfile']['size'];
  $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
  $productPic = date('iYshmd') . "" . rand(1000, 1000000) . "." . $imgExt;
  if (in_array($imgExt, $valid_extensions)) {
    if ($imgSize < 50000000000) {
      move_uploaded_file($tmp_dir, $upload_dir . $productPic);

      mysqli_query($link,"UPDATE `product` SET `image`='$productPic' WHERE id='$id'");
    }
  } else {
    
  }


$imgFile3 = $_FILES['uploadfile4']['name'];
  $tmp_dir3 = $_FILES['uploadfile4']['tmp_name'];
  $imgSize3 = $_FILES['uploadfile4']['size'];
  $imgExt3 = strtolower(pathinfo($imgFile3, PATHINFO_EXTENSION));
  $productPic3 = date('iYshmd') . "" . rand(1000, 1000000) . "." . $imgExt3;
  if (in_array($imgExt3, $valid_extensions)) {
    if ($imgSize3 < 50000000000) {
      move_uploaded_file($tmp_dir3, $upload_dir . $productPic3);


 mysqli_query($link,"UPDATE `product` SET `image2`='$productPic3' WHERE id='$id'");
     
    } 
  } else {
   
  }

  $imgFile1 = $_FILES['uploadfile2']['name'];
  $tmp_dir1 = $_FILES['uploadfile2']['tmp_name'];
  $imgSize1 = $_FILES['uploadfile2']['size'];
  $imgExt1 = strtolower(pathinfo($imgFile1, PATHINFO_EXTENSION));
  $productPic1 = date('iYshmd') . "" . rand(1000, 1000000) . "." . $imgExt1;
  if (in_array($imgExt1, $valid_extensions)) {
    if ($imgSize1 < 50000000000) {
      move_uploaded_file($tmp_dir1, $upload_dir . $productPic1);

       mysqli_query($link,"UPDATE `product` SET `image3`='$productPic1' WHERE id='$id'");

    } 
  } else {
    
  }

  $imgFile2 = $_FILES['uploadfile3']['name'];
  $tmp_dir2 = $_FILES['uploadfile3']['tmp_name'];
  $imgSize2 = $_FILES['uploadfile3']['size'];
  $imgExt2 = strtolower(pathinfo($imgFile2, PATHINFO_EXTENSION));
  $productPic2 = date('iYshmd') . "" . rand(1000, 1000000) . "." . $imgExt2;
  if (in_array($imgExt2, $valid_extensions)) {
    if ($imgSize2 < 50000000000) {
      move_uploaded_file($tmp_dir2, $upload_dir . $productPic2);

             mysqli_query($link,"UPDATE `product` SET `image4`='$productPic2' WHERE id='$id'");

    } 
  } else {
    
  }

 








           $sql="UPDATE `product` SET `product_name`='$p_name',`sub_cat`='$category',`short_desc`='$s_desc',`long_desc`='$l_desc',`unit`='$unit',`weight_per_kg`='$symbol',`price`='$price',`gst`='$gst',`barcode`='$barcode',`shop_name`='$shop_name',`city`='$city',`status`='$status',`stars`='$stars',`qty`='$qty' WHERE id='$id'";
          


 
           $result=mysqli_query($link,$sql);
           if($result>0)
           {

                     
            $p=21;
             header("Location:add_product.php?success=$p");
           }
          else
          {
            $p=44;
             header("Location:add_product.php?error=$p");
            
          }
            
      
