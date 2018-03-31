<!DOCTYPE html>
<html lang="vn">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css/styel_admin.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
    <script src="script/jquery-1.11.0.min.js"></script>
    <script src="js/jsAdmin.js"></script>
</head>
<body id="bd-login">
<?php
	session_start();
	include("page/config.php");
	
	
	
	if(isset($_POST['btn-login'])){
		$User = (isset($_POST['id']))?$_POST['id']:"";
		$Pass = (isset($_POST['pass']))?$_POST['pass']:"";
		
		if(!$User || !$Pass){
			echo "<script>alert('Vui lòng nhập đầy đủ thông tin !');history.go(-1);</script>";
			exit;
			
		}else{
			$QR ="SELECT * FROM taikhoan WHERE TenTaiKhoan ='$User' AND MatKhau ='$Pass'";
			$TH = mysql_query($QR);
			$numRows = mysql_num_rows($TH);
			if($numRows==0){
				echo "<script>alert('Tên tài khoản hoặc mật khẩu không đúng !');history.go(-1);</script>";
				exit;
			}else{
				$_SESSION['id'] = $User;
				/*header("Location:http://localhost:8181/php/Admin/page/managerPage.php");*/
				echo "<script language='javascript'>alert('Đăng nhập thành công');";
				echo "location.href='http://localhost:8181/Web_Pizza/admin/page/managerPage.php?Ma=quanly';</script>";	
			}
		}
	}	
?>
	<form action="index.php" method="post" class="frm-login">
    	<div class="container-index">
			<div class="title-index">Administrator</div>
			<div class="content-index">
				<div id="content-title">
					
				</div>
				<div class="user-index">
					<input type="text"  autocomplete="off" name="id" placeholder="Nhập Tên Tài Khoản...">
				</div>
				<div class="pass-index">
					<input type="password" autocomplete="off" placeholder="Nhập password..." name="pass">
				</div>
				<div class="btn-login-index">
					<button type="submit" name="btn-login"><img src="img-admin/index-login.png"><span>Đăng Nhập</span></button>
                    
				</div>
			</div>
		</div>
    </form>
</body>
</html>