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


$id= $_POST['id'];
$p_name= $_POST['p_name'];
$qty= $_POST['qty'];
$sku= $_POST['sku'];
$price_p= $_POST['price_p'];


            $sql="UPDATE `product` SET `qty`=`qty`+'$qty' WHERE id='$id'";
            $result=mysqli_query($link,$sql);
           if($result>0)
           {
              mysqli_query($link,"INSERT INTO `add_qty_log`(`product_name`, `main_cat` ,`qty`,`cost_per_unit`,`by`) VALUES ('$p_name','$sku','$qty','$price_p','$u_uname')");
                     
            $p=21;
             header("Location:add_product.php?success=$p");
           }
          else
          {
            $p=44;
             header("Location:add_product.php?error=$p");
            
          }
            
      
