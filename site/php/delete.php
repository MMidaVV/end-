<?php
$log=$_GET['del'];
$link= new mysqli('localhost','root','root','registration');
        if($_POST['confirm_del']==1){
               $query="DELETE FROM users WHERE login='$log'";
               mysqli_query($link,$query);
               header('Location:/adminpage.php?delid=1');
        }
        else{
                header('Location:/adminpage.php?delid=0');
        }
?>