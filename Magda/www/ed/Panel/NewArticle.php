<!DOCTYPE html>

<html>

<head>
<meta charset="UTF-8">
<title>Κεντρική Διοίκηση</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link href="https://fonts.googleapis.com/css?family=GFS+Didot" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="../css/PanelStyle.css">
<link rel="stylesheet" type="text/css" href="../css/NewArticleStyle.css">
</head>

<body>
<?php 
	//ασφάλεια ενάντια σε sql injection fix
	//error_reporting(0);
	session_start(); 
	//ασφάλεια αππ αυθαίρετη εισαγωγή στο σύστημα 
	$test = $_SESSION['username'];
	if ($test==null){
		echo 'Security is here dude!';
		header("Location:index.php");
	}
?>
		<div id="PresentationBackgroundLayer">
			<div id="PresentationTextLayer">
				Welcome to the EduOne.org 
			</div>
		</div>

	<div id="MenuBackgroundLayer">
		<ul  id ="MenuElementLayer">
			<li>
				<a href="../index.php">
					<span>Αρχική Σελίδα<span>
				</a>
			</li>
			<li>
				<a href="../news.php">
					<span>Ενημέρωση/Εκπαιδευτικά<span>
				</a>
			</li>
			<li>
				<a href="../Papers.php">
					<span>Εργασίες<span>
				</a>
			</li>
			<li>
				<a href="../culture.php">
					<span>Πολιτισμός<span>
				</a>
			</li>
						<li>
				<a href="../whoweare.php">
					<span>Ποιοί είμαστε<span>
				</a>
			</li>
		</ul>
	</div>
	<h1>Κεντρική διοίκηση του EduOne.org</h1>
	<div id="UserLogs">
	<h3>
		<?php echo '<div id="UserLogs">Χρήστης :' , $_SESSION['username']; ?> 
			<img src="../img/panel/online.png"  title="Συνδεδεμένος">
				<form method="post" action="../Leave.php"><button type="submit">Αποσύνδεση χρήστη</button></form>
	</h3>
	</div>
	<div id="NewArticleBackgroundLayer"> 
		<div id="NewArticleLabel"><h2> Εισαγωγή Νέου Άρθρου </h2></div>
		<form action="SubmitNewArticle.php" method="post">
			<div id="NewArticleLabel">Συγραφέας:</div>
			<input type="text" name="Author" id="NewArticleInput"> </input><br>
			<div id="NewArticleLabel">Τίτλος</div><input type="text" id="NewArticleInput" name="title"></input>
			<div id="NewArticleLabel"> Κυριώς σκέλος του άρθρου: <br><br></div>
			<textarea rows ='40' cols ='125' type="text" name="mainbody" id="NewArticleMainBody"> </textarea>
			<button id="Publish" type="submit" >Δημοσίευση </button>
		</form>
	</div>
  <div id="footer">2016-2017 EduOne.org© , All Rights Reserved© </div>
</body>