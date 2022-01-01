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
	else{
		$DatabaseConnectionObject = mysqli_connect($configFile['databaseAddress'],$_SESSION['username'],$_SESSION['password'],$configFile['databaseName']);
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

		$LogsQuery = mysqli_query($DatabaseConnectionObject,'select * from tabs where id='.$_GET['tabid']);
		$Logs = mysqli_fetch_assoc($LogsQuery);
		echo '<div id="TabShowOf"><div id="TabShowOf_Element">Όνομα: '.$Logs['name'].'</div><br><div id="TabShowOf_Element">Επαγγελμα: '.$Logs['profession'].'</div><br><div id="TabShowOf_Element">Διεύθυνση: '.$Logs['address'].'</div><br><div id="TabShowOf_Element">Α.Φ.Μ: '.$Logs['AFM'].'</div><br><div id="TabShowOf_Element">Πόλη: '.$Logs['town'].'</div><br><div id="TabShowOf_Element">Δ.Ο.Υ: '.$Logs['DOY'].'</div><br></div>';
		echo '<div id="Balance">Υπόλοιπο Πελάτη:'.$Logs['balance'].'</div>';
		echo '<a href="AddInvoice.php?tabid='.$_GET['tabid'].'" id="Choice">Προσθήκη τιμολογίου</a>';
		echo '<a href="Statistics.php?tabid='.$_GET['tabid'].'" id="Choice">Στατιστικά Πελάτη</a>';
		echo '<a href="Notes.php?tabid='.$_GET['tabid'].'" id="Choice">Λοιπές Σημειώσεις</a>';
		echo '<a href="Configs.php?tabid='.$_GET['tabid'].'" id="Choice">Ρυθμίσεις</a>';


?>	
<?php
		$get_invoices = mysqli_query($DatabaseConnectionObject,'select invoice_id,time_event,cost,isPayed from invoice where client_id='.$_GET['tabid']);
		$datetime = array();
		echo '<ul id="InvoiceOverview">';
		echo '<li><div id="HeadElement">Ημ/νία</div><div id="HeadElement">Ώρα</div><div id="HeadElement">Κόστος</div><div id="HeadElement">Κατάσταση</div></li>';

		while($row = mysqli_fetch_assoc($get_invoices)){
			$datetime = explode(" ",$row['time_event']);
			$invoice_id = $row['invoice_id'];
			if((int)$row['isPayed']){
				echo '<a href="invoicedetails.php?invoiceid='.$invoice_id.'"><li><div id="Element">'.$datetime[0].'</div><div id="Element">'.$datetime[1].'</div><div id="Element">'.$row['cost'].'</div><div id="Element"><img src="img/payed.png"></div></li></a>';

			}
			else{
				echo '<a href="invoicedetails.php?invoiceid='.$invoice_id.'"><li><div id="Element">'.$datetime[0].'</div><div id="Element">'.$datetime[1].'</div><div id="Element">'.$row['cost'].'</div><div id="Element"><img src="img/unpayed.png"></div></li></a>';

			}
		}
		echo '</ul>';
	?>
</body>
</html>
</DOCTYPE>