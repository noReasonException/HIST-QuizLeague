<?php
//select direction_id
//return proper lessons
//input : $username

	function getlessons($connectionObject,$username,$config,$files,$errors){
		$JSON_SendDataArray = array();
		$result = mysqli_query($connectionObject,'select direction_id from users where username="'.$username.'";');
		if(!mysqli_num_rows($result)){
			$JSON_SendDataArray['STATUS'] = 'USR_NOT_FOUND'; 
			include $files['report_error'];
			report_error($connectionObject,'101','getlessons.php','[WARN] Unnown User='.$username.' attemt to get lessons',$config,$errors);
		}		 
		else{
			$direction_id = mysqli_fetch_assoc($result)['direction_id'];
			$lesson_query = mysqli_query($connectionObject,'select lesson_id,lesson_name from lessons where direction_id='.$direction_id.';');
			if(!mysqli_num_rows($lesson_query)){
				$JSON_SendDataArray['STATUS'] = 'LES_IN_DIR_NOT_FOUND';
				include $files['report_error'] ;
				report_error($connectionObject,'101','getlessons.php','no lesson found in direction_id='.$direction_id,$config,$errors);

			}
			else{
				$JSON_SendDataArray['STATUS'] = 'OK';
				$counter=0;
				while ($lessons_row = mysqli_fetch_assoc($lesson_query)){
					$JSON_SendDataArray['id'.(string)$counter] = $lessons_row['lesson_id'];
					$JSON_SendDataArray['lesson'.(string)$counter] = $lessons_row['lesson_name'];
					$counter+=1;
				}
			}
		}
		echo json_encode($JSON_SendDataArray);
		mysqli_close($connectionObject);
	}
?>