<DOCTYPE HTML>
<html>
<head>
<title>Magda v2.1</title>
<?php session_start();?>
<meta charset="UTF-8">  
<script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.js"></script><link rel="stylesheet" type="text/css" href="./css/style.css">
<script>
	console.log('====start loading==');
	try{
		var socket=io('http://quizzleague.freebsdworld.gr:3000/');
		console.log('io() init -> ok');

	}catch(err){
		console.log('io() init -> err');
		console.log('Reason-> ',err);
	}
	console.log('Memory Init === start()');
	PressureValue=0;	console.log('PressureValue default value =',PressureValue);
	PrintedObjects = [];console.log('PrintedObjects[] init -> ok');
	MustPrint = [];console.log('MustPrint[] init -> ok');
	PrintDimensions_X = [];console.log('PrintDimensions_X[] init -> ok');
	PrintDimensions_Y = [];console.log('PrintDimensions_Y[] init -> ok');
	RequestAmount = 0;console.log('RequestAmount[] init -> ok');
	init_counter = 0;console.log('init_counter[] init -> ok def-> ',init_counter);
	RequestPerMinuteColor='black';console.log('RequestPerMinuteColor init-> ok def-> ',RequestPerMinuteColor);
	RequestAmountColor='black';console.log('RequestAmountColor init-> ok def-> ',RequestAmountColor);
	MultiplyNotification=false;console.log('MultiplyNotification init-> ok def-> ',MultiplyNotification);
	Dot_Pos_X = [];console.log('Dot_Pos_X[] init-> ok');
	Dot_Pos_Y = [];console.log('Dot_Pos_Υ[] init-> ok');
	isActiveDot = [];console.log('isActiveDot[] init-> ok');
	function dot_init(){DotObject = document.getElementById('DotObject01');console.log('DotObject01 load->ok init->ok');}
	function WidthPercent(percent){
		return percent*window.innerWidth/100;
	}

	function HeightPercent(percent){
		return percent*window.innerHeight/100;
	}
	function initialize(id){
		console.log('Graph Init start ()->');
		PrintedObjects[init_counter] = document.getElementById(id);console.log('Graph Loaded into memory-> ok');
		MustPrint[init_counter] = true;console.log('MustPrint Defined for Graph object :)');
		PrintDimensions_X[init_counter] = 30; console.log('Graph Default Pos x -> 30');
		PrintDimensions_Y[init_counter] = 120;console.log('Graph Default Pos x->120');
		
		init_counter+=1;
	}
	

	function AnimationStart(){
		canvas = document.getElementById("main");
		ctx = canvas.getContext("2d");
		canvas.width = window.innerWidth;
		canvas.height = window.innerHeight;
		console.log('canvas init ... OK!');
        setInterval(MainLoop,1000); //start Mainloop with 4fps(call every n/4 sec)
	}
	function LoadConfigs(color='black'){
		ctx.font = '22px Arial';
		ctx.fillStyle = color;
		ctx.lineWidth=3;
		ctx.strokeStyle='white';
	}
	function ClearScreen(){
		ctx.clearRect(0,0,window.innerWidth,window.innerHeight);
	}
	ij=0;
	function MainLoop(){
		ClearScreen();
		LoadConfigs();
		UpdateGraph();
		LoadScreen();
		PrintScreen();
		getPressureValue();
		setDot(PressureValue);
		
		
		

	}
	function getPressureValue(){
		socket.emit('request_value','NULL');
		socket.on('new_value',function(data){PressureValue=parseInt(data);console.log('INCOMING DATA-> '+data);})

	}	
		//xhr.open('GET','http://quizzleague.freebsdworld.gr/Dashboard/values.txt',false);
		//xhr.send();
		//xhr.addEventListener('readystatechange',getValue,false);
		//xhr.onreadystatechange = getValue;
		//function getValue(e){
		//	if (xhr.readyState==4 && xhr.status==200){
		//		var responce = JSON.parse(xhr.responseText);
				//PressureValue=responce.pressure;
			//}
		//}
	//}
	function UpdateGraph(){
		for(var i=0;i<isActiveDot.length;i++){
			Dot_Pos_X[i]+=10;
			if (Dot_Pos_X[i]>=WidthPercent(55)){
				isActiveDot[i] = false;
				console.log('[DEL]Dot at index ->',i);
				isActiveDot.splice(i,1);
				Dot_Pos_X.splice(i,1);
				Dot_Pos_Y.splice(i,1);
			}
		}
	}
	function LoadScreen(){

		ctx.fillText('Αιτήματα ανα λεπτό ',WidthPercent(5),100);
		if(RequestAmount<=100){
			LoadConfigs('green');
		}
		else if(RequestAmount<=1000){
			LoadConfigs('orange');
		}
		else {
			LoadConfigs('red');
		}
		ctx.fillText(RequestAmount.toString(),WidthPercent(45),100);
		if(MultiplyNotification){
			ctx.fillText('X'+parseInt(MultiplyNotification),WidthPercent(45),150);
		}
		
	}
	function PrintScreen(){
		//print image objects
		for (var i =0 ; i<=init_counter;i++) {
			if(MustPrint[i]){
				ctx.drawImage(PrintedObjects[i],PrintDimensions_X[i],PrintDimensions_Y[i]);
			}
			
		}
		//print dots
		for(var i=0;i<isActiveDot.length;i++){
			console.log(i,'-->',Dot_Pos_X[i],Dot_Pos_Y[i]);
			if(isActiveDot[i]){
				ctx.drawImage(DotObject,Dot_Pos_X[i],Dot_Pos_Y[i],5,5);
				if(i>0){
					ctx.beginPath();
					ctx.moveTo(Dot_Pos_X[i],Dot_Pos_Y[i]);
					
					ctx.lineTo(Dot_Pos_X[i-1],Dot_Pos_Y[i-1]);
					ctx.stroke();
				}
			}
		}
	}
	function setDot(percent){
		RequestAmount=percent;
		if(percent>100){
			multiplytimes = parseInt(percent/100);
			percent-=100*multiplytimes;
			MultiplyNotification=multiplytimes;
		}
		if(percent>=0 && percent<=100){
			Dot_Pos_X.push(parseInt((PrintDimensions_X[0]+WidthPercent(9))));
			//πανω δεξια συν το υψος του γραφηματος(269) μειον της κενης περιοχης(77) μεχρι το 5(μικροτερη τιμη)(10) μειον το γινομενο percent/5 φορες τον αριθμο 8 (κενο μεταξυ αριθμων)
			Dot_Pos_Y.push(parseInt((PrintDimensions_Y[0]+269-77-10)-9*((percent-5)/5)));
			isActiveDot.push(true);
			console.log('-->setDot-->');
			console.log('->DotLogs-->',Dot_Pos_X[Dot_Pos_X.length-1],Dot_Pos_Y[Dot_Pos_Y.length-1]);

		}
		
		
	}


</script>
<?php
	error_reporting(E_ALL);
	$config = parse_ini_file('./config/config.ini');
	if (isset($_POST['username'])){
		$connectionObject = mysqli_connect('localhost',$_POST['username'],$_POST['password'],$config['dbname']);
		if ($connectionObject){
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['password'] = $_POST['password'];
			$_SESSION['connectionObject'] = (array)$connectionObject;
		}
		else{
			header('Location:index.php?status=wrongps');
		}
		
	}
	else{
		if(!isset($_SESSION['username'])){
			header('Location:index.php');
		}
	}


?>
</head>
<body onLoad="AnimationStart()">
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
<canvas id="main" width='10' height='10'></canvas>	
<!-- Images Load Section--> 
<img src="img/Dot.png" width='0' height='0' id='DotObject01' onLoad="dot_init()"></img>
<img src='img/graph.png' width="0" height="0" id="1" onLoad="initialize(1)"></img>

</body>
</html>