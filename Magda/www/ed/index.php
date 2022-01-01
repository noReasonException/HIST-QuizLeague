<!DOCTYPE html>

<html>

<head>
<meta charset="UTF-8">
<title>Αρχική σελίδα</title>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link href="https://fonts.googleapis.com/css?family=GFS+Didot" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="./css/IndexStyle.css">
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
	<?php
		$config = parse_ini_file("./config/ArticleReader.ini");
		$ArticleID=NULL;

		$connectionObject = new mysqli($config['ip_address'],$config['username'],$config['password']);

		$result = mysqli_query($connectionObject,'select * from news_section.articles order by id desc limit 4; ');
		if(mysqli_num_rows($result) > 0 ){

			while($row = mysqli_fetch_assoc($result)){
				echo '<div id="ArticleBackgroundLayer">';
				echo '<div id="ArticleTitleLayer">'.$row['title'].'</div>';
				echo '<div id="ArticleMainBodyLayer">'.$row['mainbody'].' .... </div><br>';
				echo '<div id="ArticleReadMoreLayer"><a href="./Articles/Article.php?ArticleID='.$row['id'].' ">Διαβάστε Περρισσότερα </a></div>';
				echo '</div>';
			}

		}

	?>
  <div id="footer">2016-2017 EduOne.org© , All Rights Reserved© </div>
</body>
</html>
