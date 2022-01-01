<?php
	function getrandomsubchapterid($connectionObject,$lesson_id){
		$get_chapters = mysqli_query($connectionObject,'select chapter_id from chapters where lesson_id='.$lesson_id.';');
		$counter = 0;
		$chapters_array = array();
		while ($get_chapters_row = mysqli_fetch_assoc($get_chapters)){
			$chapters_array[$counter] = $get_chapters_row['chapter_id'];
			$counter+=1;
		}
		$random_choosen_chapter = $chapters_array[mt_rand(0,$counter-1)];
		$get_sub_chapters = mysqli_query($connectionObject,'select sub_chapter_id from sub_chapters where chapter_id='.$random_choosen_chapter.';');
		$counter=0;
		$sub_chapters_array = array();
		while ($get_sub_chapters_row = mysqli_fetch_assoc($get_sub_chapters)){
			$sub_chapters_array[$counter] = $get_sub_chapters_row['sub_chapter_id'];
			$counter+=1;
		}

		return $sub_chapters_array[mt_rand(0,$counter-1)];
	}
	
?> 