<?php
    session_start();
    if(!isset($_SESSION['isconnected']) or $_SESSION['isconnected']===false){
        $config = (array)json_decode(file_get_contents("../../config/config.json"));
        $connectionObject = mysqli_connect($config["dbaddress"],$config['dbusername'],$config["dbpassword"],$config['dbname']);
        //log in procedure
        //1) get the salt
        if($result=mysqli_query($connectionObject,"select salt,password,username,isconfirmed,email,firstlogin,firstname,lastname,teacher_id from teachers where username='".mysqli_escape_string($connectionObject,$_POST['username'])."';")){
            $row = mysqli_fetch_assoc($result);
            if(!(integer)$row['isconfirmed']){
                header('Location:SignIn/VerifyPanel/index.php?status=91');
            }

            $possible_pass = md5($row['salt'].mysqli_escape_string($connectionObject,$_POST['password']));
            if($row['password']!=$possible_pass){
                //session_abort();
                session_destroy();

                header("Location:www/Teachers_Panel/index.php?status=0");

            }
            else{
                $_SESSION['isconnected']=true;
                $_SESSION['INF_username']=$_POST['username'];
                $_SESSION['INF_email'] = $row['email'];
                $_SESSION['INF_dateoffistlogin'] = $row['firstlogin'];
                $_SESSION['INF_firstname'] = $row['firstname'];
                $_SESSION["INF_lastname"] = $row['lastname'];
                $_SESSION['INF_teacher_id'] = $row['teacher_id'];
            }

        }
        else {
            //session_abort();
            //session_destroy(oid);
            $_SESSION['isconnected']=false;
            session_destroy();
            header("Location:index.php?status=0");
        }
    }
?>
