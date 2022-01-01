<?php
	function changepassword($connectionObject,$old_password,$username,$new_password,$files,$config,$errors){
		$JSON_SendDataArray = array();
		$JSON_SendDataArray['STATUS'] = "OK";
		if($old_password==$new_password){
			$JSON_SendDataArray['STATUS'] = "SAME_OLD_NEW";
			include $files['report_error'];
			report_error($connectionObject,'204','changepassword.php','Trying to change password , Use same old and new password',$config,$errors);
		}
		else{
			$result = mysqli_query($connectionObject,'select salt from users where username ="'.$username.'";');
			if(!mysqli_num_rows($result)){
				$JSON_SendDataArray['STATUS'] ="USR_NOT_FOUND";
				include $files['report_error'];
				report_error($connectionObject,'202','changepassword.php','Username: '.$username,$config,$errors);
			}
			else{
				$row = mysqli_fetch_assoc($result);
				$salt_random_string = $row['salt'];
				$possible_old_password = $salt_random_string.$old_password;
				$possible_old_password = md5($possible_old_password);
				$result = mysqli_query($connectionObject,'select username from users where password="'.$possible_old_password.'";');
				if(!mysqli_num_rows($result)){
					$JSON_SendDataArray['STATUS'] = "WR_OLD_PS";
					include $files['report_error'];
					report_error($connectionObject,'203','changepassword.php','Username: '.$username.',old_password: '.$old_password,$config,$errors);
				}
				else{
					$row = mysqli_fetch_assoc($result);
					if(!$row['username'] == $username){
						$JSON_SendDataArray['STATUS'] = "WR_OLD_PS";
						include $files['report_error'];
						report_error($connectionObject,'203','changepassword.php','Username: '.$username.',old_password: '.$old_password,$config,$errors);
						report_error($connectionObject,'901','changepassword.php','User :'.$row['username'].' and User : '.$username.' has same salt random string :o',$config,$errors);
					}
					else{
						$JSON_SendDataArray["STATUS"] = "OK";
						$new_password = $salt_random_string.$new_password;
						$new_password = md5($new_password);
						$result = mysqli_query($connectionObject,'update users set password="'.$new_password.'";');
						if(!$result){
								$JSON_SendDataArray['STATUS'] = 'UNN_ERR';
								report_error($connectionObject,'102','changepassword.php','Error While trying to change password',$config,$errors);
						}
					}
				}
			}
		}
		
		echo json_encode($JSON_SendDataArray);
		mysqli_close($connectionObject);
	}

?>