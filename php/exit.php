<?php  
	$back = $_SERVER['HTTP_REFERER'];

	setcookie('user', $user['login'], time() - 3600, "/");
	
	echo "
		<html>
		  <head>
		   <meta http-equiv='Refresh' content='0; URL=".$_SERVER['HTTP_REFERER']."'>
		  </head>
		</html>";


?>