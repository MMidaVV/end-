<?php
	$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
	$back = $_SERVER['HTTP_REFERER'];

	$password = md5($password."r0r0r0r0");

	$mysql = new mysqli('localhost', 'root', '', 'registration');

	$result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
	$user = $result->fetch_assoc();
	
	if(count($user) == 0) {
		echo "
		<html>
		  <head>
		   <meta http-equiv='Refresh' content='0; URL=".$_SERVER['HTTP_REFERER']."'>
		  </head>
		</html>";
		echo "<script>alert(\"Такой пользователь не найден.\");</script>";
		exit();
	}

	setcookie('user', $user['login'], time() + 3600, "/");
	setcookie('admin', $user['admin'], time() + 3600, "/");

	$mysql->close();

	header('Location: /');

?>