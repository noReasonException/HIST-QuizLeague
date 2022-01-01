<DOCTYPE HTML>
<html>
<head>
<title>Magda v2.1</title>
<meta charset="UTF-8"> 
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/changeconfigs.css">
<?php
	session_start();
	$config = parse_ini_file('./config/config.ini');
	if(!isset($_SESSION['username'])){
			header('Location:index.php');
	}	
	$connectionObject = mysqli_connect('localhost',$_SESSION['username'],$_SESSION['password'],$config['dbname']);
	$result = mysqli_query($connectionObject,'select * from sch.events;');
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
	echo '<table id="NotificationsWatch">';
	if(mysqli_num_rows($result)){
		echo '<tr><td>Κωδικός</td><td>Όνομα Αρχείου</td><td>Περιγραφη</td><td>Ημ/νια</td></tr>';
		while($row = mysqli_fetch_assoc($result)){
			echo '<tr><td>'.$row['id'].'</td><td>'.$row['filename'].'</td><td>'.$row['description'].'</td><td>'.$row['dateofevent'].'</td></tr>';
		}
		echo '</table>';

	}

?>
</body>
</html>
</DOCTYPE>