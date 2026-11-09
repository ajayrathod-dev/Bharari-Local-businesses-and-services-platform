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


$feedback=$_POST['rating'];

$sql = "INSERT INTO `feedback`(`feedback`, `user_id`) VALUES ('$feedback','$u_uname')";

if ($link->query($sql) === TRUE) {
  header('Location:feedback.php?msg=success');
   
} else {
 
     header("Location: feedback.php?msg=fail");
}


?>