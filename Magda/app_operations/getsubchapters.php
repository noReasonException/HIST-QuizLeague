<?php
	function getsubchapters($connectionObject,$chapter_id,$config,$files,$errors){
		$JSON_SendDataArray = array();
		$sub_chapters_question = mysqli_query($connectionObject,'select sub_chapter_id,sub_chapter_name from sub_chapters where chapter_id='.$chapter_id.';');
		if(!mysqli_num_rows($sub_chapters_question)){
			$JSON_SendDataArray['STATUS'] = "SUB_IN_CHAR_NOT_FOUND";
			include $files['report_error'];
			report_error($connectionObject,'101','getsubchapters.php','SubCharter in chapter_id='.$chapter_id.' not found',$config,$errors);
		}
		else{
			$JSON_SendDataArray['STATUS'] = 'OK';
			$counter=0;
			while($sub_chapter_row = mysqli_fetch_assoc($sub_chapters_question)){
				$JSON_SendDataArray['id'.(string)$counter] = $sub_chapter_row['sub_chapter_id'];
				$JSON_SendDataArray['name'.(string)$counter] = $sub_chapter_row['sub_chapter_name'];
				$counter+=1;
			} 
		}
		echo json_encode($JSON_SendDataArray);
		mysqli_close($connectionObject);
	}

?>