<DOCTYPE HTML>
<html>
<head>

<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/errors.css">
<meta charset="UTF-8"> 
<?php
	$config = parse_ini_file('./config/config.ini');
	session_start();
	if(!isset($_SESSION['username'])){
			header('Location:index.php');
	}
	$connectionObject = mysqli_connect('localhost',$_SESSION['username'],$_SESSION['password'],$config['dbname']);

	$errors = mysqli_query($connectionObject,'select * from errors;');
	echo '<title>'.mysqli_num_rows($errors).' new errors!!!</title>';
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
	echo '<table>';
	echo '<tr><td>code</td><td>desc</td>';
	while($row = mysqli_fetch_assoc($errors)){
		if (str_split((string)$row['code'],1)[0] == '9'){
			echo '<tr id="xx9"><td>'.$row['code'].'</td><td>'.$row['description'].'</td></tr>';
		}
		else{
			echo '<tr id="no_prob"><td>'.$row['code'].'</td><td>'.$row['description'].'</td></tr>';

		}
	}
	echo '</table>'
	

?>
</body>
</html>