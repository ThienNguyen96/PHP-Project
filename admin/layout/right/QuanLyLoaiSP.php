<?php
	$SQLListType = "SELECT * FROM loaisp";
	$ThucHien =mysql_query($SQLListType) or die("truy van loai sp sai");
	
	//REQUEST tu xuly tra ve
	$TB=$TB2=$TB3="";
	//thong bao khi them
	if(isset($_REQUEST['tb3'])){
		if($_REQUEST['tb3']=="success"){
			$TB3="<div class='sucess'>thêm loại sản phẩm thành công !</div>";
		}
	}
	//thong bao khi xoa
	if(isset($_REQUEST['tb'])){
		if($_REQUEST['tb']=="true"){
			$TB = "xóa loại sản phẩm thành công !";
		}
	}
	//thong bao sau khi sua
	if(isset($_REQUEST['tb2'])){
		if($_REQUEST['tb2']=="success"){
			$TB3="<div class='sucess'>sữa sản phẩm thành công !</div>";
		}
	}
	
?>
<div class="manager-content-right-container">
	<div class="type-manager-container">
    	<h1 class="product-manager-title">Quản Lý Loại Sản Phẩm</h1>
        <hr>
        
        <!--Khi Nhan Nut Sua Xuat Hien BAng Nay-->
        <?php
        	if(isset($_GET['MaSua'])){
				$sql = "SELECT * FROM loaisp WHERE MaLoaiSP=".$_GET['MaSua'];
				$qr = mysql_query($sql);
				$result = mysql_fetch_assoc($qr);	
			
		?>
       		<form action="../layout/xuly.php" method="post">
                <table width="301" border="1" id="tbl-fix-LoaiSP">
                  <tr>
                    <td colspan="2" class="tbl-product-title"><div align="center">Sữa Loại Sản Phẩm</div></td>
                  </tr>
                  <tr>
                    <td width="160" class="tbl-product-th"><div align="center">Mã Loại Sản Phẩm</div></td>
                    <td class="txtMaLoaiSP"><input type="text" readonly="readonly" name="txtMaLoaiSP" value="<?php echo $result['MaLoaiSP']?>"></td>
                  </tr>
                  <tr>
                    <td class="tbl-product-th"><div align="center">Tên Loại</div></td>
                    <td class="txtTenLoai"><input type="text" required="required" name="txtTenLoai" value="<?php echo $result['TenLoai']?>"></td>
                  </tr>
                  <tr>
                    <td class="tbl-product-th"><div align="center">Mô Tả</div></td>
                    <td class="txtMoTa">
                    	<textarea name="txtMoTa">
                        	<?php
                            	echo $result['MoTa'];
							?>
                        </textarea>
                    </td>
                  </tr>
                  <tr>
                    <td height="29" colspan="2"><div align="center">
                    	
                    </div></td>
                  </tr>
                  <tr>
                    <td colspan="2" class="tbl-ProductAdd-btn"><div align="center">
                    	<input type="submit" name="btnLoaiSP" value="sữa">
                    </div></td>
                  </tr>
                </table>
           <form>
        <?php
			}
		?>
        <!--form danh sach loai sp-->
        <form action="managerPage.php" method="post">
        	<table width="350" border="1" class="tbl-type-Product">
                  <tr>
                    <td colspan="5" class="tbl-product-title"><div align="center">Danh sách loại sản phẩm</div></td>
                    </tr>
                  <tr>
                    <td width="115" class="tbl-product-th"><div align="center">Mã Loại Sản Phẩm</div></td>
                    <td width="60" class="tbl-product-th"><div align="center">Tên Loại</div></td>
                    <td width="50" class="tbl-product-th"><div align="center">Mô Tả</div></td>
                    <td colspan="2" class="tbl-product-th"><div align="center">Chức Năng</div></td>
                    </tr>
                    <?php
						while($col=mysql_fetch_array($ThucHien)){
                    ?>
                      <tr>
                        <td><div align="center"><?php echo $col['MaLoaiSP'];?></div></td>
                        <td><div align="center"><?php echo $col['TenLoai'];?></div></td>
                        <td><div align="center"><?php echo $col['MoTa'];?></div></td>
                        <td width="45"><div align="center"><a class="link-type" href="../layout/xuly.php?MaLoai=<?php echo $col['MaLoaiSP']?>">xóa</a></div></td>
                        <td width="46"><div align="center"><a class="link-type" href="managerPage.php?Ma=quanlyloaisp&MaSua=<?php echo $col['MaLoaiSP']?>">sữa</a></div></td>
                      </tr>
                  <?php
                  	}
				  ?>
                  <tr>
                    <td colspan="5"><div align="center">
                    	
                    </div></td>
                    </tr>
           </table>
            <?php
               		if($TB==""){
						echo "";
					}else{
						echo "<div class='tb'>".$TB."</div>";
					}
			?>
        </form>
        <!---Ket thuc form ds loai sp-->
        <?php						
							
							if($TB3==""){
								echo "";
							}else{
								echo $TB3;
							}
						?>
        <hr />
        <!--bat dau form them loai-->
        	<form action="../layout/xuly.php" method="post">
            	<table width="200" border="1" id="tbl-add-type">
                  <tr>
                    <td colspan="3" class="tbl-product-title"><div align="center">Thêm Loại Sản Phẩm</div></td>
                  </tr>
                  <tr>
                    <td class="tbl-product-th"><div align="center">Tên Loại Sản Phẩm</div></td>
                    <td colspan="2" class="txtNameType">
                    	<input type="text" required="required" name="txtNameType" placeholder="Nhập tên loại...">
                    </td>
                  </tr>
                  <tr>
                    <td class="tbl-product-th"><div align="center">Mô Tả</div></td>
                    <td colspan="2" class="txtDesType">
                    	<textarea name="txtDesType" required="required" placeholder="Nhập mô tả...">
                        	
                        </textarea>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3" class="tbl-ProductAdd-btn"><div align="center">
                    	<input type="submit" name="btn-type" value="Thêm">
                    </div></td>
                  </tr>
                  
                </table>
                

            </form>
        <!--Ket thuc form them loai-->
    </div>
</div>