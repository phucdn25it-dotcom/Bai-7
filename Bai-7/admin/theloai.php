<?php
include('../connect.php');
$sql = "SELECT * FROM theloai ORDER BY ThuTu ASC";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý thể loại</title>
    <style>
        body{font-family:Arial,sans-serif;margin:30px;background:#f5f5f5}
        .box{max-width:1000px;margin:auto;background:white;padding:25px;border-radius:8px}
        h2{text-align:center}
        a{color:#0066cc;text-decoration:none}
        table{width:100%;border-collapse:collapse;margin-top:20px}
        th,td{border:1px solid #ccc;padding:10px;text-align:center}
        th{background:#eee}
        img{max-width:70px;max-height:70px}
        .btn{display:inline-block;padding:8px 12px;background:#eee;border-radius:4px}
    </style>
</head>
<body>
<div class="box">
    <h2>QUẢN LÝ THỂ LOẠI</h2>
    <p><a class="btn" href="theloai_them.php">+ Thêm thể loại</a></p>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên thể loại</th>
            <th>Thứ tự</th>
            <th>Ẩn/Hiện</th>
            <th>Icon</th>
            <th>Thao tác</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['idTL']; ?></td>
            <td><?php echo htmlspecialchars($row['TenTL']); ?></td>
            <td><?php echo $row['ThuTu']; ?></td>
            <td><?php echo $row['AnHien'] == 1 ? 'Hiện' : 'Ẩn'; ?></td>
            <td>
                <?php if (!empty($row['icon']) && file_exists('../image/' . $row['icon'])) { ?>
                    <img src="../image/<?php echo htmlspecialchars($row['icon']); ?>">
                <?php } else { ?>
                    Không có
                <?php } ?>
            </td>
            <td>
                <a href="theloai_sua.php?idTL=<?php echo $row['idTL']; ?>">Sửa</a> |
                <a href="theloai_xoa.php?idTL=<?php echo $row['idTL']; ?>" onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
