<DOCTYPE html>


<html>
<head>
	<title>Αρχείο Κίνησης </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	
	<?php session_start();
	$configFile = (array)json_decode(file_get_contents('config/config.json'));

	if(isset($_POST['username'])){
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $_POST['password'];
		
		$DatabaseConnectionObject = mysqli_connect($configFile['databaseAddress'],$_SESSION['username'],$_SESSION['password'],$configFile['databaseName']);
		if(!$DatabaseConnectionObject){
			header('Location:index.php?status=0');
		}
		else{
			echo '<script>window.alert("Επιτυχής σύνδεση... :) ");</script>';
		}
	}
	
	
	?>
</head>

<body>
	<ul>
		<li id="menuElement"><a href="panel.php">Αρχικο μενού</a></li>
		<li id="menuElement"><a href="tabs.php">Κινήσεις Πελατών</a></li>
		<li id="menuElement">μενου 03</li>
		<li id="menuElement">μενου 04</li>
		<li id="menuElement"><a href="logout.php">Αρχικο μενού</a></li>
	</ul>
</body>
</html>