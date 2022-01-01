<DOCTYPE HTML>
<html>
<head>
<title>Magda v2.1</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/changeconfigs.css">
<meta charset="UTF-8"> 
<?php
	session_start();
	$config = parse_ini_file('./config/config.ini');
	if(!isset($_SESSION['username'])){
			header('Location:index.php');
	}
	$connectionObject = mysqli_connect('localhost',$_SESSION['username'],$_SESSION['password'],$config['dbname']);
	$blockedusr = mysqli_query($connectionObject,'select id,firstname,lastname,age,email,points from users where isBlocked=1; ');
	mysqli_set_charset($connectionObject,'utf8');
	if (isset($_GET['status'])){
		if($_GET['status']){
			echo '<script>window.alert("Ο χρήστης ξεμπλοκαρίστηκε με επιτυχία!");</script>';
		}
		else{
			echo '<script>window.alert("Αγνωστό σφάλμα :(");</script>';

		}

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
	echo '<table id="blockedusers">';
	echo '<tr><td>id</td><td>firstname</td><td>lastname</td><td>age</td><td>email</td><td>points</td><td>Unblock</tr>';
	while($row = mysqli_fetch_assoc($blockedusr)){
		echo '<tr><td>'.$row['id'].'</td><td>'.$row['firstname'].'</td><td>'.$row['lastname'].'</td><td>'.$row['age'].'</td><td>'.$row['email'].'</td><td>'.$row['points'].'</td><td><a href="unblockuser.php?id='.$row['id'].'">Unblock</a></td></tr>';
	}
	echo '</table>'

	

?>
<form action="blockuser.php" id="blockuser" method='get'><input type="text" name="username"></input><button type="submit">BlockUser</button></form>
</body>
</html>
</DOCTYPE>