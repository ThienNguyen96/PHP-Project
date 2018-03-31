<?php
	include("layout/header.php");
	$id =0;
	if(isset($_GET['id'])){
		$query ="SELECT * FROM SanPham WHERE MaSanPham =".$_GET['id'];
		$thucHien = mysql_query($query);
		$col = mysql_fetch_assoc($thucHien);
	}
	
?>
	<div class="product">
    	
    	<div class="chitiet-detail-product">
        	<div class="chitiet-detail-img">
            	<img src="page/HinhSP/<?php echo $col['Anh']?>">
            </div>
            <div class="chitiet-detail-info">
            	<h1 class="title-name">Thông tin chi tiết sản phẩm</h1>	
                <hr class="hr1">
                <hr class="hr2">
            	<span class="chitiet-detail-nameproduct"><?php echo $col['TenSanPham'];?></span></br>
                <span class="chitiet-detail-infoproduct"><?php echo $col['ThongTin'];?></span></br>
                <span class="chitiet-detail-priceproduct">Giá: <?php echo $col['DonGia'];?> VNĐ</span></br>
               <!--<span class="number-title">Số Lượng:</span><br>
                <select name="slbSL" class="slSL">
                	<?php
                    	/*for($i=0;$i<=$col['SoLuong'];$i++){
							$SL = $i;
					?>
                    	<option value="<?php $i?>"><?php echo $SL;?></option>
                    <?php
						}*/
					?>
                </select>-->
               	<div class="add-to-cart">
                	<a href="layout/xuly.php?MaMH=<?php echo $col['MaSanPham']?>"><img src="img/cart.png">Thêm vào giỏ hàng</a>
                </div>
            </div>
        </div>
        <div class="clear-fix">
        
        </div>
        	<?php
            	$TruyVan = "SELECT * FROM sanpham LIMIT 0,4";
				$ThucHien = mysql_query($TruyVan);
				$i=0;
				while($col=mysql_fetch_array($ThucHien)){
				$i++;
			?>
            	<div class="product-item">
                            <a href="ChiTietSanPham.php?id=<?php echo $col['MaSanPham']?>">
                                <div class="hinh">
                                    <img src="page/HinhSP/<?php echo $col['Anh'];?>" alt="">
                                </div>
                                <div class="detail">
                                    <h3><?php echo $col['TenSanPham'];?></h3>
                                    <p class="gia"><?php echo $col['DonGia'].' ';?>VNĐ</p>
                                    <span>Xem</span>
                                </div>
                            </a>
                            <a class="link-lk" href="layout/xuly.php?MaMH=<?php echo $col['MaSanPham']?>">Thêm vào giỏ hàng</a>
                    </div>
            <?php
				}
			?>
    </div>
<?php
	include("layout/footer.php");
?>