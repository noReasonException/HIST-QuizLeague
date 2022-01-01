
<DOCTYPE HTML>
<html>
<head>
<title>Magda v2.1</title>
<meta charset="UTF-8"> 
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./css/changeconfigs.css">


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
session_start();
if (isset($_POST['query']) and !empty($_POST['query'] and $_POST['query']!='Insert Query Here!')){
		echo '<textarea id="QueryReturnText">';
		$connectionObject = mysqli_connect('localhost',$_SESSION['username'],$_SESSION['password'],'sch');	
	if(!$connectionObject){
		echo 'Database Connection lost ... :( ';
	}
	else{
		echo 'Connected With MySQLi Database &#10&#10';

		$results = mysqli_query($connectionObject,$_POST['query']);
		if (mysqli_error($connectionObject)){
			echo mysqli_error($connectionObject);
		}
		else if(!mysqli_num_rows($results)){
			echo 'Query Executed Successfully&#10----------------END';
		}
		else{
			$row = mysqli_fetch_assoc($results);
			$rownames = array();
			$counter = 0;
			foreach ($row as $key => $value) {
				$rownames[$counter] = $key; 
				$counter+=1;
				echo $key.' ';
			} 
			echo '&#10';
			foreach ($row as $key => $value) {
				echo $value.' ';
			}
			echo '&#10';
			while($row = mysqli_fetch_assoc($results)){
				foreach ($row as $key => $value) {
					echo $value.' ';
				}
				echo '&#10';
			}

		}
	}
	echo 'Query Executed Successfully &#10----------------END';	
	echo '</textarea><form method="POST" action="Query.php"><input id="QueryText" type="text" name="query" value="Insert Query Here!"></input><button id="QueryButton" type="submit">Execute</button></form>';

}

else{
	echo '<textarea id="QueryReturnText">  No Query Specified!</textarea>';
	echo '<form method="POST" action="Query.php"><input id="QueryText" type="text" name="query" value="Insert Query Here!"></input><button id="QueryButton" type="submit">Execute</button></form>';


}

?>
</body>
</html>
</DOCTYPE>
