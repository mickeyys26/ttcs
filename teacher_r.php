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
    <title>Trang chủ</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./CSS/1.css" />
</head>
<body>

<form method="POST" action="./teacher_r.php">
    <label for="act">Bạn muốn:</label>
    <select name="act" id="act">
        <option value="sel">Xem điểm </option>
        <option value="upd">Sửa điểm</option>
        <option value="ins">Thêm điểm</option>
        <option value="del">Xóa học sinh khỏi danh sách</option>
    </select>
    <br><br>
    <input id="submit" type="submit" name="submit_r" value="Gửi">
</form>
<br><br>
<br><br>
<button name ="button" type="button"><a href="login.php">Đăng xuất</a></button>
<?php
$host = "localhost";
$port = "5432";
$dbname = "Quan_ly_hoc_sinh";
$dbuser = 'postgres';
$dbpass = '123456';
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$dbuser password=$dbpass") or die ("Khong the  ket noi toi server\n");

if (isset($_POST["submit_r"])) {
    $act = $_POST["act"];

    if($act == "sel"){
        header('Location: ./Xem_diem/sel.php');
    }
    elseif ($act == "upd"){
        header('Location: ./Sua_diem/upd.php');
    }elseif ($act == "ins"){
        header('Location: ./Them_diem/Ins.php');
    }elseif ($act == "del"){
        header('Location: ./Xoa_hoc_sinh/del.php');
    }

}
//session_destroy();

?>
</body>
</html>