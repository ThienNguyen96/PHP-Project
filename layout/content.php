<?php
	$TruyVan = "SELECT * FROM sanpham LIMIT 8";
	$ThucHienTruyVan = mysql_query($TruyVan);
?>
<!--Bat Dau San Pham-->
			<div class="product">
            	<?php
					while($col= mysql_fetch_array($ThucHienTruyVan)){
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