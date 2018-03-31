<?php
	session_start();
	$con = mysql_connect("localhost","root","");
	mysql_select_db("pizza",$con);
	mysql_query("set names utf8");
	
	//xu ly trang dang ky
	//addslashes() tranh SQL Injection
	if(isset($_POST['btnLoginPage'])){
		$UserMember = (isset($_POST['txtUserPage']))?addslashes($_POST['txtUserPage']):"";
		$PassMember = (isset($_POST['txtPassPage']))?addslashes($_POST['txtPassPage']):"";
		$PassRe = (isset($_POST['txtPassPageRe']))?addslashes($_POST['txtPassPageRe']):"";
		
		$QR= "SELECT TenTaiKhoan FROM taikhoan WHERE TenTaiKhoan ='$UserMember'";
		$numRows = mysql_num_rows(mysql_query($QR));
		if($numRows>0){
			header("Location:http://localhost:8181/Web_Pizza/thanhvien.php?Ma=dangky&rs=wrong");
		}else if($PassRe !=$PassMember){
			header("Location:http://localhost:8181/Web_Pizza/thanhvien.php?Ma=dangky&rs=false");
		}else{
			$QR = "INSERT INTO taikhoan(TenTaiKhoan,MatKhau) VALUES('$UserMember','$PassRe')";
			$ThucHen = mysql_query($QR);
			//$_SESSION['TenDangNhap'] = $UserMember;
			header("Location:http://localhost:8181/Web_Pizza/thanhvien.php?Ma=dangky&rs=success");
		}
	}
	
	//xu ly dang nhap
	if(isset($_POST['btn-DN'])){
		$UserLogin = (isset($_POST['txtTenDN']))?addslashes($_POST['txtTenDN']):"";
		$PassLogin = (isset($_POST['txtPassDN']))?addslashes($_POST['txtPassDN']):"";
		
		$QR= "SELECT * FROM taikhoan WHERE TenTaiKhoan ='$UserLogin' AND MatKhau='$PassLogin'";
		$numRows = mysql_num_rows(mysql_query($QR));
		if($numRows==0){
			header("Location:http://localhost:8181/Web_Pizza/thanhvien.php?Ma=dangnhap&login=false");
		}else{
			$_SESSION['TenDangNhap'] = $UserLogin;
			header("Location:http://localhost:8181/Web_Pizza/index.php");
		}
	}
	
	//======================================================code gio hang==========================================
	if(isset($_REQUEST['MaMH'])){
		$MaMH = $_REQUEST['MaMH'];
		$sql = "SELECT * FROM sanpham WHERE MaSanPham='$MaMH'";
		$Rs = mysql_query($sql) or die("Truy Van Gio Hang Sai");
		$rows = mysql_fetch_row($Rs);
		$TSP = $rows[1];
		$IMG = $rows[3];
		$GIA = $rows[4];
		//tao 1 bien de chua san pham
		$SPDC = array();
		$SPDC[$MaMH]["MaSanPham"]=$MaMH;
		$SPDC[$MaMH]["TenSanPham"]=$TSP;
		$SPDC[$MaMH]["Anh"] = $IMG;
		$SPDC[$MaMH]["DonGia"]=$GIA;
		//kiem tra xem co bien session gio hang chua
		if(!isset($_SESSION["giohang"])){
			$SPDC[$MaMH]["sl"]=1;
			$_SESSION["giohang"][$MaMH]=$SPDC[$MaMH];
		}else{
			if(array_key_exists($MaMH,$_SESSION["giohang"])){
				$_SESSION["giohang"][$MaMH]["sl"]+=1;
			}else{
				$SPDC[$MaMH]["sl"]=1;
				$_SESSION["giohang"][$MaMH]=$SPDC[$MaMH];
			}
		}
		//header("Location:../index.php");
		echo "<script>window.history.go(-1)</script>";
	}else{
		//header("Location:../index.php");
		//echo "<a href='javascript:history.go(-1)'></a>";
		echo "<script>window.history.go(-1)</script>";
	}
	
?>