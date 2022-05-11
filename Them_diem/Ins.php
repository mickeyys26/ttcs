<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./CSS/1.css" />

</head>
<body>

<form method="POST" action="Ins.php">
    <div>
        <div>
            <h2>Nhập thông tin học sinh muốn thêm</h2>
            <label>MSHS </label>
            <input type="text" name="mshs"><br>
            <label>Name </label>
            <input type="text" name="name"><br>
            <label>Điểm Toán </label>
            <input type="text" name="math"><br>
            <label>Điểm Lý </label>
            <input type="text" name="physic"><br>
            <label>Điểm Anh </label>
            <input type="text" name="english"><br>
            <input id="submit" type="submit" name="ins_submit" value="Gửi">
        </div>
    </div>
</form>

<?php

$host = "localhost";
$port = "5432";
$dbname = "Quan_ly_hoc_sinh";
$dbuser = 'postgres';
$dbpass = '123456';
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$dbuser password=$dbpass") or die ("Khong the  ket noi toi server\n");

if (isset($_POST["ins_submit"])) {
    $mshs = $_POST["mshs"];
    $name = $_POST["name"];
    $math = $_POST["math"];
    $physic = $_POST["physic"];
    $english = $_POST["english"];
    if ($mshs == "" || $name =="" || $math ==""|| $physic == "" || $info_tech = "" || $english == "") {
        echo "Vui lòng điền đủ thông tin!";
    }else{
        $sql = "INSERT INTO score(mshs,name,math,physic,english) VALUES ('$mshs','$name',$math,$physic,$english)";
        $query = pg_query($conn,$sql);
        echo "Thêm điểm thành công!";
    }
}
?>
<br><br>
<button name ="button" type="button"><a href="../teacher_r.php">Quay lại</a></button>
<br><br>
<button name ="button" type="button"><a href="../login.php">Đăng xuất</a></button>
</body>
</html>