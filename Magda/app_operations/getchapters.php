<?php
	function getchapters($connectionObject,$lesson_id,$config,$files,$errors){
		$JSON_SendDataArray = array();
		$chapters = mysqli_query($connectionObject,'select chapter_id,chapter_name from chapters where lesson_id='.$lesson_id.';');
		if(mysqli_num_rows($chapters)){
			$JSON_SendDataArray['STATUS'] = 'OK';
			$counter=0;
			while($chapters_row=mysqli_fetch_assoc($chapters)){
				$JSON_SendDataArray['id'.(string)$counter] = $chapters_row['chapter_id'];
				$JSON_SendDataArray['name'.(string)$counter] = $chapters_row['chapter_name'];
				$counter+=1;

			}
		}
		else{
			$JSON_SendDataArray['STATUS'] = 'CHAP_IN_LESS_NOT_FOUND';
			include $files['report_error'];
			report_error($connectionObject,'101','getchapters.php','Charter in lesson_id='.$lesson_id.' not found',$config,$errors);
		

		}
		echo json_encode($JSON_SendDataArray);
		mysqli_close($connectionObject);
	}
