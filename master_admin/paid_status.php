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


if (isset($_GET['pay_id'])) {
    $id = mysqli_real_escape_string($link, $_GET['pay_id']);

     $sql = "UPDATE credit SET status=1 WHERE id = '$id'";

if ($link->query($sql) === TRUE) {
    header("location:credit.php?success=1");
} else {
 header("location:credit.php?error=1");
}
     
}
?>
