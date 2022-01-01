<!DOCTYPE html>

<html>

<head>
<meta charset="UTF-8">
<title>Σύνδεση </title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link href="https://fonts.googleapis.com/css?family=GFS+Didot" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="./css/SignInStyle.css">
</head>

<body>
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
	<h1> Σύνδεση στο σύστημα </h1>
  <form id="SignInForm" action="ConnectToPanel.php" method="post">

  	<div id="Label">Όνομα Χρήστη<Br></div>
  		<input type="text" name="username" id="username"><br>
  	<div id="Label"> Κωδικός Πρόσβασης</div><Br>
  		<input type="password" name="password" id="password"></input><br>

  	<button type="submit" id="SubmitButton" name="SignIn"  >Σύνδεση</button>


  </form>
  </div>
  <div id="footer">2016-2017 EduOne.org© , All Rights Reserved© </div>
</body>
