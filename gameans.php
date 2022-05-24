<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/db.class.php";
$login=$_COOKIE['user'];
$count=$_GET['id'];
$mysql = new mysqli('localhost', 'root', '', 'registration');
$res=$mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
$user = $res->fetch_assoc();
$mysql->query("UPDATE `users` SET `score` = '$count' WHERE `users`.`login` = '$login'");
if($count<$user['highscore']){
    $mysql->query("UPDATE `users` SET `highscore` = '$count' WHERE `users`.`login` = '$login'");
}
header("Location: /game.php");
?>