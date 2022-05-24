<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8"/>
		<title>Главное меню</title>
		<link href="css\info.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Rubik:400,900&display=swap&subset=cyrillic" rel="stylesheet">
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
			<div class="info">
				<p class="info1">Меня зовут Вадим, и я студент УлГТУ</p>
				<p class="info2" align="justify">Я родился в Ульяновске 4 октября 2003 года и живо здесь по сей день. За свю жизнь я успел отучиться 11 лет в лицее №20, сдать ЕГЭ на 214 баллов, получить первый взрослый разряд разряд по хоккею с мячом, найти несколько хороших друзей и поступить в университет. Во время внеучебной деятельности я люблю общаться с друзьями в дискорде, ходить в тренажёрный зал и расширять свой кругозор. Я бы мог написть здесь что-нибудь ещё, но у меня закончилась фантазия.</p>
			</div>
		</div>
	</body>
</html>