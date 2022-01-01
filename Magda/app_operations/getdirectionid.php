<?php

	function getdirectionid($connectionObject){
		$JSON_SendDataArray = array();
		$JSON_SendDataArray["STATUS"] = "OK";
		if($direction_id = mysqli_query($connectionObject,' select direction_id,direction_name,schooltype_name from directions join schooltypes on directions.schooltype_id=schooltypes.schooltype_id;')){
			$direction_counter = 0;
			while ($row = mysqli_fetch_assoc($direction_id)){
				$JSON_SendDataArray["id".(string)$direction_counter] = $row['direction_id'];
				$JSON_SendDataArray["name_direction".(string)$direction_counter] = $row['direction_name'];
				$JSON_SendDataArray["name_schooltype".(string)$direction_counter] = $row['schooltype_name'];

				$direction_counter+=1;
			}
		}
		else{
			$JSON_SendDataArray["STATUS"] = "DATA_ERR";
		}
		echo json_encode($JSON_SendDataArray);
		mysqli_close($connectionObject);

	}
?>