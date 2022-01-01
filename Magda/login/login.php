<?php 
function login($connectionObject,$username,$password,$files,$config,$errors){
	$JSON_SendDataArray = array();
	$result = mysqli_query($connectionObject,'select salt from users where username = "'.$username.'";');
		
	if (!mysqli_num_rows($result)){
		$JSON_SendDataArray['STATUS']='USR_NOT_FOUND';
		include $files['report_error'];
		report_error($connectionObject,'200','login.php','Wrong Username : '.$username,$config,$errors);
	}
	else if(!$result){
			$JSON_SendDataArray['STATUS'] ="DATA_ERR";
			include $files['report_error'];
			report_error($connectionObject,'101','login.php','Login Proccess on user'.$username.'crashed',$config,$errors);
	}

	else{
		$row = mysqli_fetch_assoc($result);
		
		$salt_random_string = $row['salt'];
		$possible_password = $salt_random_string.$password;
		$possible_password = md5($possible_password);
		$result = mysqli_query($connectionObject,'select password from users where username="'.$username.'";');
		if(mysqli_num_rows($result)){
			$row = mysqli_fetch_assoc($result);
			$account_password = $row['password'];
			if ($account_password == $possible_password){
				$JSON_SendDataArray['STATUS'] = 'OK';
				$result = mysqli_query($connectionObject,'select firstname,lastname,age,email,direction_id from users where username="'.$username.'" AND password = "'.$possible_password.'";');
				$row = mysqli_fetch_assoc($result);
					
				$JSON_SendDataArray['firstname'] = $row['firstname'];
				$JSON_SendDataArray['lastname'] = $row['lastname'];
				$JSON_SendDataArray['age'] = $row['age'];
				$JSON_SendDataArray['email'] = $row['email'];
				$JSON_SendDataArray['username'] = $username;
				$JSON_SendDataArray['direction_id'] = $row['direction_id'];
				if($row['direction_id']==null){
					$JSON_SendDataArray['WARN'] = 'true';
				}
				else{$JSON_SendDataArray['WARN']='false';}
			}
			else{
				$JSON_SendDataArray['STATUS'] = 'WRONG_PASS';
				include $files['report_error'];
				report_error($connectionObject,'201','login.php','Wrong Password : '.$possible_password.' Un_encrupted password given : '.$password.' On Username : '.$username,$config,$errors);

			}
		}
			
	}
	echo json_encode($JSON_SendDataArray);
	mysqli_close($connectionObject);
		
}
	

?>