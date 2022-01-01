<?php

	$old = $_GET['old_value'];$new = $_GET['new_value'];$name = $_GET['configname'];
	if (isset($old) and !empty($old) and isset($new) and !empty($new) and isset($name) and !empty($name)){
		$data = array();
		$config = fopen('config.ini','r');
		$counter = 0;
		$isEdited=0;
		while($row = fgets($config)){
			if(strpos($row,str_split($name,2)[1]) and strpos($row,str_split($name,2)[2])) {
				$row = str_replace((string)$old,(string)$new,(string)$row);
				$isEdited = 1;
			}
			echo $row.'<br>';
			$data[$counter] = $row;
			$counter+=1;


		}
		fclose($config);
		$config=fopen('config.ini','w');
		for ($i=0; $i <$counter ; $i++) { 
			fwrite($config,$data[$i]);
		}
		fclose($config);
		//header('Location:ChangeConfigs.php?status='.(string)$isEdited);
	}
	else {
	 	//header('Location:ChangeConfigs.php?status=0');
	 	$a=1;
	} 
	
?>