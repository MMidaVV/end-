<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8"/>
		<title>Главное меню</title>
		<link href="css\updateuser.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Rubik:400,900&display=swap&subset=cyrillic" rel="stylesheet">
		<script type="text/javascript" src="script\updateuser.js"></script>
		
	</head>

	<body>
		<div class="communication">
			<div class="icon"><a href="https://vk.com/mmidavv"><img src="img\vk.png"></a></div>
			<div class="icon"><a href="https://steamcommunity.com/profiles/76561198212435000/"><img src="img\Steam.png"></a></div>
			<div class="icon"><a href="https://www.instagram.com/mmidavv/?hl=ru"><img src="img\instagram.png"></a></div>
			<div class="registration right">
				<?php 
				if($_COOKIE['user'] == ''):
				?>
				<a href="registration.php">
					Регистрация/авторизация
				</a>
				<?php else: ?>
				<a href="profile.php"><?=$_COOKIE['user']?>(Нажмите, чтобы зайти в свой профиль)</a>
				<?php endif;?>
			</div>
		</div>
		<div class="head">
				<div class="section">MySite</div>
				<div class="section right"><img src="img\mountains.png"></div>
				<div class="section right"><a href="mlidm.php">МЛиДМ</a></div>
				<div class="section right"><a href="cat.php">Мой кот</a></div>
				<div class="section right"><a href="gallery.php">Мои фото</a></div>
				<div class="section right"><a href="info.php">О себе</a></div>
				<div class="section right"><a href="index.php">Главное меню</a></div>
		</div>
		<?php
			$link= new mysqli('localhost','root','','registration');
			$log=$_GET['id'];
			$result=$link->query("SELECT * FROM users WHERE login='$log'");
			$data=$result->fetch_assoc();
			if($_COOKIE['admin']!=1):
		?>
		<div class="content">
			<div class="userImage">
			    <?php
			    $login=$_COOKIE['user'];
			    $mysql= new mysqli('localhost','root','','registration');
			    $result=$mysql->query("SELECT * FROM `users` WHERE `login`='$login'");
			    if($result != NULL) {
			    	$user=$result->fetch_assoc();
			    	$image=base64_encode($user['images']);
			    }
			    
			    ?>
			    <img src="data:image/jpeg;base64, <?php echo $image?>" alt="">
			</div>		
		    <form action="php/useredite.php?id=<?print($data['login'])?>" method="post" enctype="multipart/form-data" class="admininput">
		        Изменить логин <input onchange="validateT1(this)" type="text" value="<?print($data['login'])?>"  placeholder="Новый логин" class="border" name="login" id="login"><br>
		        <div class="t2-error" id="t1-error"></div>
		        Изменить пароль<input onchange="validateT2(this)" type="password"  placeholder="Новый пароль" class="border" name="password" id="password"><br>
		        <div class="t1-error" id="t2-error"></div>
		        Изменить аватар пользователя<input type="file" class="file" name="img_upload" id="img_upload"><br><br>
		     	<button class="border-submit" type="submit" id="add" name="add">Изменить пользователя</button>
			    </form>
			    <?php else:?>
			        Данный пользователь является админом
			<?php endif;?>		
		</div>
	</body>
</html>