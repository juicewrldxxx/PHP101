<?php
$servername = "localhost";
$username = "root";
$password = "123@123Aa";
$database = "blog";

// Kết nối đến MySQL
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Xác định ID của bài post cần cập nhật từ dữ liệu được gửi bằng phương thức POST
if(isset($_POST['post_id'])) {
    $post_id = $_POST['post_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Truy vấn để cập nhật dữ liệu của bài post
    $sql = "UPDATE posts SET title = '$title', description = '$description' WHERE id = $post_id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('update thanh cong'); 
        window.location.href = 'blog.php';</script>";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
} else {
    echo "ID của bài post không được cung cấp.";
}

mysqli_close($conn);
?>
<a href="blog.php">click here to return home page</a>
