<?php
session_start();
include("connection.php");
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('log_errors', '1');

if (isset($_COOKIE['uuid'])) {

  $u_uname = mysqli_real_escape_string($link, $_COOKIE['uuid']);

} else {

  $u_uname = '';

}



 $sql4 = "SELECT * FROM ods WHERE uuid='$u_uname' AND status='verified'";

$result4 = mysqli_query($link, $sql4);
if ($result4 === false) {
  error_log(mysqli_error($link));
  header("location:logout.php");
  exit;
}
if ($result4->num_rows > 0) {

  while ($row4 = $result4->fetch_assoc()) {

    $u_uname = mysqli_real_escape_string($link, $row4['user_id']);

    $br_id = mysqli_real_escape_string($link, $row4['user_id']);

  }

} else {

  header("location:logout.php");

  exit;

}



$category = "0";
$cat_name = isset($_POST['cat_name']) ? mysqli_real_escape_string($link, $_POST['cat_name']) : '';
$cat_type = isset($_POST['cat_type']) ? mysqli_real_escape_string($link, $_POST['cat_type']) : '';
if ($cat_name === '' || $cat_type === '') {
  header("Location:add_cat11.php?error=400");
  exit;
}



$upload_dir = '../user/uploads/'; // upload directory
  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

  if (!isset($_FILES['uploadfile']) || $_FILES['uploadfile']['error'] !== UPLOAD_ERR_OK) {
  header("Location:add_cat11.php?error=401");
  exit;
}
$imgFile = $_FILES['uploadfile']['name'];
$tmp_dir = $_FILES['uploadfile']['tmp_name'];
$imgSize = $_FILES['uploadfile']['size'];
$imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
if (!in_array($imgExt, $valid_extensions)) {
  header("Location:add_cat11.php?error=415");
  exit;
}
$productPic = date('iYshmd') . rand(1000, 1000000) . "." . $imgExt;
if ($imgSize >= 50000000000) {
  header("Location:add_cat11.php?error=413");
  exit;
}
if (!move_uploaded_file($tmp_dir, $upload_dir . $productPic)) {
  header("Location:add_cat11.php?error=500");
  exit;
}




 
           
          $sql="INSERT INTO `category`(`category_name`,`category_type`,`image`) VALUES ('$cat_name','$cat_type','$productPic')";

         
 
           $result = mysqli_query($link, $sql);
if ($result === false) {
  error_log(mysqli_error($link));
  header("Location:add_cat11.php?error=500");
  exit;
}
header("Location:add_cat11.php?success=2100");
            
      
