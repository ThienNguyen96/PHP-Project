<?php
	$TB="";
	if(isset($_GET['login'])){
		if($_GET['login']=="false"){
			$TB.="<span class='res-false'>tài khoản hoặc mật khẩu không chính xác !</span>";
		}
	}
?>
<div class="resgister">
	<div class="res-img">
    	<img src="img/logo-pizza.png">
    </div>
	<form action="layout/xuly.php" method="post">
    	<table width="40%" border="1" id="tbl-dangNhap">
          <tr>
            <td colspan="2" class="re-title"><div align="center">Đăng Nhập</div></td>
            </tr>
          <tr>
            <td width="43%"><div align="center">Tên Đăng Nhập</div></td>
            <td width="57%" class="txtTenDN">
                <input type="text" name="txtTenDN" required="required" placeholder="Nhập tên đăng nhập..." maxlength="8">
            </td>
            </tr>
          <tr>
            <td><div align="center">Mật Khẩu</div></td>
            <td class="txtPassDN">
                <input type="password" name="txtPassDN" required="required" placeholder="Nhập mật khẩu..." maxlength="10">
            </td>
          </tr>
          <tr>
            <td colspan="2" class="btn-DN">
            	<div align="center">
                	<input type="submit" name="btn-DN" value="Đăng Nhập">
                </div>
            </td>
          </tr>
        </table>
       <div class="tb">
        <?php
        	echo $TB;
		?>
        </div>
    </form>
    <div class="achive">
    	nếu bạn chưa có tài khoản vui lòng <a href="http://localhost:8181/Web_Pizza/thanhvien.php?Ma=dangky">Đăng Ký</a>
    </div>

</div>