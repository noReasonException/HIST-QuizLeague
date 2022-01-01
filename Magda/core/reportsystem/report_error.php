<?php
	function report_error($connectionObject,$code,$filename,$description,$config,$errors){
		if ($config['RecordErrorsOfType'][0][(string)str_split($code,1)[0]]==True){
			if (isset($config['RecordSpecificErrorType'][(string)$code]))
			{
				$result = mysqli_query($connectionObject,'insert into errors (code,error_message,file,description,client_ip) values ("'.$code.'","'.$errors['ERR_'.(string)($code)].'","'.$filename.'","'.$description.'","'.$_SERVER['REMOTE_ADDR'].'");');
			}
		}
		 
	}
?>