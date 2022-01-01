<?php
	function removeuserpoints($connectionObject,$username,$typeofgame,$typeofquestion,$config){$rev_user_points = mysqli_query($connectionObject,'update users set points=points-'.$config['REV_'.$typeofgame][$typeofquestion].' where username="'.$username.'";');}
?>