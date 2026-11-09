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




$p_name= $_POST['p_name'];
$main_cat= $_POST['sku_code'];
$s_desc= $_POST['s_desc'];
$unit= $_POST['unit'];
$l_desc= $_POST['l_desc'];
$price= $_POST['price'];
$shop_name= $_POST['shop_name'];
$status= $_POST['status'];
$stars= $_POST['desc'];;
//$category= $_POST['category'];
$city= $_POST['city'];
$sub_cat= $_POST['sub_cat'];
$qty= $_POST['qty'];
$wkg= $_POST['wkg'];
$gst= $_POST['gst'];
$barcode= $_POST['barcode'];
 
  $sql4r = "SELECT * FROM sub_cat WHERE mobile_no='$u_uname'";

$result4r = mysqli_query($link, $sql4r);

if ($result4r->num_rows > 0) {

  while ($row4r = $result4r->fetch_assoc()) {

    $main_cat = mysqli_real_escape_string($link, $row4r['main_cat']);

  }

} else {

  header("location:logout.php");

  exit;

}

 
 
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
    } else {
      $errMSG = "Sorry, your file is too large.";
    }
  } else { 
    echo $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    exit;  
  }
  

 

 
           
          $sql="INSERT INTO `product`(`product_name`,`main_cat`,`sub_cat` ,`short_desc`, `long_desc`, `unit`, `weight_per_kg`,`price`, `shop_name`, `city`, `status`, `stars`,`image`,`qty`,`gst`,`barcode`,`by`)
          VALUES ('$p_name','$main_cat','$u_uname','$s_desc','$l_desc','$unit','$wkg','$price','$shop_name','$city','$status','$stars','$productPic','$qty','$gst','$barcode','$u_uname')";

           $result=mysqli_query($link,$sql);
           if($result>0)
           {

                     
            $p=21;
             header("Location:add_product.php?success=$p");
           }
          else
          {
             header("Location:add_product.php?error=21");
            
          }
            
      
