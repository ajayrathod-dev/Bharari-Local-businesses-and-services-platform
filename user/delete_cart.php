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



$id=$_GET['cid'];


 $sql51 = "SELECT * FROM cart WHERE id='$id' AND status='Incart'";
                     $result51 = mysqli_query($link, $sql51);

                     if ($result51->num_rows > 0) {
                         while ($row51 = $result51->fetch_assoc()) {
                             $quantity = $row51['quantity'];
                             $prod_id = $row51['prod_id'];
                             
                         }
                     } 

mysqli_query($link,"UPDATE product SET `qty`=`qty`+$quantity WHERE id='$prod_id'");
$sql = "DELETE FROM cart WHERE id='$id'";

if ($link->query($sql) === TRUE) {
     header('Location:cart.php?success=2');
} else {
  echo "Error deleting record: " . $link->error;
}












?>