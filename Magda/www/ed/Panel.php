<!DOCTYPE html>

<html>

<head>
<meta charset="UTF-8">
<title>Κεντρική Διοίκηση</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link href="https://fonts.googleapis.com/css?family=GFS+Didot" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="./css/PanelStyle.css">
</head>

<body>
<?php
	//ασφάλεια ενάντια σε sql injection fix
	error_reporting(0);
	session_start();
	//ασφάλεια αππ αυθαίρετη εισαγωγή στο σύστημα
	$test = $_SESSION['username'];
	if ($test==null){
		echo 'Security is here dude!';
		header("Location:index.php");
	}
	if($_SESSION['success_NewArticle']=='OK'){
		echo '<script > window.alert("Το Άρθρο δημοσιεύτηκε με επιτυχία ");</script>';
		$_SESSION['success_NewArticle'] = null;
	}
	else if($_SESSION['success_NewArticle']=="ERR"){
		echo '<script>window.alert("Κάτι πήγε στράβα κάτα την δημοσίευση , παρακαλώ επικοινωνήστε με τον διαχειριστή του συστήματος");</script>';
	}
?>


		<div id="PresentationBackgroundLayer">
			<div id="PresentationTextLayer">
				EduOne.org
				<div id="PresentationMotto">Προπύργιο Αντικειμενικότητας </div>
			</div>
		</div>

	<div id="MenuBackgroundLayer">
		<ul  id ="MenuElementLayer">
			<li>
				<a href="index.php">
					<span>Αρχική Σελίδα</span>
				</a>
			</li>
			<li>
				<a href="news.php">
					<span>Ενημέρωση/Εκπαιδευτικά</span>
				</a>
			</li>
			<li>
				<a href="Papers.php">
					<span>Εργασίες</span>
				</a>
			</li>
			<li>
				<a href="culture.php">
					<span>Πολιτισμός</span>
				</a>
			</li>
						<li>
				<a href="whoweare.php">
					<span>Ποιοί είμαστε</span>
				</a>
			</li>
		</ul>
	</div>
	<div id="MainMessage">Κεντρική διοίκηση του EduOne.org</div>
	<h3>
		<?php echo '<div id="UserLogs">Χρήστης :' , $_SESSION['username']; ?>
			<img src="../img/panel/online.png"  title="Συνδεδεμένος">
				<form method="post" action="Leave.php"><button type="submit">Αποσύνδεση χρήστη</button></form>
	</h3>
	</div>
		<?php
			$config = parse_ini_file('./config/CristinaBot.ini');
			$connectionObject = new mysqli($config['ip_address'],$config['username'],$config['password']);
			if($connectionObject->connect_error){
				echo 'err';
			}
			$result = mysqli_query($connectionObject,'select * from logs.online_users');
			if(mysqli_num_rows($result)>0){
				echo '<table id="IsOnlineTableStyle">';
				echo '<tr><td>Κατάσταση χρηστών </td></tr>';
				echo '<tr><td></td></tr>';
				while($row = $result->fetch_assoc()){
					echo '<tr><td>'.$row['Username'].'</td>';
					if($row['Status'] == "1"){
						echo '<td><img src="./img/panel/online.png" width="20px" height="20px" title="Συνδεδεμένος"></a></td>';

					}
					else{
						echo '<td><img src="./img/panel/not_online.png" width="20px" height="20px" title="Αποσυνδεδεμένος"></a></td>';
					}

				}
				echo "</table>";
			}
		?>



	<div id="MainMenu">
		Κεντρικό Μενού:Συντομέυσεις και λοιπά ;)
		<div id="MenuLabel"> Κατηγορία : Ενημέρωση και εκπαιδευτικά άρθρα</div>
		<ul id="MenuListElement">

			<li><a href="./Panel/NewArticle.php"> Νέο Άρθρο </a></li>
			<li> Νέα Ανακοίνωση </li>
			<li> Νέο Άρθρο </li>
		</ul>
		<div id="MenuLabel"> Κατηγορία : Εργασίες </div>
		<ul id="MenuListElement">

			<li> Προσθήκη νέας μεταπτυχιακης εργασίας</li>
			<li> Προσθήκη νέας διδακτορικής εργασίας</li>
			<li> Λοιπές Ρυθμίσεις προβολής </li>
		</ul>
		<div id="MenuLabel"> Κατηγορία : Εργασίες </div>
		<ul id="MenuListElement">

			<li> Προσθήκη νέου μεταπτυχιακού</li>
			<li> Προσθήκη νέας διδακτορικής εργασίας</li>
			<li> Λοιπές Ρυθμίσεις προβολής </li>
		</ul>
		<div id="MenuLabel"> Κατηγορία : Πολιτισμός </div>
		<ul id="MenuListElement">

			<li> Κατηγορία : Βιβλίο  </li>
			<li> Κατηγορία : Μουσική </li>
			<li> Κατηγορία : Θέατρο  </li>
			<li> Κατηγορία : Κινηματογράφος</li>
			<li> Κατηγορία : Εικαστικά </li>
		</ul>


	<div id="MenuLabel">Στατιστικά σελίδας</div>
	<ul id="MenuListElement">
		<li>Μετρητής Views ανα άρθρο</li>
		<li>Σχόλια σε ουρά έγρισης </li>
		<li>Υλικό σε ουρά έγρισης </li>
	</ul>




  <div id="MenuLabel">Ρυθμίσεις</div>
	<ul id="MenuListElement">
		<li>Ρυθμίσεις χρηστών</li>
		<li>Ρυθμίσεις Ασφαλείας</li>
		<li>Ρυθμίσεις για προχωρημένους</li>
		<li>Περί ... </li>
	</ul>
	</div>
	</div>
  </div>

  <div id="footer">WebTrip CMS Engine version 0.0.1 "Cristine" (Beta) </div><br><br><br>
  <div id="footer">2016-2017 EduOne.org© , All Rights Reserved© </div>
</body>
