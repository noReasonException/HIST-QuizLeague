<DOCTYPE HTML>
<html>
<head>
<title>Magda v2.1</title>
<meta charset="UTF-8"> 
<link rel="stylesheet" type="text/css" href="./css/style.css">
<?php
	if(isset($_GET['status'])){
		if($_GET['status'] == "logout"){
			echo '<script>window.alert("Επιτυχής αποσύνδεση");</script>';

		}
		else{
			echo '<script>window.alert("Λάθος όνομα χρήστη ή κωδικός");</script>';

		}
	}

?>
</head>
<body>
	<div id="Message"> Sign in </div>
	<div id="Signin">

		<form method="post" action="panel.php">
			<input type="text" name="username"><br>
			<input type="password" name="password"><br>
			<button type="submit">Signin</button>
			</form>
		</form>
	</div>
</body>
</html>