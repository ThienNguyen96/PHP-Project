<?php
	include("layout/header.php");
	
?>
<?php
	$Page =0;
	$DieuKienTrang="";
	//khi nhan nut phan trang
	if(isset($_GET['Page'])){
		$Page = $_GET['Page'];
	}
	//khi nhan nut phan trang
	if(isset($_GET['tensp'])){
		$DieuKienTrang = $_GET['tensp'];
	}
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$DieuKienTrang = $_POST['search'];
	}
	
	$Where ="WHERE TenSanPham LIKE '%".$DieuKienTrang."%'";
	
	$TruyVan = PhanTrang("*","sanpham",$Where,4,$Page,"&tensp=".$DieuKienTrang);
	$ThucHienTruyVan = $TruyVan;
?>
<div class="product">
		<?php
			$i=0;
			while($col=mysql_fetch_array($ThucHienTruyVan)){
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
						if($i%4==0){
                    ?>
                    <div class="clearfix">
                    </div>
               <?php
					}
			   	}
               ?>
           <div class="divTrang">
           </div>
	
</div>
 <script>
		$(document).ready(function() {
           $('.divTrang<?php echo $Page;?>').addClass('divtrangactive');
        });
	</script>

<?php
	include("layout/footer.php");
?>