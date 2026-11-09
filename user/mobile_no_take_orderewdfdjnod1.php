<?php
session_start();
 $uuid = uniqid();
                    setcookie("uuid", $uuid, time() + (10 * 365 * 24 * 60 * 60));
include("connection.php");
  $mob=$_POST['mobile_no'];
 

                    $my_otp = rand(1111, 9999);
                      mysqli_query($link, "INSERT INTO otp (otp, user_id, uuid, status) VALUES ('$my_otp', '$mob', '$uuid', 'verified')");
                      
                    //   echo "INSERT INTO otp (otp, user_id, uuid, status) VALUES ('$my_otp', '$mob', '$uuid', 'verified')";
                    //   exit;
                      
       


                   echo "<script>window.location.href='address-details.php?success=1'</script>";
            
      
?>