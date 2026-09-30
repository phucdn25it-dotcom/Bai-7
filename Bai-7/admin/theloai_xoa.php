<?php
include('../connect.php');

$idTL = $_GET['idTL'];
$sql = "DELETE FROM theloai WHERE idTL = '$idTL'";

if (mysqli_query($connect, $sql)) {
    echo "<script>alert('Xoa thanh cong'); window.location='theloai.php';</script>";
} else {
    echo 'Loi: ' . mysqli_error($connect);
}
?>
