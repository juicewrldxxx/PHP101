<?php 

session_start(); 
session_destroy();

echo "<script>alert('Dang xuat thanh cong'); 
window.location.href = 'login.php';</script>";
?>