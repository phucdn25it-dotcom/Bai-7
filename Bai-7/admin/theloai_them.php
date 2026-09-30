<?php
include("../connect.php");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm thể loại</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: #f2f4f7;
        }

        .container {
            width: 700px;
            margin: 50px auto;
            background: white;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.12);
        }

        .title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 26px;
            color: #333;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-group label {
            width: 150px;
            font-weight: bold;
            color: #333;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group select {
            width: 400px;
            height: 38px;
            padding: 7px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        }

        .form-group input[type="file"] {
            width: 400px;
            font-size: 14px;
        }

        .buttons {
            margin-top: 30px;
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 25px;
            margin: 0 5px;
            border-radius: 5px;
            border: none;
            font-size: 15px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-add {
            background: #198754;
            color: white;
        }

        .btn-add:hover {
            background: #157347;
        }

        .btn-back {
            background: #6c757d;
            color: white;
        }

        .btn-back:hover {
            background: #5c636a;
        }
    </style>
</head>

<body>

<div class="container">

    <h2 class="title">THÊM THỂ LOẠI</h2>

    <form action="theloai_them_xl.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label>Tên thể loại:</label>
            <input type="text" name="TenTL" required>
        </div>

        <div class="form-group">
            <label>Thứ tự:</label>
            <input type="number" name="ThuTu" required>
        </div>

        <div class="form-group">
            <label>Ẩn/Hiện:</label>
            <select name="AnHien">
                <option value="1">Hiện</option>
                <option value="0">Ẩn</option>
            </select>
        </div>

        <div class="form-group">
            <label>Icon:</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <div class="buttons">
            <button type="submit" class="btn btn-add">Thêm</button>

            <a href="theloai.php" class="btn btn-back">
                Quay lại
            </a>
        </div>

    </form>

</div>

</body>
</html>