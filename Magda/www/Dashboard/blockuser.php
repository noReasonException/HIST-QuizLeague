<?php
session_start();
$config = parse_ini_file('./config/config.ini');
$connectionObject = mysqli_connect('localhost',$_SESSION['username'],$_SESSION['password'],$config['dbname']);
$result = mysqli_query($connectionObject,'update users set isBlocked=1 where username="'.$_GET['username'].'";');
if(mysqli_error($connectionObject)){
	header('Location:BlockedUsers.php'); //fix
}
header('Location:BlockedUsers.php');