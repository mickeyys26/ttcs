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
<form method="POST" action="del.php">
    <div>
        <div>
            <h2>Xóa học sinh </h2>
            <label>Mshs </label>
            <input type="text" name="mshs">
            <label>Name </label>
            <input type="text" name="name">
            <input id="submit" type="submit" name="del_submit" value="Đồng ý">
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

if (isset($_POST["del_submit"])) {
    $mshs = $_POST["mshs"];
    $name = $_POST["name"];

    if ($mshs == "" || $name =="") {
        echo "Hãy nhập MSHS và tên của học sinh!";
    }else{
        $sql = "DELETE FROM score WHERE mshs = '$mshs' AND name = '$name'";

        $query = pg_query($conn,$sql);
        echo "Xóa thành công";
    }
}
//session_destroy();

?>
<br><br>
<br><br>
<button name ="button" type="button"><a href="../teacher_r.php">Quay lại</a></button>
<br><br>
<button name ="button" type="button"><a href="../login.php">Đăng xuất</a></button>
</body>
</html>