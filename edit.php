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

    $sql = "SELECT * FROM posts WHERE id = $post_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $description = $row['description'];
    } else {
        echo "Không tìm thấy bài post.";
    }
} else {
    echo "ID của bài post không được cung cấp.";
}
?>

<!-- Biểu mẫu để sửa bài post -->
<form method="post" action="update_post.php">
    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
    Tiêu đề: <input type="text" name="title" value="<?php echo $title; ?>"><br>
    Nội dung: <textarea name="description"><?php echo $description; ?></textarea><br>
    <input type="submit" value="Lưu">
</form>

<?php
mysqli_close($conn);
?>