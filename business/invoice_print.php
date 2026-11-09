<?php
include('connection.php');
$order_id = $_GET['oid'] ?? '';

// Fetch order info
$sql = "SELECT * FROM order_place WHERE order_id = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("s", $order_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    echo "Order not found!";
    exit;
}
$order = $result->fetch_assoc();

// Fetch items (assuming stored in 'cart' table)
$sql_items = "SELECT * FROM cart WHERE order_id = ?";
$stmt_items = $link->prepare($sql_items);
$stmt_items->bind_param("s", $order_id);
$stmt_items->execute();
$result_items = $stmt_items->get_result();

?>
<!DOCTYPE html>
<html>
<head>
  <title>Invoice #<?= $order['order_id'] ?></title>
  <style>
    @media print {
      @page {
        size: 80mm auto;
        margin: 5mm;
      }
      .no-print {
        display: none;
      }
    }

    body {
      font-family: monospace;
      font-size: 12px;
      width: 80mm;
      margin: auto;
    }

    h2 {
      text-align: center;
      margin: 0;
    }

    .center {
      text-align: center;
    }

    .invoice-box {
      padding: 5px;
    }

    .line {
      border-bottom: 1px dashed black;
      margin: 4px 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      text-align: left;
      padding: 2px 0;
    }

    .totals td {
      font-weight: bold;
    }

    .print-btn {
      margin-top: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="invoice-box">
    <h2>INVOICE</h2>
    <div class="line"></div>

    <p>
      Order ID: <?= $order['order_id'] ?><br>
      Date: <?= $order['date'] ?><br>
      Customer Mobile No: <?= $order['user_id'] ?>
     
    </p>

    <div class="line"></div>
    <table>
      <thead>
        <tr>
          <th>Item</th>
          <th>Qty</th>
          <th>Rate</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $grand_total = 0;
        while ($item = $result_items->fetch_assoc()) {
            $product_name = $item['product_name'];
            $qty = $item['quantity'];
            $rate = $item['price'];
            $total = $qty * $rate;
            $grand_total += $total;
        ?>
        <tr>
          <td><?= $product_name; ?></td>
          <td><?= $qty ?></td>
          <td><?= number_format($rate, 2) ?></td>
          <td><?= number_format($total, 2) ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <div class="line"></div>

    <table class="totals">
      <tr>
        <td colspan="3">TOTAL</td>
        <td>₹<?= number_format($grand_total, 2) ?></td>
      </tr>
     
     
    </table>
    <div class="line"></div>

    <p class="center">Thank you!</p>

    <div class="print-btn no-print">
      <button onclick="window.print()">Print</button>
    </div>
  </div>
</body>
</html>
