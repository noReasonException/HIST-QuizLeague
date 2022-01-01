<?php

	function getmachineversion($connectionObject,$config,$files,$errors){
		$JSON_SendDataArray = array();
		$JSON_SendDataArray['STATUS'] = 'OK';
		$result = mysqli_query($connectionObject,'select versionnumber from backendmachineversion group by id desc;');
		if(!mysqli_num_rows($result)){
			$JSON_SendDataArray['STATUS'] = 'DATA_ERR';
			include $files['report_error'];
			report_error($connectionObject,'101','getmachineversion.php','Error trying to select the back end machine version , select error',$config,$errors);

		}
		else{
			$row = mysqli_fetch_assoc($result);
			$JSON_SendDataArray['VERSION'] = $row['versionnumber'];

		}
		echo json_encode($JSON_SendDataArray);
		mysqli_close($connectionObject);

	}
	
?>