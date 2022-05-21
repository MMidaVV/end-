<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . ".../db.class.php";
	$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
	$repeatpassword = filter_var(trim($_POST['repeatpassword']),FILTER_SANITIZE_STRING);
	$back = $_SERVER['HTTP_REFERER'];

	if(strcmp($password, $repeatpassword) !== 0) {
		echo "
		<html>
		  <head>
		   <meta http-equiv='Refresh' content='0; URL=".$_SERVER['HTTP_REFERER']."'>
		   <script>alert(\"Пароли не свопадают.\");</script>
		  </head>
		</html>";
		echo "<script>alert(\"Пароли не свопадают.\");</script>";

		exit();
	}

	$path='upload/avatars/'.time().$_FILES['img_upload']['name'];
      move_uploaded_file($_FILES['img_upload']['tmp_name'],$path);

	$password = md5($password."r0r0r0r0");

	$mysql = new mysqli('localhost', 'root', 'root', 'registration');
	$mysql->query("INSERT INTO `users` (`login`, `password`, `image`) VALUES('$login','$password', '$path')"); 

	$mysql->close();

	header('Location: /');

?>