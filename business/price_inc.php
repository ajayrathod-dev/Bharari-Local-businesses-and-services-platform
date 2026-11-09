<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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


$id= $_POST['prod_id'];
$price_inc_1= $_POST['price_inc_1'];
$price_inc_2= $_POST['price_inc_2'];
$price_inc_3= $_POST['price_inc_3'];
$price_inc_4= $_POST['price_inc_4'];
$price_inc_5= $_POST['price_inc_5'];
$static_val1= $_POST['static_val1'];
$static_val2= $_POST['static_val2'];
$static_val3= $_POST['static_val3'];
$static_val4= $_POST['static_val4'];
$static_val5= $_POST['static_val5'];



             $sql="UPDATE `product` SET `price_inc_1`='$price_inc_1',`price_inc_2`='$price_inc_2',`price_inc_3`='$price_inc_3',`price_inc_4`='$price_inc_4',`price_inc_5`='$price_inc_5',
             `static_val1`='$static_val1',`static_val2`='$static_val2',`static_val3`='$static_val3',`static_val4`='$static_val4',`static_val5`='$static_val5' WHERE id='$id'";
           
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
            
      
