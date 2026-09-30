<?php
include('../connect.php');

$TenTL = $_POST['TenTL'];
$ThuTu = $_POST['ThuTu'];
$AnHien = $_POST['AnHien'];
$icon = '';

if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $icon = basename($_FILES['image']['name']);
    $target = '../image/' . $icon;
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
}

$sql = "INSERT INTO theloai (TenTL, ThuTu, AnHien, icon) VALUES ('$TenTL', '$ThuTu', '$AnHien', '$icon')";

if (mysqli_query($connect, $sql)) {
    echo "<script>alert('Them thanh cong'); window.location='theloai.php';</script>";
} else {
    echo 'Loi: ' . mysqli_error($connect);
}
?>
