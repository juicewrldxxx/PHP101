<?php 

$servername = "localhost";
$username = "root"; 
$password = "123@123Aa"; 
$database = "users";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $sql)){
        echo " Thêm dữ liệu thành công";
    } 
    else {
        echo "ERROR: ". $sql . "<br>" . mysqli_error(($conn));
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký</title>
</head>
<body>
    <h2>Đăng ký</h2>
    <form method="post">
        <label for="username">Tên đăng nhập:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Mật khẩu:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" name="register" value="Đăng ký">
    </form>

</body>
</html>