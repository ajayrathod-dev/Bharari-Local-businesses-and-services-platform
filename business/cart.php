<?php include('header.php'); ?>
<div class="page-wrapper">
  <div class="page-content">

    <div class="col-lg-12">
      <div class="alert alert-dark border-0 bg-dark alert-dismissible fade show"  style="height:60px;background: #0b53bf;
background: linear-gradient(90deg, rgba(255, 103, 31, 1) 0%, rgba(255, 255, 255, 1) 48%, rgba(4, 106, 56, 1) 100%);">
        <div class="text-white"><h5 class="text-white">cart List</h5></div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">

        <style>
          .error {
            color: red;
            font-weight: bold;
            margin-bottom: 10px;
          }
          table {
            width: 100%;
            border-collapse: collapse;
          }
          th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
          }
          tr {
            background-color: #ffffff; /* default row color */
          }
          tr.matched {
            background-color: #d4edda !important; /* green for matched */
            color: green;
          }
        </style>

        <div class="mb-3">
          <input type="text" id="barcodeInput" placeholder="Scan barcode..." class="form-control" autofocus>
          <button id="submitBarcode" class="btn btn-success mt-2">Enter</button>
        </div>

        <div class="table-responsive">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">

                <table id="example2" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Sr.No</th>
                      <th>Order Id</th>
                      <th>User Id</th>
                      <th>SKU Code</th>
                      <th>Barcode</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>shop name</th> 
                      <th>Price</th>
                      <th>Total</th>
                      <th>Status</th> 
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $oid = $_GET['oid'];
                      $sr = 1;
                      $sql1 = "SELECT * FROM cart WHERE order_id='$oid' order by id DESC";
                      $result1 = mysqli_query($link, $sql1);
                      if ($result1->num_rows > 0) {
                        while ($usr1 = mysqli_fetch_array($result1)) {
                    ?>
                    <tr>
                      <td><?php echo $sr; ?></td>
                      <td><?php echo $usr1['order_id']; ?></td> 
                      <td><?php echo $usr1['user_id']; ?></td> 
                      <td><?php echo $usr1['main_cat']; ?></td> 
                      <td class="barcode"><?php 
                        $mid = $usr1['main_cat'];
                        $sql12 = "SELECT * FROM product WHERE main_cat='$mid' order by id DESC";
                        $result12 = mysqli_query($link, $sql12);
                        if ($result12->num_rows > 0) {
                          while ($usr12 = mysqli_fetch_array($result12)) {
                            echo $usr12['barcode'];
                          }
                        } 
                      ?></td> 
                      <td><?php echo $usr1['product_name']; ?></td>
                      <td><?php echo $usr1['quantity']; ?></td>
                      <td><?php echo $usr1['vender_name']; ?></td>
                      <td><?php echo $usr1['price']; ?></td>
                      <td><?php echo $usr1['total']; ?></td>
                      <td><?php echo $usr1['status']; ?></td>
                      <td><?php echo $usr1['date']; ?></td>
                    </tr>
                    <?php
                        $sr++;
                        }
                      }
                    ?>
                  </tbody>
                </table>

                <audio id="beep" src="beep.mp3" preload="auto"></audio>

                <script>
                  const barcodeInput = document.getElementById('barcodeInput');
                  const submitBtn = document.getElementById('submitBarcode');
                  const beepSound = document.getElementById('beep');

                  function highlightMatchingRow(code) {
                    const barcodeCells = document.querySelectorAll('.barcode'); 
                    let matched = false;
                    barcodeCells.forEach(cell => {
                      if (cell.textContent.trim() === code && !cell.parentElement.classList.contains('matched')) {
                        cell.parentElement.classList.add('matched');
                        matched = true;
                      }
                    });
                    if (matched) {
                      beepSound.play().catch(() => {});
                    }
                  }

                  submitBtn.addEventListener('click', () => {
                    const code = barcodeInput.value.trim();
                    if (code !== '') {
                      highlightMatchingRow(code);
                      barcodeInput.value = '';
                      barcodeInput.focus();
                    }
                  });

                  barcodeInput.addEventListener('keypress', function (e) {
                    if (e.key === 'Enter') {
                      e.preventDefault();
                      const code = barcodeInput.value.trim();
                      if (code !== '') {
                        highlightMatchingRow(code);
                        barcodeInput.value = '';
                        barcodeInput.focus();
                      }
                    }
                  });

                  window.onload = () => {
                    barcodeInput.focus();
                  };
                </script>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>    
<?php include('footer.php'); ?>
