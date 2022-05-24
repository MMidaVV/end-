<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8"/>
		<title>Главное меню</title>
		<link href="css\registration.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Rubik:400,900&display=swap&subset=cyrillic" rel="stylesheet">
		<script type="text/javascript" src="script\registration.js"></script>
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
		<div class="content">
			<div class="parts"><p class="part1">Регистрация</p></div>
			<form action="php\checking.php" method="post">
				<div class="part2">
					<input class="border" onchange="validateT1(this)" name="login" type="text" placeholder="Логин" id="login"><br>
					<div class="t1-error" id="t1-error"></div>
					<input class="border" onchange="validateT2(this)" name="password" type="password" placeholder="Пароль" id="password"><br>
					<div class="t2-error" id="t2-error"></div>
					<input class="border" onchange="validateT3(this)" name="repeatpassword" type="password" placeholder="Повтор пароля" id="repeatpassword"><br>
					<div class="t3-error" id="t3-error"></div>
					<input class="border" id="button-error" type="submit" placeholder="Отправить" disabled>
				</div>
			</form>
			<div class="part3">
				<p class="link"><a href="authorization.php">Авторизоваться</a></p>
				<p class="link"><a href="index.php">Выход в главное меню</a></p>
			</div>
		</div>
	</body>
</html>