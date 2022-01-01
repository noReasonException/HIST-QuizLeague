<html>

<?php
	include '../../core/page.php';
	$ThisPage = new Page();
	$ThisPage->Login();
	$ThisPage->checkifblocked();

?>
<head>

    <meta charset="UTF-8">
	<title>MainPanel</title>
	<?php $ThisPage->LoadStyles(0);?>


</head>
<body>
	<div class="TopMenu">
		<ul>
			<a href="panel.php"><li style="background-color:#7ca593;color:#ffffff;">Αρχικό μενού</li></a>
			<a href="Options/profile.php"><li>Επαγγελματικό προφίλ</li></a>
			<a href="Options/notes.php"><li>Σημειώσεις</li></a>
			<a href="Options/mystydents.php"><li>Οι μαθητές μου</li></a>
			<a href="Options/logoff.php"><li>Αποσύνδεση</li></a>
		</ul>

	</div>
	<div class="Context">
		<div class="LeftMenu">
			<ul>
				<a href="info/myquestions.php"><li>Οι ερωτήσεις μου</li></a>
				<a href="info/createnewquestion.php"><li>Δημιουργία Νέας Ερώτησης</li></a>
				<a href="info/showprogress.php"><li>Πρόοδος αιτημάτων</li></a>
				<a href="info/reports.php"><li>Αναφορές/Διορθώσεις</li></a>
				<a href="info/messages.php"><li>Μυνήματα</li></a>
				<a href="info/settings.php"><li>Ρυθμίσεις</li></a>
				<a href="info/about.php"><li>Περί...</li></a>
			</ul>

		</div>
		<div class="MainMenu">
			<div class="Header">Αρχική Σελίδα καθηγητή</div>
			<div class="UserLogs">Συνδεδεμένος ώς <?php if(isset($_SESSION['INF_username'])){echo $_SESSION['INF_username'];}else{header('Location:index.php?status=1');}?></div><br><hr>
			<div class="NewsSection">
				<!--<hr>Τα σημαντικότερα νέα σε τίτλους
					<li><div class="NewsSectionElement">Ο μαθητής σας "Χαράλαμπος μπιλλίνης" νίκησε με 12-1 τον ...</div><br><div class="NewsSectionLearnMoreButton">μάθετε περρισότερα</div></li>
					<li><div class="NewsSectionElement">Η ερώτηση σας με αριθμό 1201921 εγρίθηκε...</div><br><div class="NewsSectionLearnMoreButton">μάθετε περρισότερα</div></li>
					<li><div class="NewsSectionElement">Μαθητής ανέφερε οτι ερώτηση σας περιέχει ασάφεια...</div><br><div class="NewsSectionLearnMoreButton">μάθετε περρισότερα</div></li>
                -->
                <div class="NoNewsFound">
                    <img src="img/no_news.png"><span>Δεν υπάρχουν ακόμα νεά για εσάς!<br>Για οτιδήποτε νεότερο <br>θα σας ειδοποιήσουμε αμέσως :)</span>
                </div>
			</div>
		</div>
	</div>
	<?php $ThisPage->Footer("internal");?>
</body>

</html>