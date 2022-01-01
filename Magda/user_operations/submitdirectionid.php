<?php
	function submit_direction_id($connectionObject,$username,$direction_id,$files,$config,$errors){
		$submit_query = mysqli_query($connectionObject,"update users set direction_id=".$direction_id." where username='".$username."';");
		if(!$submit_query){
			$JSON_SendDataArray['STATUS']='DATA_ERR';
			include $files['report_error'];
			report_error($connectionObject,'101','submitdirectionid.php','Error trying to submit direction id on user '.$username,$config,$errors);
		}
		else{
			$JSON_SendDataArray['STATUS'] = 'OK';

		}
		echo json_encode($JSON_SendDataArray);
		mysqli_close($connectionObject);
	}
?>