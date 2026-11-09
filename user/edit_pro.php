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


$name=$_POST['name'];
$company=$_POST['company'];
$floor=$_POST['floor'];
$tower=$_POST['tower'];
$landmark=$_POST['landmark'];
//$city=$_POST['city'];



$sql = "UPDATE users SET user_name='$name',company_name='$company',floor='$floor',tower='$tower',landmark='$landmark' WHERE user_id='$u_uname'";

if ($link->query($sql) === TRUE) {
  header('Location:profile.php?success=1');
} else {
  echo "Error updating record: " . $link->error;
}


?>