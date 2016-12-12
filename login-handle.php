<?php
	
	include('connect.php');


	//get data from Login Form of file 'login.php'
	$Username = $_POST['Username'] ;//name of html input element
	$Password = $_POST['Password'] ;
	
	$query ="SELECT * FROM users where Username = ? AND Pass = ?";
	$stmt = $con->prepare($query);
	//bind data to query
	$stmt->bind_param("ss",$Username, $Password);
	$result = $con->query($query);
	/* Execute statement */
	$stmt->execute();
	
	/* Get user Data */
	$res = $stmt->get_result();
	$user = [];
	while($row = $res->fetch_array(MYSQLI_ASSOC))
	{	  
	  $user = $row;
	}
	$stmt->close();
	//close connection
	$con->close();
	
	//check user data
	if(!$user)
	{
		//invalid username or password
		header('Location: login.php?msg=login_faild');
		return;
	}
	else{
		//login success
	//save to SESSION
	session_start();
	$_SESSION['Username'] = $user['Username'];
	$_SESSION['Roles'] = $user['Roles'];	
	header('Location: customer-list.php');
	}
	
?>