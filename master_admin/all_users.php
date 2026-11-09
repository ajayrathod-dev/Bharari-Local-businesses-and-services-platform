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
include('header.php');
?>

       <div class="page-wrapper">
          <div class="page-content">
          
        <div class="card">
         <div class="card-body">
            <div class="table-responsive">
               <table id="example2" class="table table-striped table-bordered">
                  <thead>
                   <tr>
                     <th>Sr.No</th>
                     <th>User Id</th>
                     <th>User Name</th>
                     <th>Address</th>
                     <th>Pincode</th>
                     <th>Credit Limit</th>
                     <th>Total Credit Unpaid</th>
                     <th>Date</th>
                       
                     

                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $sr = 1;
                    $sql1 = "SELECT * FROM users order by id DESC";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {
                          $mob= $usr1['user_id'];
                    ?>
                       <tr>
                         <td><?php echo $sr; ?></td>
             
                          <td><?php echo $usr1['user_id']; ?></td> 
                         
                          <td><?php echo $usr1['user_name']; ?></td>
                         <td><?php echo $usr1['floor']; ?><?php echo $usr1['tower']; ?><?php echo $usr1['landmark']; ?></td>
                         <td><?php echo $usr1['pincode']; ?></td>
                         <form action="credit_limit.php" method="post">
                          <td><input type="text" name="amount" value="<?php echo $usr1['credit_limit']; ?>" required>
                          <input type="hidden" name="id" value="<?php echo $usr1['id']; ?>">
                          <input type="submit" value="submit" >
                          </td>
                          </form>
                           <td><?php 
                           
                           
                           
                           $sqlw = "SELECT SUM(amount) AS total_credit FROM credit WHERE user_id = '$mob' AND status=0";
                           $resultw = mysqli_query($link, $sqlw);

                           if ($roww = mysqli_fetch_assoc($resultw)) {
                                echo $roww['total_credit'];
                           } else {
                              echo "0";
                           }
                           
                           
                           ?></td>
                         <td><?php echo $usr1['date']; ?></td>

                          
                       </tr>

                   <?php
                        $sr++;
                      }
                    }
                    ?>
                 </tbody>

               </table>
            </div>
         </div>
      </div>

            
        </div>
    </div>
    <!-- order section end -->

  
   

<?php include('footer.php'); ?>