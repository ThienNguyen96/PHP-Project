<?php
	include("layout/header.php");
?>
<div class="content-cart">
	<form>
	<table width="40%" border="1" id="tbl-cart">
      <tr>
        <td colspan="6" class="tbl-cart-th" ><div align="center">Thông Tin Giỏ Hàng Của Bạn</div></td>
        </tr>
      <tr>
        <td class="tbl-cart-th" width="22%"><div align="center">Tên Sản Phẩm</div></td>
        <td class="tbl-cart-th" width="11%"><div align="center">Ảnh</div></td>
        <td class="tbl-cart-th" width="13%"><div align="center">Giá</div></td>
        <td class="tbl-cart-th" width="15%"><div align="center">Số Lượng</div></td>
        <td class="tbl-cart-th" width="15%"><div align="center">Thành Tiền</div></td>
        <td class="tbl-cart-th" width="24%"><div align="center">Chức Năng</div></td>
      </tr>
      <?php
      		$Total =0;
			if(isset($_SESSION["giohang"])){
				if(isset($_SESSION["giohang"])){
					
					foreach($_SESSION["giohang"] as $SPP){
						$Total+=$SPP["sl"]*$SPP["DonGia"];
	  ?>
                          <tr>
                            <td class="tbl-cart-name" align="center"><?php echo $SPP["TenSanPham"]?></td>
                            <td class="tbl-cart-img"><img src="page/HinhSP/<?php echo $SPP['Anh']?>"></td>
                            <td class="tbl-cart-price" align="center"><?php echo $SPP["DonGia"]?></td>
                            <td class="tbl-cart-sl" align="center"><?php echo $SPP["sl"]?></td>
                            <td class="tbl-cart-tt" align="center"><?php echo $SPP["sl"]*$SPP["DonGia"]?></td>
                            <td class="tbl-cart-fu" align="center"><a href="layout/deletecart.php?MaMH=<?php echo $SPP['MaSanPham']?>">Xóa</a></td>
                          </tr>
      <?php
					}
				}
      		}else{
	  ?>
      		<tr>
            	<td colspan="6" align="center" class="ntf">Bạn chưa chọn sản phẩm nào !</td>
            </tr>
      <?php
		}
	  ?>
      <tr>
        <td colspan="2" class="cnt" align="center"><a href="javascript:history.go(-1)"> Tiếp tục mua hàng</a></td>
        <td colspan="3" align="center" class="total">Tổng Cộng: <?php echo $Total;?> (VNĐ)</td>
        <td class="cnt" align="center"><a href="thanhtoan.php">Thanh Toán</a></td>
      </tr>
    </table>
   </form>

</div>
<?php
	include("layout/footer.php");
?>