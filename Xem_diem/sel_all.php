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
<h3>Bảng điểm của tất cả  học sinh</h3>

<?php
$host = "localhost";
$port = "5432";
$dbname = "Quan_ly_hoc_sinh";
$dbuser = 'postgres';
$dbpass = '123456';
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$dbuser password=$dbpass") or die ("Khong the  ket noi toi server\n");


$sql = "SELECT mshs,name,math,physic,english FROM score ";

$query = pg_query($conn,$sql);

echo "<table>";
echo "<tr><td>" ."MSHS". "</td><td>" . "Tên" . "</td><td>". "Toán" . "</td><td>". "Lý" . "</td><td>". "Tiếng Anh" . "</td></tr>";
while($row = pg_fetch_array($query)){   //Creates a loop to loop through results
    echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>". $row[2] . "</td><td>". $row[3] . "</td><td>". $row['4'] . "</td></tr>";
}

echo "</table>";
//session_destroy();

?>
<button name ="button" type="button"><a href="../Xem_diem/sel.php">Quay lại</a></button>
<button name ="button" type="button"><a href="../login.php">Đăng xuất</a></button>
</body>
</html>