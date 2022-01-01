<?php
	function username_exists($connectionObject,$username){
		$result = mysqli_query($connectionObject,'select username from users where username="'.$username.'";');
		if(mysqli_num_rows($result)){
			return True;
		}
		return False;
	}
	function email_exists($connectionObject,$email){
		$result = mysqli_query($connectionObject,'select email from users where email="'.$email.'";');
		if(mysqli_num_rows($result)){
			return True;
		}
		return False;
	}
	function register($connectionObject,$firstname , $lastname , $age , $username , $password , $email,$files,$config,$errors){
		$JSON_SendDataArray = array();
		if(username_exists($connectionObject,$username,$files,$errors)){
			$JSON_SendDataArray['STATUS'] = 'USR_EXIST';
			include $files['report_error'];
			report_error($connectionObject,'205','register.php','[warn]User attemt to register with already in use username: '.$username,$config,$errors);
		}
		else{
			if(email_exists($connectionObject,$email,$files,$errors)){
				$JSON_SendDataArray['STATUS'] = 'EML_EXIST';
				include $files['report_error'];
				report_error($connectionObject,'206','register.php','[warn]User attemt to register with already email: '.$email,$config,$errors);
			
			}
			else{
				mysqli_set_charset($connectionObject,'utf8');
				$salt_random_string = uniqid(mt_rand(22,32),False);
				$encupted_password =  md5($salt_random_string.$password);
				$result = mysqli_query($connectionObject,'insert into users (firstname,lastname,age,username,password,email,salt) values ("'.$firstname.'","'.$lastname.'",'.$age.',"'.$username.'","'.$encupted_password.'","'.$email.'","'.$salt_random_string.'");');
				if (!$result){
					$JSON_SendDataArray['STATUS'] = "UNN_ERR";// FIXDAT
				}
				else{
					$JSON_SendDataArray['STATUS'] = "OK";
				}
				
			}

		}
		echo json_encode($JSON_SendDataArray);
		mysqli_close($connectionObject);
	}
		
	
?>