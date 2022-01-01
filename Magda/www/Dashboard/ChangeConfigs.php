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
	$configs_array =parse_ini_file('../../config/config.ini');
	if (isset($_GET['status'])){
		if ($_GET['status']){
			echo '<script> window.alert("Οι Ρυθμίσεις αποθηκεύτηκαν με επιτυχία!");</script>';
		}
		else{
			echo '<script> window.alert("Αγνωστό σφάλμα κατα την αποθήκευση :(");</script>';

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
	<section id="settings">
		<table>
			<div id="msg">Ρυθμίσεις σύνδεσης με πρωταρχική βάση δεδομένων</div>
				<tr><td>Είδος ρύθμισης</td><td>Αρχική ρύθμιση</td><td>Νέα ρύθμιση</td><td>Αποθήκευση</td></tr>
				<?php 
					echo '<tr><td>Διεύθυνση IP</td><td>'.$configs_array['ip_address'].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="ip_address" name="configname"></input><input type="hidden" value="'.$configs_array['ip_address'].'" name="old_value" ></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας IP </button></form></td></tr>';
					echo '<tr><td>Ονομα χρήστη</td><td>'.$configs_array['username'].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="username" name="configname"></input><input type="hidden" name="old_value" value="'.$configs_array['username'].'"></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας IP </button></form></td></tr>';
					echo '<tr><td>Κωδικός Πρόσβασης</td><td>'.$configs_array['password'].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="password" name="configname"></input><input type="hidden" name="old_value" value="'.$configs_array['password'].'"></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας IP </button></form></td></tr>';
					echo '<tr><td>Ονομά βάσης </td><td>'.$configs_array['dbname'].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="dbname" name="configname"></input><input type="hidden" name="old_value" value="'.$configs_array['dbname'].'"></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας IP </button></form></td></tr>';

					?>	
		</table>
		<table>
			<div id="msg">Ρυθμίσεις σύνδεσης με βάσης δεδομένων υποβολής λαθών</div>
				<tr><td>Είδος ρύθμισης</td><td>Αρχική ρύθμιση</td><td>Νέα ρύθμιση</td><td>Αποθήκευση</td></tr>
				<?php
					echo '<tr><td>Διεύθυνση IP</td><td>'.$configs_array['err_ip_address'].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="err_ip_address" name="configname"></input><input type="hidden" value="'.$configs_array['err_ip_address'].'" name="old_value" ></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας IP </button></form></td></tr>';
					echo '<tr><td>Ονομα χρήστη</td><td>'.$configs_array['err_username'].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="err_username" name="configname"></input><input type="hidden" name="old_value" value="'.$configs_array['err_username'].'"></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας IP </button></form></td></tr>';
					echo '<tr><td>Κωδικός Πρόσβασης</td><td>'.$configs_array['err_password'].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="err_password" name="configname"></input><input type="hidden" name="old_value" value="'.$configs_array['err_password'].'"></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας IP </button></form></td></tr>';
					echo '<tr><td>Ονομά βάσης </td><td>'.$configs_array['err_dbname'].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="err_dbname" name="configname"></input><input type="hidden" name="old_value" value="'.$configs_array['err_dbname'].'"></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας IP </button></form></td></tr>';

				?>
		</table>
		<table >
			<div id="msg">Ρυθμίσεις ασφαλείας</div>
				<tr><td>Είδος ρύθμισης</td><td>Αρχική ρύθμιση</td><td>Νέα ρύθμιση</td><td>Αποθήκευση</td></tr>
				<?php
					echo '<tr><td>Να επιτρέπονται μπλοκαρισμένοι χρήστες?</td><td>'.$configs_array['AllowBlockedUsers'].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="AllowBlockedUsers" name="configname"></input><input type="hidden" value="'.$configs_array['AllowBlockedUsers'].'" name="old_value" ></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας τιμής </button></form></td></tr>';
					echo '<tr><td>Να επιτρέπονται Μπλοκαρισμένες Ip?</td><td>'.$configs_array['AllowBlockedIps'].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="AllowBlockedIps" name="configname"></input><input type="hidden" name="old_value" value="'.$configs_array['AllowBlockedIps'].'"></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας τιμής </button></form></td></tr>';

				?>
		</table>
		<table >
			<div id="msg">Ρυθμίσεις αναφοράς σφαλμάτων</div>
				<tr><td>Είδος ρύθμισης</td><td>Αρχική ρύθμιση</td><td>Νέα ρύθμιση</td><td>Αποθήκευση</td></tr>
				<?php
					echo '<tr><td>Λειτουργία αποσφαλμάτωσης</td><td>'.$configs_array['DebugMode'].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="ip_address" name="configname"></input><input type="hidden" value="'.$configs_array['DebugMode'].'" name="old_value" ></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας τιμής </button></form></td></tr>';
					echo '<tr><td>Υποβολή λαθών τύπου 0.x.x </td><td>'.$configs_array['RecordErrorsOfType'][0].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="username" name="configname"></input><input type="hidden" name="old_value" value="'.$configs_array['RecordErrorsOfType'][0].'"></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας τιμής </button></form></td></tr>';
					echo '<tr><td>Υποβολή λαθών τύπου 1.x.x </td><td>'.$configs_array['RecordErrorsOfType'][1].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="username" name="configname"></input><input type="hidden" name="old_value" value="'.$configs_array['RecordErrorsOfType'][1].'"></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας τιμής </button></form></td></tr>';
					echo '<tr><td>Υποβολή λαθών τύπου 2.x.x </td><td>'.$configs_array['RecordErrorsOfType'][2].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="username" name="configname"></input><input type="hidden" name="old_value" value="'.$configs_array['RecordErrorsOfType'][2].'"></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας τιμής </button></form></td></tr>';
					echo '<tr><td>Υποβολή λαθών τύπου 3.x.x </td><td>'.$configs_array['RecordErrorsOfType'][3].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="username" name="configname"></input><input type="hidden" name="old_value" value="'.$configs_array['RecordErrorsOfType'][3].'"></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας τιμής </button></form></td></tr>';
					echo '<tr><td>Υποβολή λαθών τύπου 4.x.x </td><td>'.$configs_array['RecordErrorsOfType'][4].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="username" name="configname"></input><input type="hidden" name="old_value" value="'.$configs_array['RecordErrorsOfType'][4].'"></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας τιμής </button></form></td></tr>';
					echo '<tr><td>Υποβολή λαθών τύπου 5.x.x </td><td>'.$configs_array['RecordErrorsOfType'][5].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="username" name="configname"></input><input type="hidden" name="old_value" value="'.$configs_array['RecordErrorsOfType'][5].'"></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας τιμής </button></form></td></tr>';
					echo '<tr><td>Υποβολή λαθών τύπου 6.x.x </td><td>'.$configs_array['RecordErrorsOfType'][6].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="username" name="configname"></input><input type="hidden" name="old_value" value="'.$configs_array['RecordErrorsOfType'][6].'"></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας τιμής </button></form></td></tr>';
					echo '<tr><td>Υποβολή λαθών τύπου 7.x.x </td><td>'.$configs_array['RecordErrorsOfType'][7].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="username" name="configname"></input><input type="hidden" name="old_value" value="'.$configs_array['RecordErrorsOfType'][7].'"></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας τιμής </button></form></td></tr>';
					echo '<tr><td>Υποβολή λαθών τύπου 8.x.x </td><td>'.$configs_array['RecordErrorsOfType'][8].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="username" name="configname"></input><input type="hidden" name="old_value" value="'.$configs_array['RecordErrorsOfType'][8].'"></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας τιμής </button></form></td></tr>';
					echo '<tr><td>Υποβολή λαθών τύπου 9.x.x </td><td>'.$configs_array['RecordErrorsOfType'][9].'</td><td><form method="get" action="changeconfig.php"><input type="hidden" value="username" name="configname"></input><input type="hidden" name="old_value" value="'.$configs_array['RecordErrorsOfType'][9].'"></input><input type="text" name="new_value"></input></td><td><button type="submit">Αποθήκευση νέας τιμής </button></form></td></tr>';
				?>
		</table>
	
	<form action="defaults.php" id="defaults"><button type="submit">Επαναφορά στις εργοστασιακές ρυθμίσεις</button></form>
</section>
</body>
</html>