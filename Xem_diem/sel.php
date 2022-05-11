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

<form method="POST" action="sel.php">
    <label for="act">Bạn muốn:</label>
    <select name="act" id="act">
        <option value="alll">Xem điểm của tất cả các học sinh </option>
        <option value="oneper">Xem điểm của 1 học sinh</option>
    </select>
    <br><br>
    <input id="submit" type="submit" name="submit_sel" value="Gửi">
</form>

<?php
$host = "localhost";
$port = "5432";
$dbname = "Quan_ly_hoc_sinh";
$dbuser = 'postgres';
$dbpass = '123456';
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$dbuser password=$dbpass") or die ("Khong the  ket noi toi server\n");

if (isset($_POST["submit_sel"])) {
    $act = $_POST["act"];

    if($act == "alll"){
        header('Location: sel_all.php');
    }elseif ($act == "oneper"){
        header('Location: ../Xem_diem/viewscore.php');
    }

}
//session_destroy();

?>

<br><br>
<button name ="button" type="button"><a href="../teacher_r.php">Quay lại</a></button>
<br><br>
<button name ="button" type="button"><a href="../login.php">Đăng xuất</a></button>
</body>
</html>