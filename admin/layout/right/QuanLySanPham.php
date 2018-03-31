<?php
	
	//phan trang 
	//$Page = 0;
	$dsTrang="";
	$Page=(isset($_GET['Page']))?$_GET['Page']:0;
	
		$SoLuongSanPham=5;
		$SanPhamBatDau = $Page*$SoLuongSanPham;
		$LaySanPham = 'SELECT s.*, l.* FROM sanpham s, loaisp l WHERE s.MaLoaiSP = l.MaLoaiSP LIMIT '.$SanPhamBatDau.' , '.$SoLuongSanPham;
		$TruyVanLaySP = mysql_query($LaySanPham) or die("QR WRONG!");
		//Dem Tong So San Pham
		$TongSoLuongSanPham = mysql_num_rows(mysql_query('SELECT * FROM sanpham'));
		$TongSoTrang = $TongSoLuongSanPham/$SoLuongSanPham;
		
		//Xuat DS Trang
		$dsTrang="";
		for($i=0;$i<$TongSoTrang;$i++){
			$SoTrang = $i+1;
			if($i!=$Page){
				$dsTrang.="<a class='divTrang' href='".$_SERVER['PHP_SELF']."?Ma=quanlysanpham&Page=".$i."'>".$SoTrang."</a>";
			}else{
				$dsTrang.= "<span class='active'>$SoTrang</span>";
			}
		}
		
		//code them san pham
		$sql ="SELECT * FROM loaisp";
		$qr = mysql_query($sql) or die("Truy van khong thuc hien");
		
		//code thong bao xoa san pham
		$TB=$TB2=$TB3="";
		if(isset($_REQUEST['tb'])=="true"){
			$TB = "xóa sản phẩm thành công !";
		}
		
		//code thong bao sau khi them
		//neu chua ton tai session gán ss = ""
		if(!isset($_REQUEST['tb2'])){
			$_SESSION['TenSanPham']="";
			$_SESSION['SoLuong']="";
			$_SESSION['Anh']="";
			$_SESSION['DonGia']="";
			$_SESSION['ThongTin'] ="";
			$_SESSION['LoaiMaSP'] =1;
		}
		
		//khi page xu ly tra ve ket qua
		if(isset($_REQUEST['tb2'])){
			if($_REQUEST['tb2']=="false"){
				$TB2 = "<div class='false'> vui lòng chọn đúng kiểu ảnh hỗ trợ(*.jpg,*.png,*.jeg) !</div>";
			}else if($_REQUEST['tb2']=="checknum"){
				
				$TB2 = "<div class='false'> vui lòng nhập đúng giá cả kiêu số !</div>";
			}else{
				//nau add sp thanh cong clear session
				$_SESSION['TenSanPham']="";
				$_SESSION['SoLuong']="";
				$_SESSION['Anh']="";
				$_SESSION['DonGia']="";
				$_SESSION['ThongTin'] ="";
				$_SESSION['LoaiMaSP'] =1;
				$TB2 = "<div class='tb-add'> thêm sản phẩm thành công !</div>";
			}
		}
		//sua san pham
		if(isset($_REQUEST['tb3'])){
			if($_REQUEST['tb3']=="false"){
				$TB3="<div class='false'> vui lòng chọn đúng kiểu ảnh hỗ trợ(*.jpg,*.png,*.jeg) !</div>";
			}else if($_REQUEST['tb3']=="checknum"){
				$TB3 = "<div class='false'> vui lòng nhập đúng giá cả kiêu số !</div>";
			}else if($_REQUEST['tb3']=="success"){
				$TB3="<div class='sucess'>sữa sản phẩm thành công !</div>";
			}
		}
	
	
?>
<div class="manager-content-right-container">
  <div class="product-manager-container">
   	<h1 class="product-manager-title">Quản Lý Sản Phẩm</h1>
        <hr>
        <!--code sua san pham php-->
        <!--Khi click sua se xuat hien bang nay-->
        <?php
        	if(isset($_GET['MaSuaSP'])){
				$QuerySua="SELECT s.*, l.* FROM sanpham s, loaisp l WHERE s.MaLoaiSP = l.MaLoaiSP AND MaSanPham=".$_GET['MaSuaSP'];
				$ThucHienSua = mysql_query($QuerySua) or die("Query Sua SP Sai");
				$rows = mysql_fetch_assoc($ThucHienSua);
				$FixproductMaSP = $rows['MaSanPham'];
				$FixProductName = $rows['TenSanPham'];
				$FixProductNumber = $rows['SoLuong'];
				$FixProductIMG = $rows['Anh'];
				$FixProductPrice = $rows['DonGia'];
				$FixProductInfo = $rows['ThongTin'];
				$FixProductType = $rows['MaLoaiSP'];
				
				$SQl ="SELECT * FROM loaisp";
				$QRLoaiSP = mysql_query($SQl) or die('truy van ly loai sp sai');
			?>
				
				<div id="QLSP-tbl-Fix">
					<form action="../layout/xuly.php" method="post" enctype="multipart/form-data">
					  <table width="76%" border="1" id="tbl-fix-product">
						  <tr>
							<td colspan="2" class="tbl-product-title"><div align="center">Sữa sản phẩm</div></td>
							</tr>
						  <tr>
                          	<input type="hidden" name="QLSP-fix-MSP" value="<?php echo $FixproductMaSP;?>">
							<td class="tbl-product-th" width="19%"><div align="center">Tên Sản Phẩm</div></td>
                            <td  class="table-fix-txtName"><div align="center"><input type="text" name="QLSP-fix-name" required="required" value="<?php echo $FixProductName?>"></div></td>
						  </tr>
                          <tr>
                            	<td class="tbl-product-th" width="13%"><div align="center">Số Lượng</div></td>
                                <td  class="table-fix-txtName"><div align="center"><input type="text" name="QLSP-fix-number" required="required" value="<?php echo $FixProductNumber ?>"></div></td>
                           </tr>
                           <tr>
                           		<td class="tbl-product-th" width="8%"><div align="center">Ảnh</div></td>
                                <td class="tbl-fix-img">
                                	
								<div align="center">
                                	Ảnh cũ:<br>
                                    <img src="../../page/HinhSP/<?php echo $FixProductIMG ?>"><br>
                                	Chọn ảnh mới:<br>
									<input type="file" name="QLSP-fix-img" required="required">
								</div>
								</td>
                            </tr>
                            <tr>
                            	<td class="tbl-product-th" width="11%"><div align="center">Đơn Giá</div></td>
                                <td  class="table-fix-txtName"><div align="center"><input type="text" name="QLSP-fix-price" required="required" value="<?php echo $FixProductPrice;?>"></div></td>
                            </tr>
                            <tr>
                            	<td class="tbl-product-th" width="16%"><div align="center">Thông Tin</div></td>
                                <td  class="table-fix-txtInfo">
								<div align="center">
									<textarea cols="10" rows="5" name="QLSP-fix-des" >
										<?php echo $FixProductInfo; ?>
									</textarea>
								</div>
								</td>
                            </tr>
                            <tr>
                            	<td class="tbl-product-th" width="13%"><div align="center">Tên Loại Sảm Phẩm</div></td>
                                <td  class="table-fix-txtType">
                                    <div align="center">
                                        <select name="QLSP-fix-type">
                                            <?php
                                                while($colsp=mysql_fetch_array($QRLoaiSP)){
                                                    $LoaiSP = $colsp['MaLoaiSP'];
                                                    if($LoaiSP==$FixProductType){
                                            ?>
                                                <option value="<?php echo $LoaiSP;?>" selected="selected"><?php echo $colsp['TenLoai'] ?></option>
                                            <?php
                                                    }else{
                                            ?>
                                                <option value="<?php echo $LoaiSP;?>"><?php echo $colsp['TenLoai'] ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                            	<td colspan="2" class="btn-fix-Product"><div align="center">
                                	<input type="submit" name="btnProduct" value="sữa"></div>
                                </td>
                            </tr>
					</table>
				<form>
			</div>
				
		<?php						
			}
			if($TB3==""){
				echo "";
			}else{
				echo $TB3;
			}
		?>
        
        <!--ket thuc form sua-->
        
        <!--Form san pham-->
        <form action="managerPage.php" method="post">
          <table width="76%" border="1" id="tbl-product">
              <tr>
                <td colspan="9" class="tbl-product-title"><div align="center">Danh sách sản phẩm</div></td>
                </tr>
              <tr>
                <td class="tbl-product-th" width="6%"><div align="center">STT</div></td>
                <td class="tbl-product-th" width="19%"><div align="center">Tên Sản Phẩm</div></td>
                <td class="tbl-product-th" width="13%"><div align="center">Số Lượng</div></td>
                <td class="tbl-product-th" width="8%"><div align="center">Ảnh</div></td>
                <td class="tbl-product-th" width="11%"><div align="center">Đơn Giá</div></td>
                <td class="tbl-product-th" width="16%"><div align="center">Thông Tin</div></td>
                <td class="tbl-product-th" width="13%"><div align="center">Tên Loại Sảm Phẩm</div></td>
                <td class="tbl-product-th" colspan="2"><div align="center">Chức Năng</div></td>
                </tr>
                <?php
					$i=0;
                	while($col=mysql_fetch_array($TruyVanLaySP)){
						$img = $col['Anh'];
						$i++;
				?>
              <tr>
                <td><div align="center"><?php echo $i;?></div></td>
                <td><div align="center"><?php echo $col['TenSanPham']?></div></td>
                <td><div align="center"><?php echo $col['SoLuong']?></div></td>
                <td class="tbl-product-img"><div align="center"><img src="../../page/HinhSP/<?php echo $img;?>"></div></td>
                <td><div align="center"><?php echo $col['DonGia'];?></div></td>
                <td><div align="center"><?php echo $col['ThongTin'];?></div></td>
                <td><div align="center"><?php echo $col['TenLoai'];?></div></td>
                <td width="7%"><div align="center"><a class="link-product" href="../layout/xuly.php?MaXoaSP=<?php echo $col['MaSanPham']?>&Page=<?php echo $Page;?>">xóa</a></div></td>
                <td width="7%"><div align="center"><a class="link-product" href="managerPage.php?Ma=quanlysanpham&MaSuaSP=<?php echo $col['MaSanPham']?>">sữa</a></div></td>
              </tr>
              <?php
					}
			  ?>
              <tr>
                <td colspan="9"><div align="center"><?php echo $dsTrang;?></div></td>
                </tr>
            </table>
            <!---php thong bao sau khi xoa -->
            <?php
               		if($TB==""){
						echo "";
					}else{
						echo "<div class='tb'>".$TB."</div>";
					}
			 ?>
            </form>
            <!--ket thuc form danh sach san pham-->
            
            <!--bat dau form them san pham-->
            <hr>
            <form action="../layout/xuly.php" method="post" enctype="multipart/form-data">
           		<table width="408" border="1" class="tbl-product-add">
                  <tr>
                    <td colspan="2" class="tbl-ProductAdd-title"><div align="center">Thêm sản phẩm</div></td>
                  </tr>
                  <tr>
                    <td width="171" class="tbl-product-th">
                    	<div align="center">
                        	Tên sản phẩm
                        </div>
                    </td>
                    <td width="109" class="tbl-ProductAdd-input">
                    	<input type="text" name="txtNameProduct" required="required" placeholder="Nhập tên sản phẩm..." value="<?php echo $_SESSION['TenSanPham'];?>" />
                    </td>
                  </tr>
                  <tr>
                    <td class="tbl-product-th">
                    	<div align="center">
                        	Số lượng
                        </div>
                    </td>
                    <td class="tbl-ProductAdd-input">
                    	<input type="text" name="txtNumberProduct" required="required" placeholder="Nhập số lượng sản phẩm..."  value="<?php echo $_SESSION['SoLuong'];?>"/>
                    </td>
                  </tr>
                  <tr>
                    <td class="tbl-product-th">
                    	<div align="center">
                        	Ảnh
                       	</div>
                    </td>
                    <td class="tbl-ProductAdd-img">
                    	<input type="file" name="imgProduct" required="required" value="<?php echo $_SESSION['Anh'];?>" />
                    </td>
                  </tr>
                  <tr>
                    <td class="tbl-product-th">
                    	<div align="center">
                        	Đơn giá
                        </div>
                    </td>
                    <td class="tbl-ProductAdd-input">
                    	<input type="text" name="txtPriceProduct" required="required"  placeholder="Nhập giá..." value="<?php echo $_SESSION['DonGia'];?>"/>
                    </td>
                  </tr>
                  <tr>
                    <td class="tbl-product-th">
                    	<div align="center">
                        	Thông tin
                        </div>
                   	</td>
                    <td class="tbl-ProductAdd-text">
                    	<textarea name="txtInfoProduct" cols="50" rows="5" placeholder="Nhập mô tả sản phẩm...">
                            	<?php echo $_SESSION['ThongTin'];?>
                        </textarea>
                    </td>
                  </tr>
                  <tr>
                    <td class="tbl-product-th">
                    	<div align="center">
                    		Loại sản phẩm
                    	</div>
                    </td>
                    <td>
                    	<select name="selTypeProduct" class="selTypeProduct">
                            <?php
								while($col2=mysql_fetch_array($qr)){
									$compare = $col2['MaLoaiSP'];
									if($_SESSION['LoaiMaSP']==$compare){
                            ?>
                            			<option value="<?php echo $col2['MaLoaiSP']?>" selected="selected"><?php echo $col2['TenLoai']?></option>
                            <?php
									}else{
							?>
                            	<option value="<?php echo $col2['MaLoaiSP']?>"><?php echo $col2['TenLoai']?></option>
                            <?php 
									}
								}
							?>
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td height="33" colspan="2" class="txtTB">
                    	<div align="center">
                    		<?php
							if($TB2==""){
								echo "";
							}else{
								echo $TB2;
							}
						?>
                        </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" class="tbl-ProductAdd-btn">
                    	<div align="center">
                        	<input type="submit" name="btn-addProduct" value="Thêm">
                        </div>
                    </td>
                  </tr>
                </table>

            </form>
    </div>
</div>