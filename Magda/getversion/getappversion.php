<?php
	function getappversion($connectionObject,$config,$files,$errors){
		$JSON_SendDataArray = array();
		$JSON_SendDataArray['STATUS'] = 'OK';
		$result = mysqli_query($connectionObject,'select versionnumber from appversion group by id;');
		if(!mysqli_num_rows($result)){
			$JSON_SendDataArray['STATUS'] = 'DATA_ERR';


		}
		else{
			$row = mysqli_fetch_assoc($result);
			$JSON_SendDataArray['VERSION'] = $row['versionnumber'];

		}
		echo json_encode($JSON_SendDataArray);
		mysqli_close($connectionObject);
	}
?>
	