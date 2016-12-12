<?php   
  session_start();
  include('mysql/connect.php');

  //remove session
  $_SESSION['UserName'] = '';
  $_SESSION['Roles'] = '';  
  header('Location: login.php');
  
?>