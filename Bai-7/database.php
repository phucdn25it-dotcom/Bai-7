<?php
$connect = mysqli_connect('localhost', 'root', '');
if (!$connect) {
    die('Ket noi that bai: ' . mysqli_connect_error());
}
mysqli_set_charset($connect, 'utf8');

mysqli_query($connect, "CREATE DATABASE IF NOT EXISTS tintuc CHARACTER SET utf8 COLLATE utf8_unicode_ci");
mysqli_select_db($connect, 'tintuc');

$sql = "CREATE TABLE IF NOT EXISTS theloai (
    idTL INT NOT NULL AUTO_INCREMENT,
    TenTL VARCHAR(255) NOT NULL,
    ThuTu INT NOT NULL,
    AnHien TINYINT(1) NOT NULL DEFAULT 1,
    icon VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (idTL)
) ENGINE=InnoDB DEFAULT CHARSET=utf8";

if (mysqli_query($connect, $sql)) {
    echo '<h2>Khoi tao database thanh cong!</h2>';
    echo '<p>Database: tintuc</p>';
    echo '<p>Table: theloai</p>';
    echo '<p><a href="admin/theloai.php">Di den quan ly the loai</a></p>';
} else {
    echo 'Loi: ' . mysqli_error($connect);
}
?>
