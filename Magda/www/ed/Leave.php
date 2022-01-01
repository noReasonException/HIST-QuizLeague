<?php 
	session_start();
	$config = parse_ini_file('./config/CristinaBot.ini');
	$connectionObject = new mysqli ($config['ip_address'],$config['username'],$config['password']);
	mysqli_query($connectionObject,'update logs.online_users set Status=0 where Username="'.$_SESSION['username'].'";');
	mysqli_close($connectionObject);
	session_destroy();

	header('Location:index.php');
?>