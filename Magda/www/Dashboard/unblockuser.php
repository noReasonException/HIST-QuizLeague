<?php
	session_start();
	$config = parse_ini_file('./config/config.ini');
	$connectionObject = mysqli_connect('localhost',$_SESSION['username'],$_SESSION['password'],$config['dbname']);
	$unblock=mysqli_query($connectionObject,'update users set isBlocked=0 where id='.$_GET['id']);
	if(mysqli_error($connectionObject)){
		header('Location:BlockedUsers.php?status=0');
	}
	else{
		header('Location:BlockedUsers.php?status=1');
	}
	
?>	