<?php
	session_start();
	$con = mysql_connect("localhost","root","");
	mysql_select_db("pizza",$con);
	mysql_query("set names utf8");			
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pizza Hut</title>
	<link rel="stylesheet" type="text/css" href="css/sty.css">
    <script src="script/jquery-1.11.0.min.js"></script>

</head>
<body>
	<div class="wrapper">

		<div class="header">
			<div class="header-title">
			</div>
			<!--Bat Dau Head-content-->
			<div class="header-content">
				<div class="header-content-left">
					<form action="TimKiemSanPham.php" method="post">
						<input type="text" name="search" id="search" placeholder="Nhập Sản Phẩm...">
						<input type="submit"  value="Tìm" id="btnSearch">
					</form>
				</div>
				<div class="header-content-center">
					<a href="index.php"><img src="img/logo-pizza.png" alt=""></a>
				</div>
				<div class="header-content-right">
                <?php
                	if(!isset($_SESSION['TenDangNhap'])){
				?>
					<div class="form-login">
						<!--<form action="" method="">
							<button type="submit" name="dangki"><img class="login" src="img/dk.png" alt="">Đăng Kí</button>
							<button type="submit" name="dangnhap"><img class="login"  src="img/dn.png" alt="">Đăng Nhập</button>
						</form>-->
                        <a class="link-dk" href="thanhvien.php?Ma=dangky">Đăng kí</a></button></br>
                        <a class="link-dn" href="thanhvien.php?Ma=dangnhap">Đăng nhập</a></button>
					</div>
                <?php
					}else{
						$Name = $_SESSION['TenDangNhap'];
						$sqlAd = "SELECT * FROM taikhoan WHERE TenTaiKhoan = '$Name' AND PhanQuyen = 1";
						$Acsql = mysql_query($sqlAd,$con) or die("dm cc");
						$num = mysql_num_rows($Acsql);
						if($num==0){
				?>
                		<div class="greeting"><span>Chào <?php echo $_SESSION['TenDangNhap'];?> 
                    		</span><a class="bye" href="layout/logout.php">Đăng Xuất</a>
                     	</div>
                  	<?php
						}else{
					?>
                    <div class="greeting"><span>Chào <?php echo $_SESSION['TenDangNhap'];?> </span>
                    	<a class="bye" href="layout/logout.php">Đăng Xuất</a>
                     	<a href="admin/index.php"> Quản Trị</a> 
                     </div>
                    
                 <?php
						}
					}
				?>
                <!--code gio hang-->
                	<?php
                    	$soluong =0;
						if(isset($_SESSION['giohang'])){
							foreach($_SESSION['giohang'] as $sp){
								$soluong += $sp['sl'];
							}
						}
					?>
					<div class="gio-hang">
						<span>Giỏ hàng của bạn  <a href="chitietgiohang.php"><?php echo $soluong;?></a></span>
					</div>
				</div>
			</div>
			<!--Ket Thuc Head-content-->
			<!--Bat Dau navigation-->
			<div class="navigation">
				<nav>
					<a href="index.php">Trang Chủ</a>
					<a href="sanpham.php">Sản Phẩm</a>
					<a href="lienhe.php">Liên Hệ</a>
				</nav>
			</div>
			<!--Ket Thuc Navigation-->
		</div>
		<!--Ket thuc Header-->
        <?php
			
			
			
			//ham phan trang
			
			function PhanTrang($TenCot,$TenBang,$DieuKien,$SoLuongSanPham,$Trang,$DieuKienTrang){
				
				$SanPhamBatDau = $Trang*$SoLuongSanPham;
				$LaySanPham = 'SELECT '.$TenCot.' FROM '.$TenBang.' '.$DieuKien.' '.'LIMIT '.$SanPhamBatDau.' , '.$SoLuongSanPham;
				$TruyVanLaySP = mysql_query($LaySanPham);
				//Dem Tong So San Pham
				$TongSoLuongSanPham = mysql_num_rows(mysql_query('SELECT '.$TenCot.' FROM '.$TenBang.' '.$DieuKien));
				$TongSoTrang = $TongSoLuongSanPham/$SoLuongSanPham;
				
				//Xuat DS Trang
				$dsTrang="";
				for($i=0;$i<$TongSoTrang;$i++){
					$SoTrang = $i+1;
					$dsTrang.="<a class='divTrang".$i."' href='".$_SERVER['PHP_SELF']."?Page=".$i.$DieuKienTrang."'>".$SoTrang."</a>";
				}
				echo "<script>
						$(document).ready(function(){
							$('.divTrang').html(\"".$dsTrang."\");	
						})
					</script>";
				return $TruyVanLaySP;
			}
			/**/
			//
		//document.getElementsById('divTrang').innerHTML(\"".$dsTrang."\"); 
			
        ?>