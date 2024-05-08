<?php
$servername = "localhost";
$username = "root";
$password = "123@123Aa";
$database = "blog";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['id'])) {
    $post_id = $_GET['id'];

    $sql = "DELETE FROM posts WHERE id = $post_id";
    $result = mysqli_query($conn, $sql);

  if (mysqli_query($conn, $sql)) {
        echo "<script>alert('xoa bai thanh cong'); 
        window.location.href = 'blog.php';</script>";
        
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>