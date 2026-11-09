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

         $u_uname = mysqli_real_escape_string($link, $row4q['user_id']);

         $otp = mysqli_real_escape_string($link, $row4q['otp']);



    }

} else {

    header("location:logout.php");

    exit;


}


$sql443 = "SELECT sum(total) as ss FROM cart WHERE user_id='$u_uname' AND status='Incart'";

                                    $result443 = $link->query($sql443);

                                    if ($result443->num_rows > 0) {

                                        while ($row443 = $result443->fetch_assoc()) {

                                             $toal_income_no443 = $row443['ss'];

                                        }

                                    } else {

                                         $toal_income_no443 = "0";

                                    }



$sql51 = "SELECT * FROM users WHERE user_id='$u_uname'";

$result51 = mysqli_query($link, $sql51);

if ($result51->num_rows > 0) {

    while ($row51 = $result51->fetch_assoc()) {
      
      

       $floor=$row51['floor'];
       $tower=$row51['tower'];
       $landmark=$row51['landmark'];
    

  }  
}

$address=$floor.",".$tower.",".$landmark;


$order_id = uniqid();       
$sub_cat = $_GET["sub_cat"];
$ids = $_GET["id"];



$sql = "INSERT INTO order_place (`order_id`, `user_id`, `address`, `total`, `status`, `pay_status`,`or_condition`,`sub_cat`)
VALUES ('$order_id', '$u_uname', '$address','$toal_income_no443','Placed','Unpaid','Cash On Delivery','$sub_cat')";

if ($link->query($sql) === TRUE) {
 
mysqli_query($link,"UPDATE cart SET order_id='$order_id',status='Placed' WHERE user_id='$u_uname' AND order_id=0");


$sql512 = "SELECT * FROM cart WHERE order_id='$order_id' AND user_id='$u_uname'";

$result512 = mysqli_query($link, $sql512);

if ($result512->num_rows > 0) {

    while ($row512 = $result512->fetch_assoc()) {
      
       $product_name=$row512['product_name'];
       $quantity=$row512['quantity'];
       $prod_id=$row512['prod_id'];
      
    

  }  
}

$sql5121 = "SELECT * FROM product WHERE id='$prod_id'";
$result5121 = mysqli_query($link, $sql5121);
if ($result5121->num_rows > 0) {

    while ($row5121 = $result5121->fetch_assoc()) {
      
               $qty1=$row5121['qty'];
      
      
    

  }  
}

if($qty1>$quantity)
{
    mysqli_query($link,"UPDATE product SET `qty`=`qty`-'$quantity' WHERE id='$prod_id'");
mysqli_query($link,"INSERT INTO `add_qty_log`(`product_name`, `main_cat`, `qty`) VALUES ('$product_name','$quantity','$prod_id')");
}
else
{
    header('Location:cart.php?error=1');
    
    exit;
}

 header("Location:single.php?success=1&id=$ids");
} else {
  echo "Error: " . $sql . "<br>" . $link->error;
}







?>