<?php
	include("layout/header.php");
?>
<?php
	if(isset($_GET['Ma'])){
		if($_GET['Ma']=="dangky"){
			require("layout/dangky.php");
		}else{
			require("layout/dangnhap.php");
		}
	}
?>	
<?php
	include("layout/footer.php");
?>