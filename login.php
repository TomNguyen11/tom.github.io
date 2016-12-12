<?php
	include('header.php');
?>
<h1 class="page-header">
    Đăng nhập
</h1>
 
 <?php
  if(isset($_GET['msg'])){
    if($_GET['msg'] == 'login_faild'){
      ?>
      <div class="alert alert-success">
        Invalid UserName or Password
      </div>
      <?php
    }
    if($_GET['msg'] == 'auth'){
      ?>
      <div class="alert alert-success">
        Please Login to continous!
      </div>
      <?php
    }
    if($_GET['msg'] == 'permission'){
      ?>
      <div class="alert alert-success">
        You are not allowed access to this page!
        <br>
        Please contact admin for detail!
      </div>
      <?php
    }   
  }
?>

  <form class="form-horizontal"
    action="login-handle.php"
    method="POST">
  <!--Column name-->
  <div class="form-group">
      <label for="Username" class="col-sm-2 control-label">Username</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="Username" name="Username" placeholder="Username">
      </div>
    </div>

  <div class="form-group">
      <label for="Password" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
          <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
      </div>
    </div>
  

  <div class="form-group">
      
      <div class="col-sm-10">
          <button type="submit" class="btn btn-default">Login me!</button>
      </div>
    </div>  

  
<?php

?>