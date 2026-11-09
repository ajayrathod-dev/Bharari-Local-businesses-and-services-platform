<?php



session_start();

include("connection.php");

$current_time = date("M d, Y H:i:s");



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



$sql44 = "SELECT * FROM admin ";

$result44 = mysqli_query($link, $sql44);

if ($result44->num_rows > 0) {

	while ($row44 = $result44->fetch_assoc()) {

		$unit_rate = mysqli_real_escape_string($link, $row44['unit_rate']);


	}

}



// Get value from DB
$sql = "SELECT * FROM order_place WHERE audio_tx=1 LIMIT 1";
$result = $link->query($sql);
$playSound = 0;
if ($result && $row = $result->fetch_assoc()) {

?>

    <audio id="alertSound" loop>
        <source src="alarm.mp3" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>

    <script>
        const sound = document.getElementById("alertSound");
            const playOnInteraction = () => {
                sound.play().catch(e => console.log("Playback error: ", e));
                document.removeEventListener('click', playOnInteraction);
            };
            document.addEventListener('click', playOnInteraction);
            alert("New Order Arrived...!!!");
    </script>
    
<?php
}

mysqli_query($link,"UPDATE `order_place` SET `audio_tx`=0");

include('header.php');
?>
<script>
    setTimeout(function(){
        location.reload();
    }, 60000); // 300,000 milliseconds = 5 minutes
</script>


          <div class="page-wrapper">
          <div class="page-content">
    

            <ul class="profile-details-list order-list restaurant-order-list mt-4 mb-0">
                  
                   <li class="w-100">
                    <img class="img-fluid icon ms-auto mb-0" src="../assets/images/delivery-boy/svg/box.svg" alt="box">
                    <h2><?php

					$rest121 = mysqli_query($link, "SELECT * FROM product WHERE `by`='$u_uname'");

		         	$u121 = mysqli_fetch_array($rest121);

		         	echo $tot11 = mysqli_num_rows($rest121);


                                      ?></h2>
                    <h6>Total Products</h6>
                </li>
                <li class="w-100">
                    <img class="img-fluid icon ms-auto mb-0" src="../assets/images/delivery-boy/svg/box.svg" alt="box">
                    <h2><?php

		$rest12 = mysqli_query($link, "SELECT * FROM order_place WHERE status='Placed' AND `sub_cat`='$u_uname'");

			$u12 = mysqli_fetch_array($rest12);

			echo $tot1 = mysqli_num_rows($rest12);


                                      ?></h2>
                    <h6>Total Orders</h6>
                </li>
                <li class="w-100">
                    <img class="img-fluid icon ms-auto mb-0" src="../assets/images/delivery-boy/svg/box.svg" alt="box">
                    <h2>	<?php 
                                    
                                    $rest12 = mysqli_query($link, "SELECT * FROM order_place WHERE status='Packed' AND `sub_cat`='$u_uname'");

			$u12 = mysqli_fetch_array($rest12);

			echo $tot1 = mysqli_num_rows($rest12);

								   	 ?></h2>
                    <h6>Total Packed Orders</h6>
                </li>
                <li class="w-100">
                    <img class="img-fluid icon ms-auto mb-0" src="../assets/images/delivery-boy/svg/box.svg" alt="box">
                    <h2>	<?php

   	$rest1322 = mysqli_query($link, "SELECT * FROM order_place WHERE status='Cancel' AND `sub_cat`='$u_uname'");

			$u1322 = mysqli_fetch_array($rest1322);

			echo $tot222 = mysqli_num_rows($rest1322);

									?></h2>
                    <h6>Total Canceled Orders</h6>
                </li>
                <li class="w-100">
                    <img class="img-fluid icon ms-auto mb-0" src="../assets/images/delivery-boy/svg/box.svg" alt="box">
                    <h2>	<?php 

								   	$rest13 = mysqli_query($link, "SELECT * FROM order_place WHERE status='Transported' AND `sub_cat`='$u_uname'");

			$u13 = mysqli_fetch_array($rest13);

			echo $tot2 = mysqli_num_rows($rest13);

			?></h2>
                    <h6>Total Transportations</h6>
                </li>
                <li class="w-100">
                    <img class="img-fluid icon ms-auto mb-0" src="../assets/images/delivery-boy/svg/box-time.svg"
                        alt="box">
                    <h2>	<?php

   	$rest132 = mysqli_query($link, "SELECT * FROM order_place WHERE status='Delivered' AND `sub_cat`='$u_uname'");

			$u132 = mysqli_fetch_array($rest132);

			echo $tot22 = mysqli_num_rows($rest132);

									?></h2>
                    <h6>Total Delivery</h6>
                </li>
                <li class="w-100">
                    <img class="img-fluid icon ms-auto mb-0" src="../assets/images/delivery-boy/svg/3d-rotate.svg"
                        alt="box">
                    <h2>	<?php

                                         
									$sql443 = "SELECT sum(total) as ss FROM order_place WHERE pay_status='Unpaid' AND `sub_cat`='$u_uname'";

									$result443 = $link->query($sql443);

									if ($result443->num_rows > 0) {

										while ($row443 = $result443->fetch_assoc()) {

											echo $toal_income_no443 = $row443['ss'];

										}

									} else {

										echo $toal_income_no443 = "0";

									}



									?></h2>
                    <h6>Pending Bill Amount</h6>
                </li>
                <li class="w-100">
                    <img class="img-fluid icon ms-auto mb-0" src="../assets/images/delivery-boy/svg/box-tick.svg"
                        alt="box">
                    <h2>	<?php



									$sqlw = "SELECT sum(total) as ssw FROM order_place WHERE pay_status='Paid' AND status !='Cancel' AND `sub_cat`='$u_uname'";


									$resultw = $link->query($sqlw);

									if ($resultw->num_rows > 0) {

										while ($roww = $resultw->fetch_assoc()) {

											echo $toal_income_now = $roww['ssw'];

										}

									} else {

										echo $toal_income_now = "0";

									}

								

									?></h2>
                    <h6>Paid Bill Amount</h6>
                </li>
            </ul>
        </div>
    </div>
    <!-- order section end -->

  
   


  <?php include('footer.php'); ?>