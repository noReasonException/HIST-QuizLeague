<?php
	$JSON_SendDataArray = array();
	function reset_command($connectionObject,$status,$game_id){
		global $JSON_SendDataArray;
		$JSON_SendDataArray = array();
		$JSON_SendDataArray['STATUS'] = strtoupper($status);
		$JSON_SendDataArray['COMMAND'] = 'RESET_GAME';
		//FIXIT
		//delete game also		
	}
	function declare_game_start($connectionObject,$game_id){
		$define_game_start = mysqli_query($connectionObject,'update multiplayer_main set need_preproccess=1 where game_id='.$game_id.';');
		if(!$define_game_start){
			return 0;
		}
		return 1;
	}
	function game_preproccess($connectionObject,$lesson_id,$game_id){
		global $JSON_SendDataArray;
		//επιλογή τυχαίας ερώτησης 
		$get_random_question = mysqli_query($connectionObject,'select question_id,question_mainbody,question_type,correct_answer_id from questions join sub_chapters on questions.sub_chapter_id=sub_chapters.sub_chapter_id join chapters on chapters.chapter_id=sub_chapters.chapter_id join lessons on lessons.lesson_id=chapters.lesson_id where lessons.lesson_id='.$lesson_id);
		if($get_random_question){ // αμα επιστραφούν δεδομένα
			//επέλεξε εναν αριθμό στο ευρός 0 ως τον αριθμό των ερωτήσεων 
			$question_id_position = rand(0,(mysqli_num_rows($get_random_question)-1));
			for($i=0;$i<=$question_id_position;$i+=1){
				$get_question = mysqli_fetch_assoc($get_random_question);
			}
			//δήλωσε οτι η τυχαία επιλεγμένη question ειναι αυτή που τώρα χρησιμοποιείται!
			$define_choosen_question = mysqli_query($connectionObject,'insert into multiplayer_questions values('.$_POST['game_id'].','.$get_question['question_id'].',1);');

			//δήλωσε οτι κανένας χρήστης δεν έχει ακόμα απαντήσει
			//επέλεξε τους χρήστες 
			if((bool)($get_users = mysqli_query($connectionObject,'select user_id from multiplayer_users where game_id='.$game_id.';')) && mysqli_num_rows($get_users)>=2){
				while($user = mysqli_fetch_assoc($get_users)){
					//εισήγαγε τις τιμές στον πίνακα multiplayer_answers
					$define_user_not_answered = mysqli_query($connectionObject,'insert into multiplayer_answers values('.$game_id.','.$user['user_id'].','.$get_question['question_id'].',0);');					
				}
				//αφου τα έκάνες όλα αυτά , δήλώσε οτι η προεπεξεργασία έγινε
				if($define_preproccess_done=mysqli_query($connectionObject,'update multiplayer_main set need_preproccess=0 where game_id='.$game_id)){
					$JSON_SendDataArray['COMMAND'] = "RECALL";
				}
				else{
					//αν κατι παέι στραβά , στείλε σήμα για επανεκτέλεση 
					reset_comnand($connectionObject,"DATA_ERR",$game_id);
				}

			}
			else{
				//αν κατι παέι στραβά , στείλε σήμα για επανεκτέλεση 
				reset_comnand($connectionObject,"NO_USERS_FOUND",$game_id);
			}
		}
		else{
			//αν κάτι πάει στραβά , στείλε σήμα για επανεκτέλεση
			reset_comnand($connectionObject,"NO_QUE",$game_id);
		}
	}
	function no_preproccess($connectionObject,$game_id){
		global $JSON_SendDataArray;
		$question_query = mysqli_query($connectionObject,"select  multiplayer_questions.question_id ,question_mainbody,question_type,in_use from multiplayer_questions join questions on multiplayer_questions.question_id=questions.question_id where game_id=".$game_id.";");
		$question_counter=0;
		while($row = mysqli_fetch_assoc($question_query)){
			$JSON_SendDataArray['question_id'.(string)$question_counter] = $row['question_id']; 
			$JSON_SendDataArray['question_mainbody'.(string)$question_counter] = $row['question_mainbody'];
			$JSON_SendDataArray['question_type'.(string)$question_counter] = $row['question_type'];
			$JSON_SendDataArray['in_use'.(string)$question_counter]=$row['in_use'];
			if((bool)$row['in_use']){
				$in_use_question_id = $JSON_SendDataArray['question_id'.(string)$question_counter];
			}
		}
		$get_users = mysqli_query($connectionObject,'select answer_status,username from multiplayer_answers join users on id=user_id where game_id='.$game_id.';');
		$user_counter=0;
		$procced_to_new_question=true;
		while($row = mysqli_fetch_assoc($get_users)){
			$JSON_SendDataArray['username'.(string)$user_counter] = $row['username'];
			$JSON_SendDataArray['answer_status'.(string)$user_counter] = $row['answer_status'];
			if(!(bool)$row['answer_status']){
				$procced_to_new_question=false;
			}
			$user_counter+=1;
		} 
		if($procced_to_new_question){
			echo 'PROCCED';
			//define this question to in_use=0
			$define_question_no_use = mysqli_query($connectionObject,'update multiplayer_questions set in_use=0 where game_id='.$game_id.' AND question_id='.$in_use_question_id.';');
			$define_need_preproccess = mysqli_query($connectionObject,'update multiplayer_main set need_preproccess=1 where game_id='.$game_id.';');
			$JSON_SendDataArray=array();
			$JSON_SendDataArray['STATUS'] = 'OK';
			$JSON_SendDataArray['COMMAND']='RECALL';
			//recall and preproccess!

		}
	}
	function get_game_status($connectionObject ,$game_id, $username){
		//check if game exists
		global $JSON_SendDataArray;
		$JSON_SendDataArray['STATUS'] = 'OK';		
		if($check_query = mysqli_query($connectionObject ,"select lesson_id,game_id from multiplayer_main where game_id=".$game_id.";")){ // game_id exist
				$lesson_id = mysqli_fetch_assoc($check_query)['lesson_id'];
				//check if username exist
				if($check_query = mysqli_query($connectionObject , 'select username from users where username="'.$_POST['username'].'";') and mysqli_num_rows($check_query)==1){
					//check if preproccessing is done
					$preprop_check = mysqli_query($connectionObject,'select need_preproccess,is_finished from multiplayer_main where game_id='.$game_id.';');
					$data = mysqli_fetch_assoc($preprop_check);
					if(!(bool)$data['is_finished']){
						if(!(bool)$data['need_preproccess']){
							//no need preproccess
							no_preproccess($connectionObject,$game_id);
							
						}
						else{
							//need preproccess and send
							game_preproccess($connectionObject,$lesson_id,$game_id);
						}
					}
					else{
						$JSON_SendDataArray['STATUS'] = 'GAME_IS_FINISHED';
					}

				}
				else{
					$JSON_SendDataArray['STATUS'] = "USR_NOT_FOUND";
				}
		}
		else{
			$JSON_SendDataArray['STATUS'] = "GAME_NOT_FOUND";
		}
		echo json_encode($JSON_SendDataArray);
		mysqli_close($connectionObject);
		
	}

	
?>