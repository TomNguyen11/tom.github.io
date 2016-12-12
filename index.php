<?php
	include ("connect.php");
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
			<h2>Danh sách khách hàng</h2>
			<a href="logout.php">Logout</a>
		</div>
		<div id="content">
			
				<?php
					$query="SELECT customer.id_cus AS id, customer.name_cus AS name, customer.address AS addr, customer.email AS email, customer.phone AS phone, customer.gender AS gender, district.name_dis AS name_dis
							FROM customer, district
							WHERE customer.id_dis=district.id_dis";
					$result = mysqli_query($con, $query) or die("LOI TRUY VAN: ".mysqli_error($con));
					$num = mysqli_num_rows($result);
					$count=0;
					if($num>0){

						echo "<table border='1' cellspacing='0' cellpadding='5'>
								<tr>
									<th>STT</th>
									<th>Tên khách hàng</th>
									<th>Địa chỉ</th>
									<th>Quận huyện</th>
									<th>Email</th>
									<th>Số điện thoại</th>
									<th>Giới tính</th>
									<th colspan='2'>Thao tác</th>
								</tr>";
						while($rows=mysqli_fetch_array($result, MYSQLI_ASSOC)){
							$count++;

							echo '<tr>
								<td>'.$count.'</td>
								<td>'.$rows['name'].'</td>
								<td>'.$rows['addr'].'</td>
								<td>'.$rows['name_dis'].'</td>
								<td>'.$rows['email'].'</td>
								<td>'.$rows['phone'].'</td>
								<td>'.$rows['gender'].'</td>
								<td>
									<a href="customer-edit.php?id_cus='.$rows['id'].'">Sửa</a>
								</td>
								<td>
									<a href="customer-del.php?id_cus='.$rows['id'].'">Xóa</a>
								</td>
							</tr>';
						}
					}
					else{
						echo "Không có dữ liệu.";
					}
				?>
			</table>
			
		</div>
		<div id="footer">
			<p>Copyright &copy; 2016 - Website by Tom Nguyen</p>
		</div>
	</div>
</body>
</html>
