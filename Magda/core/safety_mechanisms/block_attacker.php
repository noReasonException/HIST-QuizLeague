<?php
	include $files['blockip'];
	block_ip($files);
	if (isset($_POST['username'])){
		include $files['blockuser'];
		block_user($connectionObject,$_POST['username']);
	}
	mysqli_close($connectionObject);
?>