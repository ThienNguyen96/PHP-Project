<?php
	session_start();
	session_destroy();
	echo "<script>alert('Đăng xuất thành công')</script>";
	header("location:http://localhost:8181/Web_Pizza/index.php");
?>