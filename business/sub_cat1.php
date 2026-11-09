<?php
session_start();
include("connection.php");

$owner= $_POST['owner'];
$category= $_POST['category'];
$cat_name= $_POST['cat_name'];
$mobile_no= $_POST['mobile_no'];
$address= $_POST['address'];
$password= $_POST['password'];
$latitude= $_POST['latitude'];
$longitude= $_POST['longitude'];
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


$location = 0;
 
           
          $sql="INSERT INTO `sub_cat`(`main_cat`,`sub_cat`,`image`,`mobile_no`,`address`,`location`,`latitude`,`longitude`,`password`,`by`,`bus_owner`) VALUES ('$category','$cat_name','$productPic','$mobile_no','$address','$location','$latitude','$longitude','$password','$mobile_no','$owner')";
         
           $result=mysqli_query($link,$sql);
           if($result>0)
           {

                     
            $p=2100;
             header("Location:sub_cat.php?success=$p");
           }
          else
          {
             header("Location:sub_cat.php?error=2100");
            
          }
            
      
