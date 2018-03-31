<?php
	session_start();
	session_destroy();
	echo "<script>alert('Đăng Xuất Thành Công !');";
	echo "location.href='http://localhost:8181/Web_Pizza/admin/index.php'</script>";
?>