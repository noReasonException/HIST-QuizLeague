<?php

	function block_ip($files){
		$block_ips_list = (array)json_decode(file_get_contents($files['blocked_ips']));
		
		$block_ips_list['IP_'.$_SERVER['REMOTE_ADDR']] = 'True';
		$block_ips_list = json_encode($block_ips_list);
		$block_ips_file = fopen($files['blocked_ips'],'w');
		fwrite($block_ips_file, $block_ips_list);
		fclose($block_ips_file);

	}

	/*
	function block_ip(){
		echo 'block_ip called <br>';
	}
	*/
	
?>