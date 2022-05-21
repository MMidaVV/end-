<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8"/>
		<title>Главное меню</title>
		<link href="https://fonts.googleapis.com/css?family=Rubik:400,900&display=swap&subset=cyrillic" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<link href="css\gallery.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="script\gallery.js"></script>
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
			<div id="leftImage"></div>

			<div class="arrow" onclick="leftCangeImage()" onmouseover="guidance(this)" onmouseout="noguidance(this)" id="1" ><img src="Img\left.png"></div>
			
			<div id="mainImage"></div>
			
			<div class="arrow" onclick="rightCangeImage() "onmouseover="guidance(this)" onmouseout="noguidance(this)" id="1" ><img src="Img\right.png"></div>

			<div id="rightImage"></div>
		</div>
		<script>
            function guidance(element){
                element.setAttribute("class", "guidance");
            }
            function noguidance(element){
                element.setAttribute("class", "noguidance");
            } 
        </script>
	</body>
</html>