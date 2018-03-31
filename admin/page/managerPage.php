<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="vn">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/styel_admin.css">
    <link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css">
    <script src="../js/sweetalert2.min.js"></script>
    <script src="../js/jsAdmin.js"></script>
	<title>Trang Quản Trị</title>
</head>
<body>
	<div class="container">
    <?php
        if(!isset($_SESSION['id'])){
			header("Location:http://localhost:8181/Web_Pizza/admin/");
		}
	?>
    
   	<?php
		//trang ket noi
		include("config.php");
		//trang header
    	include("../layout/header.php");
	?>
   <?php
   		//trang content
    	include("../layout/content.php");
	?>
</body>
</html>	
		