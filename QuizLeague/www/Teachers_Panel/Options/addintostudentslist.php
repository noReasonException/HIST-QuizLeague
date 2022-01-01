<?php
if(isset($_GET['id']) and is_numeric($_GET['id'])){
    include '../../../core/page.php';
    $thisPage=new Page();
    $thisPage->SessionCheckout();
    $ThisPage->checkifblocked(3);

    $config = (array) json_decode(file_get_contents('../../../config/config.json'));
    $connectionObject = mysqli_connect($config['dbaddress'],$config['dbusername'],$config['dbpassword'],$config['dbname']);

    $sql = 'insert into users_union_teachers values(%d,%d,%d)';
    $sql = sprintf($sql,$_GET['id'],$_SESSION['INF_teacher_id'],1);
    $query = mysqli_query($connectionObject,$sql);

}