<?php
	function getcities($connectionObject,$config,$files,$errors){
		$JSON_SendDataArray = array();
		$result = mysqli_query($connectionObject,'SELECT city_id,city_name FROM cities;');
		if(!mysqli_num_rows($result)){
			include $files['report_error'];
			report_error($connectionObject,'101','getcities.php','Cant resolve cities :O  ',$config,$errors);
			$JSON_SendDataArray['STATUS'] = 'DATA_ERR';

		}
		else{
			$JSON_SendDataArray['STATUS'] = 'OK';
			$counter = 1;
			while ($row = mysqli_fetch_assoc($result)){
				$JSON_SendDataArray['id'.(string)($counter)] = $row['city_id'];
				$JSON_SendDataArray['name'.(string)($counter)] = $row['city_name'];
				$counter+=1;
			}


		}
		echo json_encode($JSON_SendDataArray);
		mysqli_close($connectionObject);
	}
		
?>