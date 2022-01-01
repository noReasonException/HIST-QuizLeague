
<!DOCTYPE html>

<html>

<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link href="https://fonts.googleapis.com/css?family=GFS+Didot" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/ArticleReader.css">
<link rel="stylesheet" type="text/css" href="../css/ArticleStyle.css">
<link rel="stylesheet" type="text/css" href="../css/CommentStyle.css">
<!--<script type="text/javascript" src="slider.js"></script>-->

</head>

<body onload="init()">
		<div id="PresentationBackgroundLayer">
			<div id="PresentationTextLayer">
				EduOne.org
				<div id="PresentationMotto">Προπύργιο Αντικειμενικότητας </div>
			</div>
		</div>

	<div id="MenuBackgroundLayer">
		<ul  id ="MenuElementLayer">
			<li>
				<a href="../index.php">
					<span>Αρχική Σελίδα</span>
				</a>
			</li>
			<li>
				<a href="../news.php">
					<span>Ενημέρωση/Εκπαιδευτικά</span>
				</a>
			</li>
			<li>
				<a href="../Papers.php">
					<span>Εργασίες</span>
				</a>
			</li>
			<li>
				<a href="../culture.php">
					<span>Πολιτισμός</span>
				</a>
			</li>
						<li>
				<a href="../whoweare.php">
					<span>Ποιοί είμαστε</span>
				</a>
			</li>
		</ul>
	</div>
	<?php
  		if (isset($_GET['ArticleID'])){
  			$ArticleID = $_GET['ArticleID'];
  			$config = parse_ini_file('../config/ArticleReader.ini');
  			$connectionObject = new mysqli ($config['ip_address'],$config['username'],$config['password']);
  			//update a view!
  			$ArticleID = mysqli_real_escape_string($connectionObject, $ArticleID);
  			$result = mysqli_query($connectionObject,'select title , mainbody , author ,mainimage,authorimage,publishdate from news_section.articles where id='.$ArticleID.';');
  			//$row = mysqli_fetch_assoc($result);
  			if (!mysqli_num_rows($result)){
  				header('Location:../err/404.php');
  			}
  			else{


  				if($row = mysqli_fetch_assoc($result)){
						//echo '<head><title>'.$row['title'].'</title></head';
						echo '<div id="ArticleStyle">';
						echo '<div id="ArticleTitleStyle">'.$row['title'].'</div>';
						echo '<div id="ArticleMainImageStyle"><img src="'.$row['mainimage'].'"</a></div>';
						//echo '<canvas id="is" width="150" height="150"></canvas>';
						echo '<div id="ArticleMainBodyStyle">'.$row['mainbody'].'</div>';
						echo '<div id="ArticleAuthorStyle">'.$row['author'].'<img  src="'.$row['authorimage'].'"></img></div>';



  				}
					echo '</div>';

  			}
  		}
  		else{
  			header('Location:../err/400.php');
  		}

?>
<div id="CommentBackgroundLayer">
<form action="SubmitComment.php" method="post">
	<div id="CommentLabel">Όνομα</div><br><input type="text" name="username" id="username"><br>
	<div id="CommentLabel">Το σχόλιο σου</div><br><textarea type="text" name="comment" id="comment" rows=7 cols=110></textarea><br>
	<button type="submit" >Δημοσίευση σχολίου</button>
</form>
</div>

</body>
</html>
