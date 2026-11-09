<?php
session_start();
include("connection.php");
 
   
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
// Razorpay API keys
$key_id = 'rzp_live_3gp1o7H1aYulWi';
$key_secret = 'FZvSAHF5slQDg3CHD3GjQiTr';

$amount = $_GET['amount']; // e.g., 1000 (Rs. 1000)
$name = $u_uname;

// Convert amount to paisa
$paisa_amount = $amount * 100;

// Create Razorpay order using cURL
$order_url = 'https://api.razorpay.com/v1/orders';
$data = [
    'amount' => $paisa_amount,
    'currency' => 'INR',
    'receipt' => 'rcptid_' . time(),
    'payment_capture' => 1
];

$ch = curl_init($order_url);
curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$response_data = json_decode($response, true);

if (isset($response_data['id'])) {
    $order_id = $response_data['id'];

    // Store order in your DB if needed

    // Redirect to a payment page with order details
    header("Location: pay_now.php?order_id=$order_id&amount=$paisa_amount&name=$name");
    exit;
} else {
    echo "Error creating Razorpay order: " . $response;
    exit;
}
?>
