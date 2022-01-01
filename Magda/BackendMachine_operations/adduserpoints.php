<?php
	function adduserpoints($connectionObject,$username,$typeofgame,$typeofquestion,$config){$add_points_query = mysqli_query($connectionObject,'update users set points=points+'.$config[$typeofgame][$typeofquestion].' where username="'.$username.'";');	}
?>