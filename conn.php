<?php 

$servername = "localhost";
$username = "root"; 
$password = "123@123Aa"; 
$database = "users";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
    echo "Ket noi OK ";
}
?>
