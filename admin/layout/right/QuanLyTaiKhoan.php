<?php
	$Query ="SELECT * FROM taikhoan";
	$ThucHien = mysql_query($Query) or die("Lỗi Truy Vấn");
	//thong bao sau khi xoa
	$TB=$TB2=$TB3="";
	if(isset($_REQUEST['tb'])=="true"){
		$TB = "xóa tài khoản thành công !";
	}
	//thong bao sau khi them
	if(isset($_REQUEST['tb2'])){
		if($_REQUEST['tb2']=="false"){
			$TB2 = "<div class='false'> vui lòng nhập đầy đủ thông tin !</div>";
		}else if($_REQUEST['tb2']=="fal"){
			$TB2 = "<div class='false'> tài khoản đã có vui lòng chọn tài khoản khác !</div>";
		}else{
			$TB2 = "<div class='tb-add'> thêm tài khoản thành công !</div>";
		}
	}
	//thong bao sau khi sua
	if(isset($_REQUEST['tb3'])){
		if($_REQUEST['tb3']=="false"){
			$TB3="<div class='false'>vui lòng nhập đầy đủ thông tin !</div>";
		}else if($_REQUEST['tb3']=="fal"){
			$TB3 = "<div class='false'> tài khoản đã có vui lòng chọn tài khoản khác !</div>";
		}else{
			$TB3="<div class='sucess'>sữa thành công !</div>";
		}
	}
?>
<div class="manager-content-right-container">
  <div class="manager-content-right-add">
    	<h1>Quản Lý Tài Khoản</h1>
        
        <?php
		//table sua tai khoan
        	if(isset($_GET['MaSua'])){
				$QuerySua="SELECT * FROM taikhoan WHERE id=".$_GET['MaSua'];
				$ThucHienSua = mysql_query($QuerySua) or die("Query Sua Sai");
				$rows = mysql_fetch_assoc($ThucHienSua);
				$IdFix = $rows['id'];
				$UserFix = $rows['TenTaiKhoan'];
				$PassFix = $rows['MatKhau'];
				echo "<hr>";
				echo '<div class="QLTK-table-fix">
						<form action="../layout/xuly.php" method="post" enctype="multipart/form-data">
							<table width="40%" border="1">
								<input type="hidden" name="QLTKFixID" value="'.$IdFix.'">
								<tr>
									<td colspan="3" class="table-fix-title"><div align="center">Sữa Tài Khoản</div></td>
								 </tr>
								 <tr>
									 <td width="84" class="table-fix-th"><div align="center">ID</div></td>
									 <td colspan="2" class="table-txtName"><input type="text"  name="QTTKFixUser" readonly="readonly" value="'.$UserFix.'" maxlength="8"></td>
								 </tr>
								 <tr>
								   <td><div align="center" class="table-fix-th">Mật Khẩu</div></td>
								   <td colspan="2" class="table-txtFixPass"><input type="text" name="QLTKFixPass" value="'.$PassFix.'" maxlength="12"></td>
								 </tr>
								 <tr>
								   <td colspan="3" class="table-fix-btn">
								   		<div align="center">
											<input type="submit" name="QLTKFixbtn" value="Sữa">
										</div>
									</td>
								 </tr>
							</table>
					 </form>
				</div>';
			}
			
			if($TB3==""){
				echo "";
			}else{
				echo $TB3;
			}
		?>	
        

        <hr>
        	<form action="managerPage.php" method="post">
            	<table width="40%" border="1" class="tableListAccount">
                  <tr>
                    <td colspan="5"><div align="center">Danh Sách Tài Khoản</div></td>
                    </tr>
                  <tr>
                    <td width="14%"><div align="center" class="table-title">STT</div></td>
                    <td width="25%"><div align="center" class="table-title">ID</div></td>
                    <td width="22%"><div align="center" class="table-title">Mật Khẩu</div></td>
                    <td colspan="2"><div align="center" class="table-title">Chức Năng</div></td>
                    </tr>
                    <?php
						$i=0;
                    	while($col=mysql_fetch_array($ThucHien)){
							$i++;
					?>
                  <tr>
                    <td><div align="center"><?php echo $i;?></div></td>
                    <td><div align="center"><?php echo $col['TenTaiKhoan']?></div></td>
                    <td><div align="center"><?php echo $col['MatKhau']?></div></td>
                    <td width="20%" class="QLTKlink"><div align="center"><a href="../layout/xuly.php?MaXoa=<?php echo $col['id']?>">xóa</a></div></td>
                    <td width="19%" class="QLTKlink"><div align="center"><a href="managerPage.php?Ma=quanlytaikhoan&MaSua=<?php echo $col['id']?>">sữa</a></div></td>
                  </tr>
                  <?php
					}
				  ?>
               </table>
              <?php
               		if($TB==""){
						echo "";
					}else{
						echo "<div class='tb'>".$TB."</div>";
					}
			   ?>
            </form>
		<!--Bat Dau Them Tai Khoan..-->
        <hr>
        <form action="../layout/xuly.php" method="post" enctype="multipart/form-data">
        	<table width="40%" border="1" class="addAccount">
              <tr>
                <td colspan="2"><div align="center">Thêm Tài Khoản</div></td>
                </tr>
              <tr>
                <td width="204" class="txtID"><div align="center">ID</div></td>
                <td width="198" class="txtUser">
                    <input type="text" name="QLTKUser" placeholder="Nhập ID..." maxlength="8" >
                </td>
              </tr>
              <tr>
                <td class="txtPass"><div align="center">Mật Khẩu</div></td>
                <td class="txtPass">
                    <input type="text" name="QLTKPass" placeholder="Nhập Mật Khẩu..." maxlength="12">
                </td>
              </tr>
              <tr>
                <td colspan="2" class="txtTB">
                	 <?php
						if($TB2==""){
							echo "";
						}else{
							echo $TB2;
						}
					?>
                </td>
                </tr>
              <tr>
                <td colspan="2" class="manager-btn">
                    <div align="center">
                      <input type="submit" name="QLTKAdd" value="Thêm">
                  </div>
                </td>
                </tr>
            </table>
           
      </form>
  </div>
</div>