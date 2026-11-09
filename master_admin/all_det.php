<?php include('header.php');

if (isset($_GET['mobile_no'])) {
    $mobile_no = mysqli_real_escape_string($link, $_GET['mobile_no']);

    $sql = "SELECT * FROM users WHERE user_id LIKE '%$mobile_no%' LIMIT 1";
    $result = mysqli_query($link, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name=$row['user_name'];
        $floor=$row['floor'];
        $tower=$row['tower'];
        $credit_limit=$row['credit_limit'];
    } else {
        echo "";
    }
}

?>
<div class="page-wrapper">
       <div class="page-content">
    

         <div class="col-lg-12">
          <div class="alert alert-dark border-0 bg-dark alert-dismissible fade show" style="height:60px;background: #FF671F;
background: linear-gradient(90deg, rgba(255, 103, 31, 1) 0%, rgba(255, 255, 255, 1) 48%, rgba(4, 106, 56, 1) 100%);">
                           <div class="text-white"><h5 class="text-white">All Details</h5></div>
                        </div>
          </div>
                    
        <div class="card">
         <div class="card-body">
           
         <form class="row g-3" action="" method="get" enctype="multipart/form-data">
  <div class="col-md-12">
    <label for="mobile_no" class="form-label">Mobile No</label>
    <input type="text" class="form-control" id="" name="mobile_no" required value="<?php echo $mobile_no; ?>">
  </div>
<?php

if (isset($_GET['mobile_no'])) {
    
    ?>
  <div class="col-md-12">
    <label for="name" class="form-label"><b>Name : </b> <?php echo $name; ?></label>
  </div>
  <div class="col-md-12">
    <label for="name" class="form-label"><b>Address : </b></label><?php echo $floor.",".$tower.",".$landmark ?>
  </div>

  <div class="col-md-12">
    <label for="name" class="form-label"><b>Credit Limit : </b></label><?php echo $credit_limit; ?>
  </div>
   <div class="col-md-12">
    <label for="name" class="form-label"><b>Used Credit</b> : </label>
      <?php 
      
      $sql1 = "SELECT * FROM credit WHERE user_id LIKE '%$mobile_no%'";
    $result1 = mysqli_query($link, $sql1);

    if ($result1 && mysqli_num_rows($result1) > 0) {
        $row1 = mysqli_fetch_assoc($result1);
       echo $amount=$row1['amount'];
       
    } else {
        echo "0"; 
    }
      
      
      
      ?>
  </div>
  
  <?php
}
?>
  <div class="col-12" align="center">
    <button type="submit" class="btn btn-outline-success px-5">Search</button>
  </div>
</form>
                
     </div>
    </div>    
    <?php

if (isset($_GET['mobile_no'])) {
    
    ?>
     <div class="card">
         <div class="card-body">
             <h3>Credit History</h3>
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                  <thead>
                   <tr>
                     <th>Sr.No</th>
                     <th>Mobile No</th>
                     <th>Name</th>
                     <th>By</th>
                     <th>Loan Date</th>
                     <th>Amount</th>
                     <th>Due Date 1</th>
                     <th>Amount</th>
                     <th>Due Date 2</th>
                     <th>Amount</th>
                     <th>Due Date 3</th>
                     <th>Amount</th>
                     <th>Status</th>
                   
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $sr = 1;
                    $sql1 = "SELECT * FROM credit WHERE status=0 AND user_id LIKE '%$mobile_no%' order by id DESC";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {
                          
                        //  $id= $usr1['main_cat'];
                    ?>
                       <tr>
                         <td><?php echo $sr; ?></td>
                         <td><?php echo $usr1['user_id']; ?></td> 
                         <td><?php echo $usr1['name']; ?></td> 
                         <td><?php echo $usr1['by']; ?></td> 
                         <td><?php echo $usr1['date']; ?></td>
                         <td><?php echo $usr1['amount']; ?></td> 
                         <td><?php echo date('Y-m-d', strtotime($usr1['date'] . ' +7 days')); ?></td>
                         <td><?php echo $usr1['amount'] + (($usr1['amount']/100)*3); ?></td>
                         <td><?php echo date('Y-m-d', strtotime($usr1['date'] . ' +14 days')); ?></td>
                         <td><?php echo $usr1['amount'] + (($usr1['amount']/100)*6); ?></td>
                         <td><?php echo date('Y-m-d', strtotime($usr1['date'] . ' +21 days')); ?></td>
                         <td><?php echo $usr1['amount'] + (($usr1['amount']/100)*9); ?></td>
                         <td>
                            <?php 
                             if($usr1['status']==0)
                             {
                               echo "<a href='paid_status.php?pay_id=$usr1[id]' class='btn btn-outline-success px-5'>Unpaid</a>";
                             }
                             else
                             {
                                 echo "Paid";
                             }
                       ?>
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
      
      <div class="card">
         <div class="card-body">
               <h3>Order History</h3>
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                  <thead>
                   <tr>
                     <th>Sr.No</th>
                     <th>Product Name</th>
                     <th>SKU Code</th>
                     <th>Quantity</th>
                     <th>Total</th>
                     <th>Status</th>
                     <th>Order Id</th>
                     <th>Date</th>
                     
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $sr = 1;
                    $sql1 = "SELECT * FROM cart WHERE user_id LIKE '%$mobile_no%' order by id DESC LIMIT 3";
                    $result1 = mysqli_query($link, $sql1);
                    if ($result1->num_rows > 0) {
                      while ($usr1 = mysqli_fetch_array($result1)) {
                          
                        //  $id= $usr1['main_cat'];
                    ?>
                       <tr>
                         <td><?php echo $sr; ?></td>
                         <td><?php echo $usr1['product_name']; ?></td> 
                         <td><?php echo $usr1['main_cat']; ?></td> 
                         <td><?php echo $usr1['quantity']; ?></td> 
                         <td><?php echo $usr1['total']; ?></td>
                         <td><?php echo $usr1['status']; ?></td> 
                         <td><?php echo $usr1['order_id']; ?></td> 
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
      
      <?php
      
}
?>
    </div>
  </div>    
  <?php include('footer.php');?>
  
  
  <script>
  function fetchName() {
    var mobile = document.getElementById("mobile_no").value;
    if (mobile !== "") {
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "get_name_by_mobile.php?mobile_no=" + mobile, true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          document.getElementById("name").value = xhr.responseText;
        }
      };
      xhr.send();
    }
  }
</script>
