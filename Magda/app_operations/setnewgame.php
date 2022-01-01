<?php
	function return_username_id($connectionObject,$username){
		$id_query = mysqli_query($connectionObject,'select id from users where username="'.$username.'"');
		
		if(mysqli_num_rows($id_query)!=1){
			return null;
		}
		return(string)mysqli_fetch_assoc($id_query)['id'];
	}
	function create_new_game($connectionObject,$lesson_id,$question_number){
		$create_new_game = mysqli_query($connectionObject,'insert into multiplayer_main (lesson_id,question_number) values('.$lesson_id.','.$question_number.');');
		$get_game_id = mysqli_query($connectionObject,'select game_id from multiplayer_main order by game_id desc;');
		return mysqli_fetch_assoc($get_game_id)['game_id'];
	}


	$JSON_SendDataArray=array();
	$JSON_SendDataArray['STATUS'] = "OK";
	$username_list = array();
	if($_POST['NUM_OF_USERS']>1){
		for($i=1;$i<=(integer)$_POST['NUM_OF_USERS'];$i++){
			if(!isset($_POST['username'.(string)$i])){
				$JSON_SendDataArray['STATUS'] = 'BAD_REQUEST';
				break;
			}
			else{
				$temp = return_username_id($connectionObject,$_POST['username'.(string)$i]);
				if($temp!=null){
					array_push($username_list, $temp);
				}
				else{
					$JSON_SendDataArray['STATUS'] = 'USR_NOT_FOUND';
					echo json_encode($JSON_SendDataArray);
					mysqli_close($connectionObject);
					die();
				}
			}
		
		}
		if($JSON_SendDataArray['STATUS']!='BAD_REQUEST'){
			$JSON_SendDataArray['game_id'] = create_new_game($connectionObject,$_POST['lesson_id'],$_POST['question_number']);
			for($i=0;$i<sizeof($username_list);$i+=1){
				$insert_user_query = mysqli_query($connectionObject,'insert into multiplayer_users (user_id,game_id) values ('.$username_list[$i].','.$JSON_SendDataArray['game_id'].');');
			}	
			$JSON_SendDataArray['STATUS'] = 'OK';
		}
	}
	else{
		$JSON_SendDataArray['STATUS'] = 'TO_FEW_PLAYERS';
	}
	
	echo json_encode($JSON_SendDataArray);
	mysqli_close($connectionObject);

	



?>