<?php
	include("../page/config.php");
	session_start();
	//Quan Ly Tai Khoan====================================================================================================
	//xoa user
	$TB=$TB2="";
	if(isset($_GET['MaXoa'])){
		$Query ="DELETE FROM taikhoan WHERE id=".$_GET['MaXoa'];
		$ThucHien = mysql_query($Query) or die("Truy Van Xoa Sai");
		header("Location:../page/managerPage.php?Ma=quanlytaikhoan&tb=true");
	}
	//them user
	
	if(isset($_POST['QLTKAdd'])){
		$User = (isset($_POST['QLTKUser']))?$_POST['QLTKUser']:"";
		$Pass =(isset($_POST['QLTKPass']))?$_POST['QLTKPass']:"";
		if($User=="" || $Pass==""){
			header("Location:../page/managerPage.php?Ma=quanlytaikhoan&tb2=false");
		}else{
			$Query = "SELECT * FROM taikhoan WHERE TenTaiKhoan LIKE binary '%$User%'";
			$ThucHien = mysql_query($Query);
			$rows = mysql_num_rows($ThucHien);
			if($rows>0){
				header("Location:../page/managerPage.php?Ma=quanlytaikhoan&tb2=fal");
			}else{
				$Query ="INSERT INTO taikhoan(TenTaiKhoan,MatKhau) VALUES('$User','$Pass')";
				$ThucHien = mysql_query($Query) or die("Them that bai");
				header("Location:../page/managerPage.php?Ma=quanlytaikhoan&tb2=success");	
			}
			
			
		}
	}
	//sua user
	if(isset($_POST['QLTKFixbtn'])){
		$FixUser =$_POST['QTTKFixUser'];
		$FixPass = (isset($_POST['QLTKFixPass']))?$_POST['QLTKFixPass']:"";
		$FixId = $_POST['QLTKFixID'];
		if($FixPass==""){
			header("Location:../page/managerPage.php?Ma=quanlytaikhoan&MaSua=$FixId&tb3=false");
		}else{
			//$strChuoi=0;
			//$Query = "SELECT * FROM taikhoan WHERE TenTaiKhoan='$User%'";
			$Query = "SELECT * FROM taikhoan";
			$ThucHien =mysql_query($Query);
			while($col=mysql_fetch_array($ThucHien)){
				$strChuoi.=$col['MatKhau'];
			}
			//$rows = mysql_num_rows($ThucHien);
			
			if(strlen(strstr($strChuoi,$FixPass))>0){
				header("Location:../page/managerPage.php?Ma=quanlytaikhoan&MaSua=$FixId&tb3=fal");
			}else{
				$Query = "UPDATE taikhoan SET TenTaiKhoan='$FixUser', MatKhau='$FixPass' WHERE id='$FixId'";
				$ThucHien = mysql_query($Query);
				header("Location:../page/managerPage.php?Ma=quanlytaikhoan&tb3=success");
			}
			
		}
	}
	
	//===========================================================QUAN LY SAN PHAM=======================================================================
	
	//a) xoa san pham
	
	if(isset($_GET['MaXoaSP'])){
		$Page=(isset($_GET['Page']))?$_GET['Page']:0;
		$Query ="DELETE FROM sanpham WHERE MaSanPham=".$_GET['MaXoaSP'];
		$ThucHien = mysql_query($Query) or die("Truy Van Xoa Sai");
		header("Location:../page/managerPage.php?Ma=quanlysanpham&tb=true&Page=$Page");

	}
	//b)them san pham
	if(isset($_POST['btn-addProduct'])){
		$txtNameProduct = (isset($_POST['txtNameProduct']))?$_POST['txtNameProduct']:"";
		$txtNumberProduct =(isset($_POST['txtNumberProduct']))?$_POST['txtNumberProduct']:""; 
		$imgProduct =  (isset($_FILES['imgProduct']['name']))?$_FILES['imgProduct']['name']:"";
		$txtPriceProduct = (isset($_POST['txtPriceProduct']))?$_POST['txtPriceProduct']:"";
		$txtInfoProduct = (isset($_POST['txtInfoProduct']))?$_POST['txtInfoProduct']:"";
		$selTypeProduct = (isset($_POST['selTypeProduct']))?$_POST['selTypeProduct']:"";
		
		if($_FILES['imgProduct']['name']!=NULL){
			if($_FILES['imgProduct']['type']=="image/jpeg" 
				|| $_FILES['imgProduct']['type']=="image/png" || $_FILES['imgProduct']['type']=="image/pjeg"){
				move_uploaded_file($_FILES['imgProduct']['tmp_name'],"../../page/HinhSP/".$_FILES['imgProduct']['name']);
			}else{
				header("Location:../page/managerPage.php?Ma=quanlysanpham&tb2=false");
			}
		}
		
		if(!is_numeric($txtPriceProduct) || !is_numeric($txtNumberProduct)){
				$_SESSION['TenSanPham'] = $txtNameProduct;
				$_SESSION['SoLuong'] = $txtNumberProduct;
				$_SESSION['Anh'] = $imgProduct;
				$_SESSION['DonGia'] = $txtPriceProduct;
				$_SESSION['ThongTin'] = $txtInfoProduct;
				$_SESSION['LoaiMaSP'] = $selTypeProduct;
				header("Location:../page/managerPage.php?Ma=quanlysanpham&tb2=checknum");
				
		}else{
		
			$Query ="INSERT INTO sanpham(TenSanPham,SoLuong,Anh,DonGia,ThongTin,MaLoaiSP) VALUES('$txtNameProduct','$txtNumberProduct','$imgProduct','$txtPriceProduct','$txtInfoProduct','$selTypeProduct')";
			$ThucHien = mysql_query($Query) or die("Them sp that bai");
			header("Location:../page/managerPage.php?Ma=quanlysanpham&tb2=success");
		}	
	}
	
	//code sua san pham
	if(isset($_POST['btnProduct'])){
			$FixProductMaSP = (isset($_POST['QLSP-fix-MSP']))?$_POST['QLSP-fix-MSP']:"";
			$FixProductName = (isset($_POST['QLSP-fix-name']))?$_POST['QLSP-fix-name']:"";
			$FixProductNumber =(isset($_POST['QLSP-fix-number']))?$_POST['QLSP-fix-number']:""; 
			$FixProductImg =  (isset($_FILES['QLSP-fix-img']['name']))?$_FILES['QLSP-fix-img']['name']:"";
			$FixProductPrice = (isset($_POST['QLSP-fix-price']))?$_POST['QLSP-fix-price']:"";
			$FixProductInfo = (isset($_POST['QLSP-fix-des']))?$_POST['QLSP-fix-des']:"";
			$FixProductType = (isset($_POST['QLSP-fix-type']))?$_POST['QLSP-fix-type']:"";
			
			
			if($_FILES['QLSP-fix-img']['name']!=NULL){
				if($_FILES['QLSP-fix-img']['type']=="image/jpeg" 
					|| $_FILES['QLSP-fix-img']['type']=="image/png" || $_FILES['QLSP-fix-img']['type']=="image/pjeg"){
					move_uploaded_file($_FILES['QLSP-fix-img']['tmp_name'],"../../page/HinhSP/".$_FILES['QLSP-fix-img']['name']);
				}else{
					header("Location:../page/managerPage.php?Ma=quanlysanpham&MaSuaSP=$FixProductMaSP&tb3=false");
					exit;
				}
			}
			if(!is_numeric($FixProductPrice) || !is_numeric($FixProductNumber)){
				header("Location:../page/managerPage.php?Ma=quanlysanpham&MaSuaSP=$FixProductMaSP&tb3=checknum");
				
			}else{
				$Query = "UPDATE sanpham SET TenSanPham='$FixProductName', SoLuong='$FixProductNumber', Anh='$FixProductImg', DonGia='$FixProductPrice', ThongTin='$FixProductInfo', MaLoaiSP='$FixProductType' WHERE MaSanPham='$FixProductMaSP'";
				$ThucHien = mysql_query($Query) or die("truy van sua sp sai");
				header("Location:../page/managerPage.php?Ma=quanlysanpham&tb3=success");
			}
			
	}
	
	//===================================================================Quan Ly Loai SP========================================================
	
	//code them loai
		if(isset($_POST['btn-type'])){
			$TenLoai = (isset($_POST['txtNameType']))?$_POST['txtNameType']:"";
			$MoTa = (isset($_POST['txtDesType']))?$_POST['txtDesType']:"";
			$Query = "INSERT INTO loaisp(TenLoai,MoTa) VALUES('$TenLoai','$MoTa')";
			$ThucHien = mysql_query($Query) or die("truy Van Them Loai Sai !");
			header("Location:../page/managerPage.php?Ma=quanlyloaisp&tb3=success");
			
		}
	//code xoa loai san pham
		if(isset($_GET['MaLoai'])){
			$Query = "DELETE FROM loaisp WHERE MaLoaiSP=".$_GET['MaLoai'];
			$ThucHien = mysql_query($Query) or die("truy van xoa loai sp sai !");
			header("Location:../page/managerPage.php?Ma=quanlyloaisp&tb=true");
			
		}
	//code sua loai san pham
		if(isset($_POST['btnLoaiSP'])){
			$MaLoaiSP = (isset($_POST['txtMaLoaiSP']))?$_POST['txtMaLoaiSP']:"";
			$TenLoaiSP = (isset($_POST['txtTenLoai']))?$_POST['txtTenLoai']:"";
			$MoTaLoaiSP = (isset($_POST['txtMoTa']))?$_POST['txtMoTa']:"";
			$Query ="UPDATE loaisp SET TenLoai='$TenLoaiSP', MoTa ='$MoTaLoaiSP' WHERE MaLoaiSP='$MaLoaiSP'";
			$ThucHien = mysql_query($Query) or die("truy Van Sua Loai SP Sai");
			header("Location:../page/managerPage.php?Ma=quanlyloaisp&tb2=success");
		}
?>