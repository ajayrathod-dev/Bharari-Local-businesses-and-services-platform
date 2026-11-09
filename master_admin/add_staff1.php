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











$s_name= $_POST['s_name'];
$mobile_no= $_POST['mobile_no'];
$address= $_POST['address'];
$uid= $_POST['uid'];
$pwd= $_POST['pwd'];

  
          $sql="INSERT INTO `delivery`(`user_id`, `password`, `name`, `address`, `mobile_no`, `by`) 
          VALUES ('$uid','$pwd','$s_name','$address','$mobile_no','$u_uname')";

           $result=mysqli_query($link,$sql);
           if($result>0)
           {

                     
            $p=21;
             header("Location:add_staff.php?success=$p");
           }
          else
          {
             header("Location:add_staff.php?error=21");
            
          }
            
      
