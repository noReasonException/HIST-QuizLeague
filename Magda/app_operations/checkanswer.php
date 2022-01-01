<?php
	function checkanswer($connectionObject,$username,$question_id,$answer_id,$answer_mainbody,$config,$files){
		//check if question exists
		$JSON_SendDataArray = array();
		$question_exist_answer = mysqli_query($connectionObject,'select question_id,question_type,correct_answer_id from questions where question_id='.$question_id.';');
		if(!mysqli_num_rows($question_exist_answer)){
			$JSON_SendDataArray['STATUS'] = 'WRONG_QUE_ID';

		}
		else{
			$question_details = mysqli_fetch_assoc($question_exist_answer);
			if(!($answer_id==$question_details['correct_answer_id'])){
				$JSON_SendDataArray['STATUS'] = 'WRONG_ANSWR';
				include $files['removeuserpoints'];
				removeuserpoints($connectionObject,$username,'sologame',$question_details['question_type'],$config);
			}
			else{
				$correct_answer_text_check = mysqli_query($connectionObject,'select correct_answer_mainbody from correct_answer where correct_answer_id='.$answer_id.';');
				$correct_answer = mysqli_fetch_assoc($correct_answer_text_check);
				if($correct_answer['correct_answer_mainbody']==$answer_mainbody){
					$JSON_SendDataArray['STATUS'] = 'CORRECT';
					include $files['adduserpoints'];
					adduserpoints($connectionObject,$username,'sologame',$question_details['question_type'],$config);
				}
				else{
					$JSON_SendDataArray['STATUS'] = 'WRONG_ANSWR';
				}
			}
		}
		echo json_encode($JSON_SendDataArray);
		mysqli_close($connectionObject);
	}

?>