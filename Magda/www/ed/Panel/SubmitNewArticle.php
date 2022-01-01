<?php 
	session_start();
	$author = $_POST['Author'];
	$title = $_POST['title'];
	$config = parse_ini_file('../config/new_article.ini');
	$connectionObject = new mysqli($config['ip_address'],$config['username'],$config['password']);
	if($connectionObject->connect_error){
		$_SESSION['success_NewArticle'] = 'ERR';
		echo 'err';
		header('Location:../Panel.php');
	}
	else{
		$query="insert into news_section.articles (title,mainbody,author,mainimage,authorimage,views) values ('".$title."','".$_POST['mainbody']."','".$author."','NONE','NONE',0);";
		mysqli_query($connectionObject,$query);
		$_SESSION['success_NewArticle'] = 'OK';
		echo 'ok';
		header('Location:../Panel.php');
	}
	
?>