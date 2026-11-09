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



$category= "0";
$cat_name= $_POST['cat_name'];



$upload_dir = '../Restaurant-Order-Panel/uploads/'; // upload directory
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




 
           
          $sql="INSERT INTO `offer`(`main_cat`,`sub_cat`,`image`) VALUES ('$category','$cat_name','$productPic')";

         
 
           $result=mysqli_query($link,$sql);
           if($result>0)
           {

                     
            $p=2100;
             header("Location:offer.php?success=$p");
           }
          else
          {
             header("Location:offer.php?error=2100");
            
          }
            
      
