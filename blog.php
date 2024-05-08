<?php 

$servername = "localhost";
$username = "root"; 
$password = "123@123Aa"; 
$database = "blog";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO posts (title, description) VALUES ('$title', '$description')";
    if (mysqli_query($conn, $sql)){
        echo " Thêm dữ liệu thành công";
    } 
    else {
        echo "ERROR: ". $sql . "<br>" . mysqli_error(($conn));
    }
}
// Fetch existing posts
$sql = "SELECT * FROM posts";
$result = mysqli_query($conn, $sql);
?>

<h1>Blog 101</h1>

<form method="post">
        <input type="text" id="title" name="title" placeholder="Tiêu đề"><br>
        <textarea id="description" name="description" placeholder="Nội dung blog"></textarea><br>
        <input type="submit" value="Thêm">
</form>

<h2>Các bài đăng đã có:</h2>
<ul>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <li>
        <strong><?php echo $row['title']; ?>:</strong> <?php echo $row['description']; ?>
        <a href="edit.php?id=<?php echo $row['id']; ?>">edit</a>
        <a href="delete.php?id=<?php echo $row['id']; ?>">Xóa</a>
    </li>
    <?php } ?>
</ul>


