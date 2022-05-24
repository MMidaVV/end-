<?php
  $login=filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
  $password=filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
  $log=$_GET['id'];

  $password=md5($password."r0r0r0r0");

  $mysql= new mysqli('localhost','root','','registration');

  $mysql->query("UPDATE users SET password = '$password' WHERE users.login = '$log'");
  if(!empty($_FILES['img_upload']['tmp_name'])){
   $image=addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));
   $mysql->query("UPDATE users SET image = '$image' WHERE users.login = '$log'");
  }
  $mysql->query("UPDATE users SET login = '$login' WHERE users.login = '$log'");

  $mysql->close();
  header('Location:/adminpage.php');
?>