<?php
	function getschools($connectionObject,$city_id,$schooltype_id,$config,$files,$errors){
		$JSON_SendDataArray = array();
		$result = mysqli_query($connectionObject,'select school_id,school_name from schools join schooltypes on schools.schooltype_id=schooltypes.schooltype_id join cities on cities.city_id = schools.city_id where schools.city_id='.$city_id.' AND schools.schooltype_id='.$schooltype_id.';');
		if(mysqli_num_rows($result)==0){
			$JSON_SendDataArray['STATUS'] = 'DATA_ERR';
			include $files['report_error'];
			report_error($connectionObject,'101','getschools.php','Cant resolve schools :O '.(string)mysqli_error($connectionObject),$config,$errors);
		}
		else{
			$JSON_SendDataArray['STATUS'] = 'OK';
			$counter=1;
			while($row=mysqli_fetch_assoc($result)){
				$JSON_SendDataArray['id'.(string)$counter] = $row['school_id'];
				$JSON_SendDataArray['name'.(string)$counter] = $row['school_name'];
				$counter+=1;;
					
			}
		}
		echo json_encode($JSON_SendDataArray);
		mysqli_close($connectionObject);
	}
?>