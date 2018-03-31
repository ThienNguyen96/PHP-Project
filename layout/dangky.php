<?php
	$TB="";
	if(isset($_GET['rs'])){
		if($_GET['rs']=="false"){
			$TB.="<span class='res-false'>đăng kí thất bại vui lòng nhập xem lại mật khẩu !</span>";
		}
		if($_GET['rs']=="wrong"){
			$TB.="<span  class='res-false'>tên đăng nhập đã có vui lòng chọn tên khác !</span>";
		}
		if($_GET['rs']=="success"){
			$TB.="<span class='res-suc'>đăng kí thành công <a href='http://localhost:8181/Web_Pizza/thanhvien.php?Ma=dangnhap'>Nhâp vào đây để đăng nhập</a>!</span>";
		}
		
	}
?>
<div class="resgister">
	<div class="res-img">
    	<img src="img/logo-pizza.png">
    </div>
	<form action="layout/xuly.php" method="post">
    	<table width="40%" border="1" id="tbl-register">
          <tr>
            <td colspan="2"><div align="center" class="re-title">Đăng Ký Thành Viên</div></td>
            </tr>
          <tr>
            <td width="39%"><div align="center">Tên đăng nhập</div></td>
            <td width="61%" class="txtUserPage"><input type="text" required name="txtUserPage" maxlength="8" placeholder="Nhập tên đăng nhập..."></td>
            </tr>
          <tr>
            <td><div align="center">Mật khẩu</div></td>
            <td class="txtPassPage"><input type="password" name="txtPassPage" required maxlength="10" placeholder="Nhập mật khẩu..."></td>
          </tr>
          <tr>
            <td><div align="center">Nhập lại mật khẩu</div></td>
            <td class="txtPassPageRe"><input type="password" name="txtPassPageRe" required maxlength="20" placeholder="Nhập lại mật khẩu..."></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center" class="btnLogin">
            	<input type="submit" name="btnLoginPage" value="Đăng Kí">
            </div></td>
            </tr>
        </table>
        <div class="tb">
        <?php
        	echo $TB;
		?>
        </div>
        
    </form>
    <div class="achive">
    	nếu bạn đã có tài khoản vui lòng <a class="dangnhap-link" href="http://localhost:8181/Web_Pizza/thanhvien.php?Ma=dangnhap">Đăng Nhập</a>

    </div>

</div>