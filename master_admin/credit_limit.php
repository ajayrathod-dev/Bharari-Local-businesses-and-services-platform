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
$amount= $_POST['amount'];



            $sql="UPDATE `users` SET `credit_limit`='$amount' WHERE id='$id'";
            $result=mysqli_query($link,$sql);
           if($result>0)
           {
             
                     
            $p=21;
             header("Location:all_users.php?success=$p");
           }
          else
          {
            $p=44;
             header("Location:all_users.php?error=$p");
            
          }
            
      
