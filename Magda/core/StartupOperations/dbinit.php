<?php
	$connectionObject = mysqli_connect($config['ip_address'],$config['username'],$config['password'],$config['dbname']);
	mysqli_set_charset($connectionObject,'utf8');
?>