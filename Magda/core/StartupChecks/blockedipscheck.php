<?php
	if ($config['AllowBlockedIps']){
		$blockedusers = (array)json_decode(file_get_contents('../config/blocked_ips.json'));
		foreach ($blockedusers as $ip => $permission){
			if(str_replace('IP_', '', $ip)==$_SERVER['REMOTE_ADDR']and $permission=="True"){
				include $files['report_error'];
				report_error($connectionObject,'901','blockedipscheck.php','Blocked Ip request kicked out',$config,$errors);
				$JSON_SendDataArray = array();
				$JSON_SendDataArray['STATUS'] ="BLOCKED";
				echo json_encode($JSON_SendDataArray);
				//also block his new ip
				include $files['block_attacker'];
				die();
			}
		}
	}
	
?>