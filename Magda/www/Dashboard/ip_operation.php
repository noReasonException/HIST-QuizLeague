<?php
	$ips = (array)json_decode(file_get_contents('blocked_ips.json'));
	if (empty($_GET['op'])){
		header('Location:BlockedIps.php?status=1');
	}
	else if(empty($_GET['ip'])){
		header('Location:BlockedIps.php?status=2');
	}
	else{
		$_GET['ip'] = str_replace('IP_', '', $_GET['ip']);
		if($_GET['op'] == 'UB'){
			$ips['IP_'.(string)$_GET['ip']] = "False";
		}
		else if($_GET['op'] == "DEL"){
			unset($ips['IP_'.(string)$_GET['ip']]);

		}
		else if($_GET['op'] == "ADDIP"){
			$ips['IP_'.(string)$_GET['ip']] = "True";
		}
		$ips = json_encode($ips);
		$file = fopen('blocked_ips.json','w');
		fwrite($file,$ips);
		fclose($file);
		header('Location:BlockedIps.php?status=3');
	}
	
?>