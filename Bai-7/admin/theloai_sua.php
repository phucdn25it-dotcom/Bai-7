<?php
include('../connect.php');

$idTL = $_GET['idTL'];
$sql = "SELECT * FROM theloai WHERE idTL = '$idTL'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die('Không tìm thấy thể loại');
}

if (isset($_POST['sua'])) {
    $TenTL = $_POST['TenTL'];
    $ThuTu = $_POST['ThuTu'];
    $AnHien = $_POST['AnHien'];
    $icon = $row['icon'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $icon = basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], '../image/' . $icon);
    }

    $sql_update = "UPDATE theloai SET TenTL='$TenTL', ThuTu='$ThuTu', AnHien='$AnHien', icon='$icon' WHERE idTL='$idTL'";

    if (mysqli_query($connect, $sql_update)) {
        echo "<script>alert('Sua thanh cong'); window.location='theloai.php';</script>";
        exit;
    } else {
        echo 'Loi: ' . mysqli_error($connect);
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa thể loại</title>
</head>
<body>
<h2>SỬA THỂ LOẠI</h2>
<form method="post" enctype="multipart/form-data">
    <p>Tên thể loại: <input type="text" name="TenTL" value="<?php echo htmlspecialchars($row['TenTL']); ?>" required></p>
    <p>Thứ tự: <input type="number" name="ThuTu" value="<?php echo $row['ThuTu']; ?>" required></p>
    <p>Ẩn/Hiện:
        <select name="AnHien">
            <option value="1" <?php if ($row['AnHien'] == 1) echo 'selected'; ?>>Hiện</option>
            <option value="0" <?php if ($row['AnHien'] == 0) echo 'selected'; ?>>Ẩn</option>
        </select>
    </p>
    <p>Icon hiện tại:
        <?php if (!empty($row['icon']) && file_exists('../image/' . $row['icon'])) { ?>
            <img src="../image/<?php echo htmlspecialchars($row['icon']); ?>" width="80">
        <?php } else { ?>
            Không có
        <?php } ?>
    </p>
    <p>Icon mới: <input type="file" name="image" accept="image/*"></p>
    <p>
        <input type="submit" name="sua" value="Sửa">
        <a href="theloai.php">Quay lại</a>
    </p>
</form>
</body>
</html>
