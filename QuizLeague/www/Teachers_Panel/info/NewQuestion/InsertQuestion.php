<?php

    include '../../../../core/page.php';
    include '../../../../core/NewQuestion/NewQuestion.php';
    $ThisPage = new Page();
    $ThisPage->SessionCheckout();
    $ThisPage->checkifblocked(4);
    if(
        isset($_SESSION['schooltype_id']) and
        isset($_SESSION['direction_id']) and
        isset($_SESSION['lesson_id']) and
        isset($_SESSION['chapter_id']) and
        isset($_SESSION['sub_chapter_id']) and
        isset($_POST['question_mainbody']) and
        isset($_POST['question_type_id']) and
        isset($_POST['question_level_id'])){ //FIX
            $Question = new NewQuestion($_POST['question_mainbody'],$_SESSION['sub_chapter_id'],$_POST['question_level_id'],$_POST['question_type_id']);
            $_SESSION['question_mainbody'] = $_POST['question_mainbody'];
            $_SESSION['question_type_id']=$_POST['question_type_id'];
            $_SESSION['question_level_id']=$_POST['question_level_id'];
            $_SESSION['question_id'] = $Question->getQuestionID();
            if($Question->isOkStatus){
                header('Location:successmessage.php');
            }
            else{
                header("Location:somethinggonewrong.php");
            }


    }
    else{
        //err
    }


?>