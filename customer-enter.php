<?php
	include ("connect.php");
	if(isset($_POST['btn-submit'])){
		$name_cus = $_POST['name_cus'];
		$adrr = $_POST['adrr'];
		$id_dis = $_POST['id_dis'];
		$email = $_POST['email'];
		$phone  = $_POST['phone'];
		$gender = $_POST['gender'];
		$query = "INSERT INTO `customer`(`name_cus`, `address`, `phone`, `email`, `gender`, `id_dis`) 
					VALUES ('$name_cus', '$adrr', '$phone', '$email', '$gender', '$id_dis')";
		$result = mysqli_query($con, $query) or die("LOI INSERT: ".mysqli_error($con));
		if($result){
			$msg= "Thêm khách hàng thành công!";
		}
	}
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
			<h2>Thêm khách hàng</h2>
		</div>
		<div id="content">
			<form action="customer-enter.php" method="post">
				<table>
					<tr>
						<td width="150px">Tên khách hàng</td>
						<td><input type="text" name="name_cus" size="50" placeholder="Nhập tên khách hàng"></td>
					</tr>
					<tr>
						<td>Địa chỉ</td>
						<td><input type="text" name="adrr" size="50" placeholder="Nhập địa chỉ khách hàng"></td>
					</tr>
					<tr>
						<td>Quận huyện</td>
						<td>
							<select name="id_dis">
								<option value="0">--Chọn quận huyện--</option>
								<?php
									$query1 = "SELECT * FROM district";
									$result1 = mysqli_query($con, $query1) or die("LOI TRUY VAN DISTRICT: ".mysqli_error($con));
									while($row1s=mysqli_fetch_array($result1, MYSQLI_ASSOC)){
										echo '<option value="'.$row1s['id_dis'].'">'.$row1s['name_dis'].'</option>';
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" name="email" size="50" placeholder="Nhập email"></td>
					</tr>
					<tr>
						<td>Số điện thoại</td>
						<td><input type="text" name="phone" size="50" placeholder="Nhập số điện thoại"></td>
					</tr>
					<tr>
						<td>Giới tính</td>
						<td>
							<input type="radio" name="gender" value="Nam" checked="checked">Nam
							<input type="radio" name="gender" value="Nữ">Nữ
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