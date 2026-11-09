<?php
$order_id = $_GET['order_id'];


$amount = $_GET['amount'];
$name = $_GET['name'];
?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <h3>Redirecting to payment...</h3>
    <script>
        var options = {
            "key": "rzp_live_3gp1o7H1aYulWi",
            "amount": "<?php echo $amount; ?>",
            "currency": "INR",
            "name": "Agrovita App",
            "description": "Order Payment",
            "order_id": "<?php echo $order_id; ?>",
            "handler": function (response){
                window.location.href = "payment_status.php?payment_id=" + response.razorpay_payment_id + "&order_id=" + response.razorpay_order_id;
            },
            "prefill": {
                "name": "<?php echo $name; ?>",
                "email": "",
                "contact": ""
            },
            "theme": {
                "color": "#0b53bf"
            }
        };
        var rzp = new Razorpay(options);
        rzp.open();
    </script>
</body>
</html>
