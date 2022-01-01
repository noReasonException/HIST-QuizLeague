<?php
	$defaults_file = fopen('defaults/config.ini','r');$config_file = fopen('config.ini','w');
	while ($row = fgets($defaults_file)){fwrite($config_file, $row);}
	fclose($defaults_file);fclose($config_file);
	header('Location:ChangeConfigs.php?status=1');
?>