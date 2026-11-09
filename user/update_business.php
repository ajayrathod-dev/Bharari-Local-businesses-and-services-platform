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
    }
} else {
    header("location:logout.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $business_id = intval($_POST['business_id']);
    $sub_cat = mysqli_real_escape_string($link, $_POST['sub_cat']);
    $bus_owner = mysqli_real_escape_string($link, $_POST['bus_owner']);
    $mobile_no = mysqli_real_escape_string($link, $_POST['mobile_no']);
    $address = mysqli_real_escape_string($link, $_POST['address']);
    $main_cat = mysqli_real_escape_string($link, $_POST['main_cat']);
    $newImageName = '';
    if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
        $imgFile = $_FILES['image']['name'];
        $tmp_dir = $_FILES['image']['tmp_name'];
        $imgSize = $_FILES['image']['size'];
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
        if (in_array($imgExt, $valid_extensions)) {
            $newImageName = date('iYshmd') . "_" . rand(1000, 1000000) . "." . $imgExt;
            $upload_dir = 'uploads/';
            if ($imgSize < 50000000) {
                if (!is_dir($upload_dir)) { mkdir($upload_dir, 0777, true); }
                move_uploaded_file($tmp_dir, $upload_dir . $newImageName);
                $oldRes = mysqli_query($link, "SELECT image FROM sub_cat WHERE id='$business_id' AND mobile_no='$u_uname' LIMIT 1");
                if ($oldRes && $oldRes->num_rows > 0) {
                    $oldRow = $oldRes->fetch_assoc();
                    $oldImage = $oldRow['image'];
                    if ($oldImage && is_file($upload_dir . $oldImage)) { @unlink($upload_dir . $oldImage); }
                }
            }
        }
    }
    if ($newImageName) {
        $sql = "UPDATE sub_cat SET sub_cat='$sub_cat', bus_owner='$bus_owner', address='$address', main_cat='$main_cat', image='$newImageName' WHERE id='$business_id' AND mobile_no='$u_uname'";
    } else {
        $sql = "UPDATE sub_cat SET sub_cat='$sub_cat', bus_owner='$bus_owner', address='$address', main_cat='$main_cat' WHERE id='$business_id' AND mobile_no='$u_uname'";
    }
    if ($link->query($sql) === TRUE) {
        header('Location: single.php?updated=1');
        exit;
    } else {
        echo "Error updating record: " . $link->error;
        exit;
    }
}
header("location: single.php");
exit;
?>