<?php
	/* QuizLeague Communications Back-end Machine Main File
			Current Version : 2.0 "Magda" 
	   ____        _     _                                 
	  / __ \      (_)   | |                                
	 | |  | |_   _ _ ___| |     ___  __ _  __ _ _   _  ___ 
	 | |  | | | | | |_  / |    / _ \/ _` |/ _` | | | |/ _ \
	 | |__| | |_| | |/ /| |___|  __/ (_| | (_| | |_| |  __/
	  \___\_\\__,_|_/___|______\___|\__,_|\__, |\__,_|\___|
	                                       __/ |           
  	                                    |___/            
												MainFile
												v:2.0
	*/
	
	//$OperationFlag = "CHANGE_PASSWORD";
	$files = parse_ini_file('../config/files.ini');
	$config = (array)json_decode(file_get_contents('../config/config.json'),true);
	$errors = parse_ini_file('../config/error_messages.ini');
	include $files['dbinit']; // creates a connection with the database
	include $files['debuginit']; //Brings the machine to DebugMode or not depending on config.ini file!
	include $files['blockedipscheck']; //check if the $_SERVER['REMOTE_ADDR'] is defined as blocked
	include $files['post_filter']; // imports the incoming data filters
	if(!isset($_POST['FLAG'])){
		include $files['block_attacker'];
	}
	$OperationFlag =$_POST['FLAG']; //gets the flag via http post request
	//$OperationFlag="CHECK_ANSWER";
	//$_POST['username'] = 'STEF';
	//$_POST['question_id'] =2;
	//$_POST['answer_id'] = 2;
	//$_POST['answer_mainbody']="σωστό";


	//check if username is blocked

	//echo $_SERVER['HTTP_USER_AGENT'];
	//check if exist FIXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
	if(isset($_POST['username'])){ // in case if is set username
		if (!post_username_only_filter($_POST['username'])){ // if the filters say "ok"
			include $files['blockeduserscheck']; //then import the file
			if(is_blockeduser($connectionObject,$config,$files,$errors)){ // and check if its blocked
				die(); //if is , then kill script
			}
		
		}
		else{ //in a case of filters detect non-valid request
			include $files['block_attacker']; //is attacker and will gonna FUCK HIM <3 
		
		}
	}
	//check incoming flag
	if ($OperationFlag == "GET_APP_VERSION"){ //if the incoming operation flag is this
		include $files['getappversion']; // include getappversion.php
		getappversion($connectionObject,$config,$files,$errors); //responce to client
		die(); //kill
	}

	else if ($OperationFlag == "GET_MACHINE_VERSION"){
		include $files['getmachineversion'];
		getmachineversion($connectionObject,$config,$files,$errors);
		die();
	}
	else if($OperationFlag =="LOGIN"){
		include $files['login'];
		if(!post_login_filter($_POST['username'],$_POST['password'])){
			login($connectionObject,$_POST['username'],$_POST['password'],$files,$config,$errors);
		}
		else{
			include $files['block_attacker'];
		}
		die();
	}
	else if($OperationFlag == "CHANGE_PASSWORD"){
		include $files['changepassword'];
		if(!post_changepassword_filter($_POST['old_password'],$_POST['username'],$_POST['new_password'])){
			changepassword($connectionObject,$_POST['old_password'],$_POST['username'],$_POST['new_password'],$files,$config,$errors);
		}
		else{
			include $files['block_attacker'];
		}
		die();
	}
	else if($OperationFlag == "REGISTER"){
		include $files['register'];
		if(!post_register_filter($_POST['firstname'],$_POST['lastname'],$_POST['age'],$_POST['username'],$_POST['password'],$_POST['email'])){
			register($connectionObject,$_POST['firstname'],$_POST['lastname'],$_POST['age'],$_POST['username'],$_POST['password'],$_POST['email'],$files,$config,$errors);
		}
		else{
			include $files['block_attacker'];
		}
		die();
	}
	else if($OperationFlag=="SUBMIT_DIRECTION_ID"){
		include $files['submitdirectionid'];
		if(!post_submitdirectionid_filter($_POST['username'],$_POST['direction_id'])){
			submit_direction_id($connectionObject,$_POST['username'],$_POST['direction_id'],$files,$config,$errors);
		}
		else{
			include $files['block_attacker'];

		}
		die();
	}
	else if($OperationFlag=="GET_DIRECTION_ID"){
		include $files['getdirectionid'];
		getdirectionid($connectionObject);
		die();
	}
	else if($OperationFlag=="GETCITIES"){//fix global mysqli obj
		include $files['getcities'];
		getcities($connectionObject,$config,$files,$errors);
		die();
	}
	else if($OperationFlag=="GETSCHOOLS"){//fix global mysqli obj
		include $files['getschools'];
		if(!post_getschools_filter($_POST['city_id'],$_POST['schooltype_id'])){
			getschools($connectionObject,$_POST['city_id'],$_POST['schooltype_id'],$config,$files,$errors);

		}
		else{
			include $files['block_attacker'];
		}
		die();
	}
	else  if($OperationFlag=="GET_LESSONS"){
		if(!post_getlessons_filter($_POST['username'])){//filters say ok
			//give username search direction_id return list lessons id + lessons name
			include $files['getlessons'];
			getlessons($connectionObject,$_POST['username'],$config,$files,$errors);
		}
		else{
			include $files['block_attacker'];
		}
		die();

	}
	else if($OperationFlag=="GET_CHAPTERS"){
		if(!post_getchapters_filter($_POST['lesson_id'])){//filters say ok
			//give lesson_id return chapters_id and names
			include $files['getchapters'];
			getchapters($connectionObject,$_POST['lesson_id'],$config,$files,$errors);
		}
		else{
			include $files['block_attacker'];
		}
		die();
	}
	else if($OperationFlag=="GET_SUB_CHAPTERS"){
		if(!post_getsubchapters_filter($_POST['chapter_id'])){//filters say okay
			include $files['getsubchapters'];
			getsubchapters($connectionObject,$_POST['chapter_id'],$config,$files,$errors);

			//give chapter_id return sub_chapters_id and names
		}
		else{
			include $files['block_attacker'];
		}
		die();

	}
	else if($OperationFlag=="GET_QUESTION"){
		include $files['getquestion'];
		if(!post_getquestion_filter($_POST['sub_chapter_id'])){
			getquestions($connectionObject,$_POST['sub_chapter_id']);
		}
		else{
			include $files['block_attacker'];
		}
	}
	
	else if($OperationFlag=="GET_RANDOM_QUESTION"){
		//give lesson_id return random question
		if(!post_getrandomquestion_filter($_POST['lesson_id'])){
			include $files['getrandomsubchapterid'];
			$random_sub_chapter_id = getrandomsubchapterid($connectionObject,$_POST['lesson_id']);
			if(!post_getquestion_filter($random_sub_chapter_id)){
				include $files['getquestion'];
				getquestions($connectionObject,$random_sub_chapter_id);

			}
		}
		else{
			include $files['block_attacker'];
		}
	}
	else if($OperationFlag=="CHECK_ANSWER"){
		include $files['checkanswer'];
		if (!post_checkanswer_filter($_POST['username'],$_POST['question_id'],$_POST['answer_id'],$_POST['answer_mainbody'])){
			checkanswer($connectionObject,$_POST['username'],$_POST['question_id'],$_POST['answer_id'],$_POST['answer_mainbody'],$config,$files);
		}
		else{
			include $files['block_attacker'];
		}
	}
	else if($OperationFlag=="GET_NEWS"){
		die();
	}
	else if($OperationFlag=="SEARCH_USER"){
		die();
	}
	else if($OperationFlag=="MAKE_FRIEND"){
		die();
	}
	else if($OperationFlag=="GET_FRIENDS"){
		die();
	}
	else if($OperationFlag=="SET_NEW_GAME"){
		//NUM_OF_USERS -> username1 , username2 , usernameN
		//lesson_id
		include $files['setnewgame'];
		die();

	}
	else if($OperationFlag=="GET_GAME_STATUS"){
		if(!post_get_game_status_filter($_POST['game_id'],$_POST['username'])){
			include $files['getgamestatus'];
			get_game_status($connectionObject,$_POST['game_id'],$_POST['username']);
		}
		else{
			include $files['block_attacker'];
		}

		die();
	}
	else if($OperationFlag=="CHECK_ANSWER_ONLINE"){
		die();
	}
	else if($OperationFlag=="MODIFY_GAME"){
		die();
	}
	else if($OperationFlag=="DEL_GAME"){
		die();
	}
	else{
		include $files['block_attacker'];
		die();
	}
?>