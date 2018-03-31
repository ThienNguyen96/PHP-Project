<?php
	include("layout/header.php");
?>
<?php
	if(!isset($_SESSION["TenDangNhap"])){
		
?>
	<div class="payBill">
    	bạn phải<a href="http://localhost:8181/Web_Pizza/thanhvien.php?Ma=dangnhap"> đăng nhập</a> để dùng chức năng này !
    </div>
<?php
	}else{
?>
	<div class="payBill">
    	Thanh Toán Thành Công ! <a href="http://localhost:8181/Web_Pizza/index.php">Về Trang Chủ</a>
    </div>
<?php
	}
?>
<?php
	include("layout/footer.php");
?>