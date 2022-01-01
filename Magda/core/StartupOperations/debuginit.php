<?php
	if (isset($config['DebugMode'])){
		if ($config['DebugMode']){
				error_reporting(E_ALL);
		}
		else if (!$config['DebugMode']){
			error_reporting(0);
		}
		else{
			include $files['report_error'];
			report_error('000','debuginit.php','[config.ini]DebugMode no suitable value set :O',$config,$errors);
			error_reporting(0);
		}
	} 
	else{
		include $files['report_error'];
		report_error('000','debuginit.php','[config.ini]DebugMode value missing :O',$config,$errors);
		error_reporting(0);
	}
?>