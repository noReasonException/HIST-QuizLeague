<DOCTYPE HTML>
<html>
<head>
<title>Magda v2.1</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/changeconfigs.css">
<meta charset="UTF-8"> 
<?php

	session_start();
	if(!isset($_SESSION['username'])){
			header('Location:index.php');
	}
?>
</head>
<body>
	<ul id="leftmenu">
		<li id="leftMenuElement"><a href="panel.php">Στο Αρχικό μενού</a></li> 
		<li id="leftMenuElement"><a href="ChangeConfigs.php">Αλλαγή ρυθμίσεων</a></li> 
		<li id="leftMenuElement"><a href="ErrorWatch.php">Παρακολούθηση Λαθών</a></li>
		<li id="leftMenuElement"><a href="NotificationsWatch.php">Παρακολούθηση συμβάντων</a></li>
		<li id="leftMenuElement"><a href="BlockedUsers.php">Μπλοκαρισμένοι χρήστες</a></li>
		<li id="leftMenuElement"><a href="BlockedIps.php">Μπλοκαρισμένες IP </a></li>
		<li id="leftMenuElement"><a href="ErrorManual.php">Manual λαθών </a></li>
		<li id="leftMenuElement"><a href="Query.php">Εκτέλεση ερωτήματος</a></li>
		<li id="leftMenuElement"><a href="About.php">Περί..</a></li>
		<li id="leftMenuElement"><a href="Logout.php">Αποσύνδεση</a></li>
	
	</ul>
<?php
	echo '<table id="ErrorManual">';
	echo '<tr><td>Κωδικός Λάθους</td><td>Περιγραφη συμβάντος</td></tr>';
	foreach (parse_ini_file('error_messages.ini') as $key => $value) {
		echo '<tr><td>'.$key.'</td><td>'.$value.'</td></tr>';
	}
	echo '</table>';
?>

</body>
</html>
</DOCTYPE>