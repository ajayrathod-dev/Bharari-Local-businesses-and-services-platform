<?php

session_start();

include("connection.php");

$current_time = date("M d, Y H:i:s");



if (isset($_COOKIE['uuid'])) {

    $u_uname = mysqli_real_escape_string($link, $_COOKIE['uuid']);


} else {

    $u_uname = '';

}



 $sql4q = "SELECT * FROM otp WHERE uuid='$u_uname' AND status='verified'";

$result4q = mysqli_query($link, $sql4q);

if ($result4q->num_rows > 0) {

    while ($row4q = $result4q->fetch_assoc()) {

         $u_uname1 = mysqli_real_escape_string($link, $row4q['user_id']);


         $otp = mysqli_real_escape_string($link, $row4q['otp']);



    }

} else {

    header("location:logout.php");

    exit;

}

$ids=$_GET['ids'];
$qty=$_GET['qty'];

                 
$sql51 = "SELECT * FROM product WHERE id='$ids'";

$result51 = mysqli_query($link, $sql51);

if ($result51->num_rows > 0) {

    while ($row51 = $result51->fetch_assoc()) {
      
       $id=$row51['id'];
       $product_name=$row51['product_name'];
       $shop_name=$row51['shop_name'];
       $qty1=$row51['qty'];
       $price=$row51['price']; 
       $image=$row51['image'];
       $main_cat=$row51['main_cat']; 
       $sub_cat=$row51['sub_cat']; 
       $category=$row51['category']; 
       $unit1=$row51['unit']; 
       $weight_per_kg=$row51['weight_per_kg']; 
       
  }
}

if($qty1 < 2){

     header("Location:single.php?error=1&id=$ids");
     exit;
}
 
 
$tot=$qty*$price;

$sql = "INSERT INTO cart (`product_name`, `main_cat`,`sub_cat`,`quantity`, `price`, `total`, `user_id`, `order_id`, `vender_name`, `status`,`image`,`prod_id`,`unit`,`weight_per_kg`)
VALUES ('$product_name', '$main_cat','$sub_cat','$qty', '$price','$tot','$u_uname1','0','$shop_name','Incart','$image','$id','$unit1','$weight_per_kg')";

if ($link->query($sql) === TRUE) {
 

    mysqli_query($link,"UPDATE product SET `qty`=`qty`-$qty WHERE id='$ids'");
    
  header("Location:single.php?id=$ids&success=1");

     
 } else {
   header('Location:single.php?error=1&id=$ids');
}


?>