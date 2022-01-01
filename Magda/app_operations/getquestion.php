<?php

	//types of questions
	//SL -> ερώτηση σωστού λάθους 
	function getdetails($connectionObject,$choosen_question_id){ //return question details
		
		$get_question_details = mysqli_query($connectionObject,'select question_mainbody,question_type,correct_answer_id from questions where question_id='.$choosen_question_id.';');
		$details_row = mysqli_fetch_assoc($get_question_details);
		return $details_row;
	}
	function getcorrectanswer($connectionObject,$choosen_question_id){ //return question right answer
		//$connectionObject = mysqli_connect('localhost','root','12312312345','sch');
		//print_r($connectionObject);
		$get_correct_answer = mysqli_query($connectionObject,'select correct_answer_mainbody,correct_answer.correct_answer_id from correct_answer join questions on questions.correct_answer_id=correct_answer.correct_answer_id where questions.question_id='.$choosen_question_id.';');
		$correct_answer_details = mysqli_fetch_assoc($get_correct_answer);
		return $correct_answer_details;
	}
	function getwronganswers($connectionObject,$choosen_question_id){ //return question wrong answer
		$get_wrong_answer = mysqli_query($connectionObject,'select non_correct_answer.non_correct_answer_id,non_correct_answer.non_correct_answer_mainbody from non_correct_answer join non_correct_mid_table on non_correct_answer.non_correct_answer_id=non_correct_mid_table.non_correct_answer_id join questions on questions.question_id=non_correct_mid_table.question_id where questions.question_id='.$choosen_question_id.';');
		//$wrong_list = mysqli_fetch_assoc($get_wrong_answer);
		return $get_wrong_answer;

	}


	function getquestions($connectionObject,$sub_chapter_id){
		$JSON_SendDataArray = array();
		$get_question_id_list_query = mysqli_query($connectionObject,'select question_id from questions where sub_chapter_id='.$sub_chapter_id.';');
		if(!mysqli_num_rows($get_question_id_list_query)){
			$JSON_SendDataArray['STATUS'] = 'NO_QUE';

		}
		else{
			$JSON_SendDataArray['STATUS'] = 'OK';
			$counter=0;
			$questions_id = array(); // fix thiz
			//GET ALL PROPER QUESTION_ID's
			while ($questions_id_row = mysqli_fetch_assoc($get_question_id_list_query)){
				$questions_id[$counter] = $questions_id_row['question_id'];
				$counter+=1;

			}

			//choose_random
			$choosen_question_id = $questions_id[mt_rand(0,$counter-1)]; //τυχαια επιλογη
			// question details

			$JSON_SendDataArray['question_id'] = $choosen_question_id; // επιστροφη του τυχαιου id
			$details = getdetails($connectionObject,$choosen_question_id);

			$JSON_SendDataArray['question_type'] = $details['question_type'];
			$JSON_SendDataArray['question_maibody'] = $details['question_mainbody'];

			//correct_answer
			$counter=0;
			$JSON_SendDataArray['answer_mainbody'.(string)$counter]=getcorrectanswer($connectionObject,$choosen_question_id)['correct_answer_mainbody'];
			$JSON_SendDataArray['answer_id'.(string)$counter]= $details['correct_answer_id'];
			$JSON_SendDataArray['is_correct'.(string)$counter] = "true";
			$counter+=1;
			//non_correct_answers

			$non_correct_list = getwronganswers($connectionObject,$choosen_question_id);
			while ($non_correct_list_row = mysqli_fetch_assoc($non_correct_list)){
				$JSON_SendDataArray['answer_mainbody'.(string)$counter] = $non_correct_list_row['non_correct_answer_mainbody'];
				$JSON_SendDataArray['answer_id'.(string)$counter] = $non_correct_list_row['non_correct_answer_id'];
				$JSON_SendDataArray['is_correct'.(string)$counter]="false";
				$counter+=1;

			}
			
		}
		echo json_encode($JSON_SendDataArray);
		mysqli_close($connectionObject);
	}
?>