<DOCKTYPE html>

<html>

<head>
	<?php header('Content-Type: text/html; charset=utf-8');?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Αρχική Σελίδα</title>
	<?php
		$configs = (array)json_decode(file_get_contents('config/config.json'));
		$DatabaseConnectionObject = mysqli_connect($configs['address'],$configs['username'],$configs['password'],$configs['dbname']);
		$MainTextQuery = mysqli_query($DatabaseConnectionObject,'select Text from TextTable where position="INDEX";');
		if(mysqli_num_rows($MainTextQuery)!=1){
			header('Location:503.php');
		}
		$MainText = mysqli_fetch_assoc($MainTextQuery)['Text'];
		
	?>

</head>

<body onload="StartSlider();">
	<div id="MainMenu"> 
		<ul>
			<a href=""><li id="FirstElement">Αρχική Σελίδα</a></li>
			<a href=""><li>Μενού 01 </a></li>
			<a href=""><li>Μενου 02 </a></li>
			<a href=""><li>Μενου 03 </a></li>
			<a href=""><li>Μενου 04 </a></li>

		</ul>
	</div>
	<div id="PresentationPicture">
		<img src="img/presimg.jpg"></img>

	</div>
	<div class="Index">
		<div class="Container">
			<div class="MainTitle">Λογιστικό γραφείο "Βασίλης Ριζάς" <br></div>
			<div class="SubTitle">Υποτίτλος εδω <br></div>
			<div class="MainText"><?php echo $MainText;?><br></div>

		</div>
	</div>
	<img src="img/Slider (1).jpg" id="0" width="0" height="0">
	<img src="img/Slider (2).jpg" id="1" width="0" height="0">
	<img src="img/Slider (3).jpg" id="2" width="0" height="0">
</body>
<script>
	var i = 1;
	function HeightConverter(percent){
		return percent*window.innerHeight/100; 
	}
	function ChangePicture(){
		
		console.log("I->"+i);
		document.getElementById("PresentationPicture").innerHTML ='<img src="img/Slider ('+i+').jpg" >';
		if(i==3){i=1;}
		else{i+=1;}

	}
	function StartSlider(){
		console.log("ImageSlider version 0.1 Start... ");
		setInterval(function(){ChangePicture();},4000)

	}


	</script>
	<div class="Footer">
		<div class="SocialMediaSection">Βρείτε μας στα μέσα κοινωνικής δικτύωσης 
			<ul>
				<li><a href="fb.com"><div class="Facebook"><img src="img/fb.png"></a></div></li>
				<li><a href="in.com"><div class="LinkedIn"><img src="img/in.png"></a></div></li>
				<li><a href="gmail.com"><div class="Gmail"><img src="img/gplus.png"></a></div></li>

			</ul>
		</div><hr>
		<div class="MainText">Λογιστικό γραφείο "Βασίλης Ρίζας" Ε.Π.Ε <br> Ολα τα δικαιώματα κρατούνται (2016-2017)©</div>
		<div class="QuickMenu"><div class="Label">Γρήγορο Μενού</div>
			<ul>
				<li><a href="index.php">Αρχική Σελίδα</a></li>
				<li><a href="">Μενού 01</a></li>
				<li><a href="">Μενου 02</a></li>
				<li><a href="">Μενου 03</a></li>
				<li><a href="">Μενου 04</a></li>
				

			</ul>
		</div>
		<div class="Communication"><div class="Label">Επικοινωνία</div>
			<ul>
				<li>email:example@example.com</li>
				<li>Τηλέφωνο επικοινωνίας:210xxxxxxx</li>
				<li>Fax:210xxxxxxx</li>
				<li>Διεύθυνση:Ιπποκράτους 51 , κερατσίνι</li>
				<li>Ταχυδρομικός κώδικας:84596</li>

			</ul>
		</div>


		<div class="CreditsAndCopyright">Created by AthensCodingScene© all rights reserved (2016-2017)</div>


	</div>
</html>
</DOCKTYPE>