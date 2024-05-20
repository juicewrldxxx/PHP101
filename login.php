<?php 

session_start(); 

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

    $sql = "select * from user where username = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

             // Set session variables
     $_SESSION['loggin'] = true;
     $_SESSION['username'] = $user['username'];
     $_SESSION['userid'] = $user['id'];

      // Optionally set a cookie for "remember me" functionality
      if (isset($_POST['remember_me'])) {
        setcookie("username", $user['username'], time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie("userid", $user['id'], time() + (86400 * 30), "/");
    }

        echo "<script>alert('Dang nhap thanh cong'); 
        window.location.href = 'blog.php';</script>";
    }else {
        echo "Đăng nhập không thành công";

    }


}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form method="post">
        <label for="username">Tên đăng nhập:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Mật khẩu:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" name="login" value="Đăng Nhập">
    </form>

</body>
</html>