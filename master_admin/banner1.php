<?php
session_start();
include("connection.php");

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

$upload_dir = '../user/banner/';
$valid_extensions = ['jpeg', 'jpg', 'png', 'gif', 'webp'];

function handleUpload($fieldName, $upload_dir, $valid_extensions) {
    $imgFile = $_FILES[$fieldName]['name'];
    $tmp_dir = $_FILES[$fieldName]['tmp_name'];
    $imgSize = $_FILES[$fieldName]['size'];
    $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
    $productPic = date('iYshmd') . "" . rand(1000, 1000000) . "." . $imgExt;

    if (in_array($imgExt, $valid_extensions)) {
        if ($imgSize < 50000000) {
            move_uploaded_file($tmp_dir, $upload_dir . $productPic);
            return $productPic;
        } else {
            exit("Error: File too large for $fieldName");
        }
    } else {
        exit("Error: Invalid file type for $fieldName");
    }
}

// Handle all 3 images
$image1 = handleUpload('uploadfile1', $upload_dir, $valid_extensions);
$image2 = handleUpload('uploadfile2', $upload_dir, $valid_extensions);
$image3 = handleUpload('uploadfile3', $upload_dir, $valid_extensions);

// Insert into database
$sql = "INSERT INTO `banner`(`image1`, `image2`, `image3`) VALUES ('$image1', '$image2', '$image3')";
$result = mysqli_query($link, $sql);

if ($result) {
    header("Location: banner.php?success=1");
    exit;
} else {
    header("Location: banner.php?error=1");
    exit;
}
?>
