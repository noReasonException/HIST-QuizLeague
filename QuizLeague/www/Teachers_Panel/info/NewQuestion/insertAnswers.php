<?php
    include '../../../../core/page.php';
    $ThisPage = new Page();
    $ThisPage->SessionCheckout();
    $ThisPage->checkifblocked(4);
    if(isset($_POST['answer_id']) and is_numeric($_POST['answer_id'])){
        $_SESSION['answer_id'] = $_POST['answer_id'];
        $config=(array)json_decode(file_get_contents('../../../../config/config.json'));
        $connectionObject = mysqli_connect($config['dbaddress'],$config['dbusername'],$config['dbpassword'],$config['dbname']);

        $sql = 'insert into questions_union_answers values (%d,%d,%d)';
        $sql = sprintf($sql,$_SESSION['question_id'],$_SESSION['answer_id'],1);
        $res = mysqli_query($connectionObject,$sql);
        if(mysqli_error($connectionObject) and mysqli_error($connectionObject).str_split(' ')[0]=='Duplicate' or !mysqli_error($connectionObject)){
            header("Location:success.php");
        }
        else{
            header('Location:somethinggonewrong.php');
        }

    }
?>