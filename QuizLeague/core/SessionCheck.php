<?php
    session_start();
    if(!isset($_SESSION['isconnected']) or !$_SESSION['isconnected']===True){
        header("Location:www/Teachers_Panel/index.php?status=2");
    }


?>