<?php

    //
    $status=array();
    $status["TEACHERS_PANEL"]="RESPONDING";
    $status["DB"]="RESPONDING";
    if(!isset($_GET['iddd'])) { //
        //TODO:BLOCK
    }
    else{
        $config=(array)json_decode(file_get_contents('../../config/config.json'));
        try{
            $connectionObject = mysqli_connect($config['dbaddress'],$config['dbusername'],$config['dbpassword'],$config['dbname']);
        }catch (mysqli_sql_exception $e){
            $status['DB']="NOT_RESPONDING";
        }
    }

    echo json_encode($status);
?>