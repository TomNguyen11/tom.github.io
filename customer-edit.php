<?php
	include ("connect.php");
	$id_cus = $_REQUEST['id_cus'];
	$query = "SELECT * FROM customer WHERE id_cus='$id_cus'";
	$result = mysqli_query($con, $query) or die("LOI TRUY VAN: ".mysqli_error($con));
	$rows = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$gender = $rows['gender'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Trang khách hàng</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles/main.css">
	</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Chào mừng bạn đến với trang quản lý khách hàng</h1>
			<h2>Sửa thông tin khách hàng</h2>
		</div>
		<div id="content">
			<form action="customer-enter.php" method="post">
				<table>
					<tr>
						<td width="150px">Tên khách hàng</td>
						<td><input type="text" name="name_cus" size="50" placeholder="Nhập tên khách hàng" value="<?php echo $rows['name_cus'];?>"></td>
					</tr>
					<tr>
						<td>Địa chỉ</td>
						<td><input type="text" name="adrr" size="50" placeholder="Nhập địa chỉ khách hàng" value="<?php echo $rows['address'];?>"></td>
					</tr>
					<tr>
						<td>Quận huyện</td>
						<td>
							<select name="id_dis">
								<option value="0">--Chọn quận huyện--</option>
								<?php
									$id_dis = $rows['id_dis'];
									$selected = "";
									$query1 = "SELECT * FROM district";
									$result1 = mysqli_query($con, $query1) or die("LOI TRUY VAN DISTRICT: ".mysqli_error($con));
									while($row1s=mysqli_fetch_array($result1, MYSQLI_ASSOC)){
										if($row1s['id_dis']==$id_dis) $selected="selected";
										echo '<option value="'.$row1s['id_dis'].'"'.$selected.'>'.$row1s['name_dis'].'</option>';
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" name="email" size="50" placeholder="Nhập email" value="<?php echo $rows['email'];?>"></td>
					</tr>
					<tr>
						<td>Số điện thoại</td>
						<td><input type="text" name="phone" size="50" placeholder="Nhập số điện thoại" value="<?php echo $rows['phone'];?>"></td>
					</tr>value="<?php echo $rows['email'];?>"
					<tr>
						<td>Giới tính</td>
						<td>

							<input type="radio" name="gender" value="Nam" <?php if('Nam'==$gender) echo 'checked';?>>Nam
							<input type="radio" name="gender" value="Nữ" <?php if('Nữ'==$gender) echo 'checked';?>>Nữ
						</td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="btn-submit" value="Thêm">
						<input type="reset" name="btn-reset" value="Hủy">
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<?php 
								if(isset($msg)) echo $msg;
							?>
						</td>
					</tr>
				</table>
				
			</form>
		</div>
		<div id="footer">
			<p>Copyright &copy; 2016 - Website by Tom Nguyen</p>
		</div>
	</div>
</body>
</html>
