<?php
	session_start();
	if(isset($_SESSION["giohang"]))
	{
		if(isset($_REQUEST["MaMH"]))
		{
			$tmp = $_REQUEST["MaMH"];
			unset($_SESSION["giohang"][$tmp]);
			header("Location:../chitietgiohang.php");
		}
			
	}
?>