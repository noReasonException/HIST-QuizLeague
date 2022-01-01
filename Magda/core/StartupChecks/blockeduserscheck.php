<?php
function is_blockeduser($connectionObject,$config,$files,$errors){
	$JSON_SendDataArray=array();
	if ($config['AllowBlockedUsers']){
		$result = mysqli_query($connectionObject,'select isBlocked from users where username="'.$_POST['username'].'" AND isBlocked=1;');
		
		if(mysqli_num_rows($result)){ 
			$JSON_SendDataArray['STATUS'] = 'BLOCKED';
			include $files['report_error'];
			report_error($connectionObject,'901','blockeduserscheck.php','Blocked user :'.$_POST['username'].' kicked out',$config,$errors);
			echo json_encode($JSON_SendDataArray);
			mysqli_close($connectionObject);
			return True;
		}
		return False;
		

	}
}

?>
