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
	if(isset($_GET['status'])){
		if ($_GET['status']==1){
			echo '<script>window.alert("[Λάθος]Κακό αίτημα (503 δεν αναφερεται η σημαια op)");</script>';
		}
		else if ($_GET['status']==2){
			echo '<script>window.alert("[Λάθος]Μη έγκυρη τιμή εισόδου");</script>';
		}
		else{
			echo '<script>window.alert("Η λειτουργία εκτελέστηκε με επιτυχία!");</script>';

		}
		unset($_GET['status']);
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
	echo '<div id="blocked_ips"><table>';
	echo '<tr><td>Ip</td><td>Status</td><td>Unblock</td><td>Delete</td></tr>';
	$ips  = (array)json_decode(file_get_contents('blocked_ips.json'));
	$rows=0;
	foreach ($ips as $ip => $status) {
		$rows++;
		echo '<tr><td>'.str_replace("IP_", "", $ip).'</td><td>'.$status.'</td><td><a href="ip_operation.php?ip='.$ip.'&op=UB">Unblock<a/></td><td><a href="ip_operation.php?ip='.$ip.'&op=DEL">Delete<a/></td></tr>';
	}
	echo '</table>';
	if(!$rows){
		echo '<div id="no_ips">No Ips is blocked!! :( </div>';
	}
?>
<form method="get" action="ip_operation.php"><input type="text" name="ip"></input><input type="hidden" name="op" value="ADDIP"></input><button type="submit">Μπλοκάρισμα Ip</button></form></div>
</body>
</html>
</DOCTYPE>