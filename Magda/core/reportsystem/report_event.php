<?php
	function report_event($connectionObject,$filename,$description,$config){
		if(isset($config['ReportEvents'])){
			if($config['ReportEvents']){
				$report_event = mysqli_query($connectionObject,'insert into events (filename,description) values ("'.$filename.'","'.$description.'")');
				
			}
		}
	}
?>