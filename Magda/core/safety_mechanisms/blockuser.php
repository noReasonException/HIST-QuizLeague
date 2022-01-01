<?php 
	function block_user($connectionObject,$username){
		$result = mysqli_query($connectionObject,'update users set isBlocked=1 where username="'.$username.'";');
		echo mysqli_error($connectionObject);
	}
?>