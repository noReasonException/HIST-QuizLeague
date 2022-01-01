<?php
	function post_username_only_filter($username){return False;}
	function post_login_filter($username,$password){return False;}
	function post_register_filter($firstname,$lastname,$age,$username,$password,$email){return False;}
	function post_changepassword_filter($old_password,$username,$new_password){return False;}
	function post_getschools_filter($city_id,$schooltype_id){return False;}
	function post_getdirections_filter($username){return False;}
	function post_getlessons_filter($directions_id){return False;}
	function post_getchapters_filter($lesson_id){return False;}
	function post_getsubchapters_filter($chapter_id){return False;}
	function post_getquestion_filter($sub_chapter_id){return False;}
	function post_getrandomquestion_filter($lesson_id){return False;}
	function post_checkanswer_filter($username,$question_id,$answer_id,$answer_name){return False;}
	function post_submitdirectionid_filter($username,$direction_id){return False;}
	function post_get_game_status_filter($game_id,$username){return False;}
?>