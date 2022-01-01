<?php
	function getnumfields($row){
		$counter=1;
		$data = array();
		foreach ($row as $key => $value) {
			$data[$counter] = $key;
			$counter+=1;
		}
		return $data;
	}
	function returnquery(){
		session_start();
		$counter=0;
		$connected=0;$success=0;$query=$_POST['query'];$cols;$logs=array();
		$connectionObject = mysqli_connect('localhost',$_SESSION['username'],$_SESSION['password'],'sch');
		if($connectionObject){
			$connected=1;
			$query = mysqli_query($connectionObject,$_POST['query']);
			if(!mysqli_error($connectionObject)){
				$success=1;
				if(mysqli_num_rows($query)==0){
					$logs[$counter]='SQL command executed successfully';
					$counter+=1;
					echo 'ok';
				}
				else if($query){
					$printed_cols=False;
					$counter=0;
					$row= mysqli_fetch_assoc($query);
					$cols = getnumfields($row);
					while($row = mysqli_fetch_assoc($query)){
						foreach ($row as $key => $value) {
							$logs[$key] = $value;
						}
						$printed_cols=True;
					}
					return $logs;


				}
			}


			else{
				$connected;
				$success;
			}


		}
		else{
			return $connected;
		}
	}
	
	
?>