<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./CSS/1.css" />
    <title>Đăng nhập</title>
</head>
<body>
<div class="form">
    <form method="POST" action="login.php" >
        <div>
            <div>
                <h2 style="margin-left: 60px;">Đăng nhập</h2>
                <label>Username </label>
                <input type="text" name="username"><br><br>
                <label>Mật Khẩu </label>
                <input type="password" name="password"><br><br>
                <label for="position">Chức vụ:</label>
                <select name="position" id="position">
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                </select><br><br>
                <input id="submit" type="submit" name="btn_submit" value="Gửi" style="margin-left: 100px;"><br>
                <tr>
                    <td>Bạn chưa có tài khoản? <a href='register.php'>Đăng ký ngay</a></td>
                </tr>
            </div>
        </div>
    </form>
</div>


<?php
//require("lib/connection.php");
$host = "localhost";
$port = "5432";
$dbname = "Quan_ly_hoc_sinh";
$dbuser = 'postgres';
$dbpass = '123456';
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$dbuser password=$dbpass") or die ("Khong the  ket noi toi server\n");

if (isset($_POST["btn_submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $position = $_POST["position"];

    if ($username == "" || $password =="" || $position =="") {
        echo "Vui lòng điền đủ thông tin!";
    }else{
        $sql = "SELECT * FROM infomation WHERE username = '$username' AND password = '$password' AND position = '$position'";
        $query = pg_query($conn,$sql);
        $num_rows = pg_num_rows($query);
        if ($num_rows==0) {
            echo "Thông tin đăng nhập không chính xác! Vui lòng nhập lại!";
        }else{
            //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
            $_SESSION['username'] = $username;
            // Thực thi hành động sau khi lưu thông tin vào session

            if($position == "teacher"){
                header('Location: teacher_r.php');
            }elseif ($position == "student"){
                header('Location: ./Xem_diem/viewscore.php');
            }
        }
    }
}
?>
</body>
</html>