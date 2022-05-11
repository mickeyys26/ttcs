<html>
<head>
    <title>Đăng kí</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./CSS/1.css" />
</head>
<body>
<div class="form">
    <form action="register.php" method="post">
        <div>
            <div>
                <h2 style="margin-left: 80px;">Đăng ký</h2>
                <label>Username </label>
                <input type="text" name="username" style="margin-left: 30px;"><br><br>
                <label>Mật Khẩu </label>
                <input type="password" name="pass" style="margin-left: 30px;"><br><br>
                <label>Name</label>
                <input type="text" name="name" style="margin-left: 57px;"><br><br>
                <label >Chức vụ</label>
                <select name="pos" style="margin-left: 40px;"><br><br>
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                </select><br><br>
                <label>Mã số</label>
                <input type="text" name="mshs" style="margin-left: 54px;"><br><br>
                <input id="submit" type="submit" name="btn_submit" value="Gửi" style="margin-left: 100px;">
            </div>
        </div>
    </form>
    <div>
        <a>Bạn đã có tài khoản?</a><button name ="button" type="button"><a href="login.php">Đăng nhập ngay </a></button>
    </div>
</div>


<?php
//require('lib/connection.php');
$host = "localhost";
$port = "5432";
$dbname = "Quan_ly_hoc_sinh";
$dbuser = 'postgres';
$dbpass = '123456';
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$dbuser password=$dbpass") or die ("Khong the  ket noi toi server\n");

if (isset($_POST["btn_submit"])) {
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $name = $_POST["name"];
    $mshs = $_POST["mshs"];
    $pos = $_POST['pos'];
    if ($username == "" || $password == "" || $name == "" || $mshs == "") {
        echo "bạn vui lòng nhập đầy đủ thông tin";
    } else {
        // Kiểm tra tài khoản đã tồn tại chưa
        $sql = "SELECT * FROM infomation WHERE username='$username'";
        $kiemtra = pg_query($conn, $sql);

        if (pg_num_rows($kiemtra) > 0) {
            error_log("Tài khoản đã tồn tại");
        } else {
            //thực hiện việc lưu trữ dữ liệu vào db
            $sql = "INSERT INTO infomation(username,password,name,mshs,position ) VALUES ('$username','$password','$name','$mshs','$pos')";
            // thực thi câu $sql với biến conn lấy từ file connection.php
            pg_query($conn, $sql);
            echo "Đăng kí thành công";
        }
    }
}
?>

</body>
</html>