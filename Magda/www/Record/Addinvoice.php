<DOCTYPE html>
<html>

<head>
	<title>Αρχείο Κίνησης </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('Location:index.php?status=2');
	}
	else{
		$configFile = (array)json_decode(file_get_contents('config/config.json'));
		$DatabaseConnectionObject = mysqli_connect($configFile['databaseAddress'],$_SESSION['username'],$_SESSION['password'],$configFile['databaseName']);
		
	}
	date_default_timezone_set("Europe/Athens");
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
	<form id="AddInvoiceForm">
		<div id="AddInvoiceForm_LABEL">{Προσθήκη τιμολογίου}</div>
			<div id="AddInvoiceForm_STANDARD_INFO">
				<div id="STANDARD_INFO_ELEMENT">Ημ/νια : <?php echo date("d/m/y");?> </div>
				<div id="STANDARD_INFO_ELEMENT">Ώρα Έναρξης Αποστολής ή Παράδοσης : <?php echo date("g:i");?> </div>
				<div id="STANDARD_INFO_ELEMENT">Κωδικός Τιμολογιού : *Ακόμα Μή καθορισμένος* </div>
				<?php 
					$tab_info = mysqli_query($DatabaseConnectionObject,'select name,profession,address,AFM,town,DOY from tabs where id='.$_GET['tabid'].';');
					$get_tab_info = mysqli_fetch_assoc($tab_info);
					if(!mysqli_num_rows($tab_info)){
						header('Location:index.php');
					}
					else{
						echo '<div id="STANDARD_INFO_ELEMENT">Επωνυμία: '.$get_tab_info['name'].'</div><br>';
						echo '<div id="STANDARD_INFO_ELEMENT">Επαγγελμα: '.$get_tab_info['profession'].'</div><br>';
						echo '<div id="STANDARD_INFO_ELEMENT">Διεύθυνση: '.$get_tab_info['address'].'</div><br>';
						echo '<div id="STANDARD_INFO_ELEMENT">Α.Φ.Μ : '.$get_tab_info['AFM'].'</div><br>';
						echo '<div id="STANDARD_INFO_ELEMENT">Πόλη : '.$get_tab_info['town'].'</div><br>';
						echo '<div id="STANDARD_INFO_ELEMENT">Α.Φ.Μ : '.$get_tab_info['DOY'].'</div><br>';


					}
				?>
			
			</div>
	</form>
</body>
</html>
</DOCTYPE>