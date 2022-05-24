<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8"/>
		<title>Главное меню</title>
		<link href="css\adminpage.css" rel="stylesheet" type="text/css">
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
				<?php if($_COOKIE['admin']==1):?>
				    <div class="adminpanel">
				    <?php
				        $link= new mysqli('localhost','root','','registration');
				        $result=$link->query("SELECT * FROM users");
				        for($data=[];$row=$result->fetch_assoc();){
				           if($row['login']!="admin"){
				               $data[]=$row;
				           }
				        }
				    ?>

				    <table>
					    <div class="tablehead">
					     Пользователи
					    </div>
					    <div class="instruction">
						    <div class="instructionLeft">Логин</div>
						    <div class="instructionRight">Удалить пользователя</div>
						    <div class="instructionRight">Изменить пользователя</div>
					    </div>
					    <?php foreach ($data as $user){?>
					    	<div class="tableblock">
					            <div class="login"><?=$user['login']?></div>
					            <div class="choice"><a href="?del=<?=$user['login']?>">Удалить</a></div>
					            <div class="choice"><a href="updateadmin.php?id=<?=$user['login']?>">Изменить</a></div>
					        </div>
					    <?php }?>
				     </table> 
				     <div class="deleteform">
				     <?php
				        if(isset($_GET['del'])){
				            print("Вы точно хотите удалить пользователя ".$_GET['del']." ?");
				        ?>

				        <form action="php/delete.php?del=<?=$_GET['del']?>" method="post">
				            <button type="submit" name="confirm_del" value="1" class="deletebut">ДА</button>
				            <button type="submit" name="confirm_del" value="0" class="deletebut">НЕТ</button>
				        </form>
				    <?php
				        }
				        else if(!isset($_GET['delid'])){
				            print("Вы ещё ничего не сделали");
				        }
				        else if($_GET['delid']==1){
				            print("Вы удалили пользователя");
				        }
				        else if($_GET['delid']==0){
				            print("Вы передумали");
				        }

				        ?>
				        </div> 
				    <?php else:?>
				        Данный пользователь не является админом
				    <?php endif;?>
		</div>
	</body>
</html>