<DOCTYPE html>


<html>
<head>
	<title>Αρχείο Κίνησης </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	
	<?php session_start();
	$configFile = (array)json_decode(file_get_contents('config/config.json'));

	if(!isset($_SESSION['username'])){
		header('Location:index.php');
	}
	$DatabaseConnectionObject = mysqli_connect($configFile['databaseAddress'],$_SESSION['username'],$_SESSION['password'],$configFile['databaseName']);
	if(!$DatabaseConnectionObject){
		echo '<script>window.alert("Σφάλμα τύπου 001 (tabs.php γραμμη 18"));</script>';

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

	<?php
		
		$AvalableTabs = mysqli_query($DatabaseConnectionObject,'select id,name,profession,town from tabs;');
		while($tabs_row = mysqli_fetch_assoc($AvalableTabs)){
			echo '<a href="show_tab.php?tabid='.$tabs_row['id'].'"><div id="Tab"><div id="Element">'.$tabs_row['id'].'</div><div id="Element">'.$tabs_row['name'].'</div><div id="Element">'.$tabs_row['profession'].'</div><div id="Element">'.$tabs_row['town'].'</div></div></a>';
		}

		


	?>
</body>
</html>