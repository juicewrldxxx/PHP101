<?php

$servername = "localhost";
$username = "root"; 
$password = "123@123Aa"; 
$database = "users";

$conn = mysqli_connect($servername, $username, $password, $database);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (username, password) VALUES ($username, $password)";
    if (mysqli_query($conn, $sql)){
        echo " Dang ky thanh cong";
    } 
    else {
        echo "ERROR: ". $sql . "<br>" . mysqli_error(($conn));
    }


}


?>


<!DOCTYPE html>
<html>
<head>
    <title>Đăng Ký</title>
</head>
<body>
    <h2>Đăng Ký</h2>
    <form method="post">
        <label for="username">Tên Đăng Ký:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Mật khẩu:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" name="login" value="Đăng Ký">
    </form>

</body>
</html>
