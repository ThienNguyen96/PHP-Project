<!--bat dau content-->
        <div class="manager-content">
        	<div class="manager-content-left">
        	<?php
            	include("left.php");
			?>
           </div>
            <div class="manager-content-right">
            	<?php
					$tmp ="";
                	if(isset($_GET['Ma'])){
						$tmp = $_GET['Ma'];
					}
					
					if($tmp=="quanlytaikhoan"){
						include("right/QuanLyTaiKhoan.php");
					}else if($tmp=="quanlysanpham"){
						include("right/QuanLySanPham.php");
					}else if($tmp=="quanly"){
						include("right/QuanLy.php");
					}else{
						include("right/quanlyloaisp.php");
					}
				?>
			</div>
        </div>
    </div>
     <!--ket thuc content-->