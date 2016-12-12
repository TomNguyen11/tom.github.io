<?php
	session_start();
	include('header.php');
	//check Authtication	
	if(!$_SESSION['Username']){
		header('Location: login.php?msg=auth');
		return;
	}
	//check Permission - authorization
	//only admin
	if($_SESSION['Roles'] != 'Administrator'){
		header('Location: login.php?msg=permission');
		return;
	}
	include('mysql/connect.php');
	$query ="SELECT * FROM Product";
	//execute query
	$result = $conn->query($query);
	//store product data
	$data = [];
	//fetch row to data
	if ($result->num_rows > 0){
		while ($row = $result ->fetch_assoc()) {
			array_push($data, $row);
		}
	}
	//close connection
	$conn->close();
?>
			<h1 class="page-header">
				Danh sách Products
			</h1>
			<?php
				if (isset($_GET['msg'])) {
					if($_GET['msg'] == 'ins_success'){
						?>
						<div class="alert alert-success">
							Add Product Successful
							</div>
						<?php
					}
					if ($_GET['msg'] == 'upd_success') {
						?>
						<div class="alret alret-danger">
							Update Product Successful
						</div>
						<?php
						
					}
					if ($_GET['msg']=='del_success') {
						?>
							<div class="alret alret-warning" >
								Delete Product Successful
							</div>
						<?php
					}
				}
			?>
			<table class="table table-bordered table-striped">
				<tr>
					<td>ID</td>
					<td>Name</td>
					<td>Category</td>
					<td>Price</td>
					<td>Description</td>
					<td>
						Chức năng
						<!-- sublime text bootstrap 3 snippets -->
					</td>
				</tr>
				<?php
				if (count($data) >0){
					foreach ($data as $key => $val) {
						?>
						<tr>
							<td><?=$val['id']?></td>
							<td><?=$val['name']?></td>
							<td><?=$val['cat_id']?></td>
							<td><?=$val['price']?></td>
							<td><?=$val['description']?></td>
							<td>
								<div class="dropdown">
								<button class="btn btn-default dropdown-toggle"
									type="button" id="dropdownMenu1"
									data-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="true">
									Chức năng
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu"
									aria-labelledby="dropdownMenu1">
									<li><a href="product-edit.php?id=<?=$val['id']?>">Chỉnh sửa</a></li>
									<li><a href="product-delete.php?id=<?=$val['id']?>">Xóa</a></li>
								</ul>
								</div>
							</td>
						</tr>
						<?php
					}
				}else{
						?>
						<tr>
							<td colspan="6">
								Khong co du lieu
							</td>
						</tr>	
					<?php
				}
				?>
				
				
			</table>
<?php
	include('footer.php')
?>
