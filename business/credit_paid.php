<?php include('header.php'); ?>
<div class="page-wrapper">
       <div class="page-content">
    

         <div class="col-lg-12">
          <div class="alert alert-dark border-0 bg-dark alert-dismissible fade show" style="height:60px;background: #0b53bf;
background: linear-gradient(90deg, rgba(255, 103, 31, 1) 0%, rgba(255, 255, 255, 1) 48%, rgba(4, 106, 56, 1) 100%);">
                           <div class="text-white"><h5 class="text-white">Credit Paid History</h5></div>
                        </div>
          </div>
                    
         
     <div class="card">
         <div class="card-body">
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
                    $sql1 = "SELECT * FROM credit WHERE status=1 order by id DESC";
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
