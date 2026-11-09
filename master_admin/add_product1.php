<?php
session_start();
include("connection.php");

// ✅ Validation function to reject special characters
function validate_input($data, $field_name) {
    // Allow only letters, numbers, spaces, dot, comma, hyphen
    if (!preg_match("/^[a-zA-Z0-9\s.,-]*$/", $data)) {
        // Redirect with error
        header("Location:add_product.php?error=Invalid characters in $field_name");
        exit;
    }
    return trim($data);
}

// ✅ Check login/session
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

// ✅ Validate all inputs
$p_name   = validate_input($_POST['p_name'], "Product Name");
$main_cat = validate_input($_POST['main_cat'], "Main Category");
$s_desc   = validate_input($_POST['s_desc'], "Short Description");
$unit     = validate_input($_POST['unit'], "Unit");
$l_desc   = validate_input($_POST['l_desc'], "Long Description");
$price    = validate_input($_POST['price'], "Price");
$shop_name= validate_input($_POST['shop_name'], "Shop Name");
$status   = validate_input($_POST['status'], "Status");
$stars    = validate_input($_POST['desc'], "Stars");
$category = validate_input($_POST['category'], "Category");
$city     = validate_input($_POST['city'], "City");
$sub_cat  = validate_input($_POST['sub_cat'], "Sub Category");

// ✅ Numbers-only validation


$qty     = $_POST['qty'];
$wkg     = $_POST['wkg'];
$gst     = $_POST['gst'];
$barcode = $_POST['barcode'];

// ✅ Verify sub category
$sql4r = "SELECT * FROM sub_cat WHERE mobile_no='$sub_cat'";
$result4r = mysqli_query($link, $sql4r);

if ($result4r->num_rows > 0) {
    while ($row4r = $result4r->fetch_assoc()) {
        $main_cat = mysqli_real_escape_string($link, $row4r['main_cat']);
    }
} else {
    header("location:logout.php");
    exit;
}

// ✅ File upload section
$upload_dir = '../user/uploads/';
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

$imgFile = $_FILES['uploadfile']['name'];
$tmp_dir = $_FILES['uploadfile']['tmp_name'];
$imgSize = $_FILES['uploadfile']['size'];

$imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
$productPic = date('iYshmd') . "" . rand(1000, 1000000) . "." . $imgExt;

if (in_array($imgExt, $valid_extensions)) {
    if ($imgSize < 5000000) { // 5 MB limit
        move_uploaded_file($tmp_dir, $upload_dir . $productPic);
    } else {
        header("Location:add_product.php?error=File too large");
        exit;
    }
} else { 
    header("Location:add_product.php?error=Invalid file type");
    exit;  
}

// ✅ Insert into product table
 $sql = "INSERT INTO `product`
(`product_name`, `main_cat`, `sub_cat`, `short_desc`, `long_desc`, `unit`, `weight_per_kg`, `price`, `shop_name`, `city`, `status`, `stars`, `image`, `qty`, `gst`, `barcode`)
VALUES 
('$p_name','$main_cat','$sub_cat','$s_desc','$l_desc','$unit','$wkg','$price','$shop_name','$city','$status','$stars','$productPic','$qty','$gst','$barcode')";

$result = mysqli_query($link, $sql);

if ($result > 0) {
    header("Location:add_product.php?success=21");
} else {
    header("Location:add_product.php?error=21");
}
?>
