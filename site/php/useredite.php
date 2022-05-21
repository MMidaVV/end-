<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . "../db.class.php";
	session_start();
	 $login=filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
	 $password=filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
	 $log=$_GET['id'];
	 
	 $password=md5($password."r0r0r0r0");

	 $mysql= new mysqli('localhost','root','root','registration'); 
	 $mysql->query("UPDATE `users` SET `password` = '$password' WHERE `users`.`login` = '$log'");
	 if(!empty($_FILES['img_upload']['tmp_name'])){
	   	$path = '../upload/avatars/' . time() . $_FILES['img_upload']['name'];
	   	$path2 = 'upload/avatars/' . time() . $_FILES['img_upload']['name'];
	   	setcookie('image',$user['image'],time()-3600,"/");
	   	setcookie('image',$path2,time()+3600,"/");
		  move_uploaded_file($_FILES['img_upload']['tmp_name'], $path);
		  DB::query("UPDATE `users` SET `image` = '$path' WHERE `users`.`login` = '$log'");
	 }
	 $mysql->query("UPDATE `users` SET `login` = '$login' WHERE `users`.`login` = '$log'");
	 
	 $mysql->close();


	 setcookie('user',$user['login'],time()-3600,"/");
	 setcookie('admin',$user['admin'],time()-3600,"/");

	 $mysql= new mysqli('localhost','root','root','registration'); 
	 $result=$mysql->query("SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password' ");
	 $user=$result->fetch_assoc();

	 setcookie('user',$user['login'],time()+3600,"/");
	 setcookie('admin',$user['admin'],time()+3600,"/");
	 
	 header('Location:/profile.php');
?>