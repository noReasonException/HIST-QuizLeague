<DOCTYPE HTML>
    <html>
    <?php header("Content-Type: text/html; charset=utf-8");
    include '../../../../core/page.php';
    $ThisPage=new Page();
    $ThisPage->checkifblocked(4);
    session_start();if(isset($_SESSION['isconnected'])){session_destroy();}

    ?>

    <head>
        <title>QuizLeague Teachers SignIn</title>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php
            function return_salt($len,$nums="123456789"){
                $salt="";
                for ($i=0;$i<$len;$i++){
                    $salt=$salt.$nums[rand(0,strlen($nums)-1)];
                }
                return $salt;
            }
            if(isset($_GET['status'])){
                include 'VerifyRequired.php';
                die();
            }
            $config = (array) json_decode(file_get_contents("../../../../config/config.json"));
            $connectionObject = mysqli_connect($config["dbaddress"],$config["dbusername"],$config["dbpassword"],$config["dbname"]);
            if(!$connectionObject){
                include 'UnnownError.php';
            }
            function escape($str){global $connectionObject;return mysqli_real_escape_string($connectionObject,$str);}
            function precheck_2(){
                $elements_list = array('firstname','lastname','age','username','password','email');

                foreach ($elements_list as $key){//if is not set // return to previous index
                    if(!isset($_POST[$key])){
                        header("Location:../../index.php");
                        die();
                    }
                }
                if(sizeof($_POST)!=6){
                    return 1;
                }
                //αν περασει παραπανω παραμετρους
                foreach ($_POST as $element=>$data) {
                    if ($data == '' or in_array($element, $elements_list) === false) {//αν τροποποιησει τις παραμετρους η αν στειλει κενα δεδομενα..
                        #$ThisAsshole = new LetsBlockSomeone(4);
                        #global $ThisPage;
                        #$ThisPage->checkifblocked();
                    }
                }
                return 0;

            }



            $usernameexistsquery = mysqli_query($connectionObject,"select username from teachers where username='".mysqli_real_escape_string($connectionObject,$_POST['username'])."';");
            $emailexistquery = mysqli_query($connectionObject,"select email from teachers where email='".mysqli_real_escape_string($connectionObject,$_POST['email'])."';");
            if(mysqli_num_rows($usernameexistsquery)!=0){include 'AlreadyUsedUsernameMessage.php';die();}
            else if(mysqli_num_rows($emailexistquery)!=0){include 'AlreadyUsedEmailMessage.php';die();}
            else{
                if(precheck_2()){die();}//under attack
                $salt = '16'.return_salt(13);
                $pass = $salt.$_POST['password'];
                $pass = md5($pass);
                $insertquery = "insert into teachers (firstname,lastname,age,username,password,email,salt) values('%s','%s',%d,'%s','%s','%s','%s');";
                $insertquery = sprintf($insertquery,escape($_POST['firstname']),escape($_POST['lastname']),escape($_POST['age']),escape($_POST['username']),$pass,escape($_POST['email']),$salt);
                $insertintostatement = mysqli_query($connectionObject,$insertquery);
                if($insertintostatement){
                    include 'SuccessMessage.php';
                }
                else{
                    include 'UnnownError.php';
                }
                mysqli_close($connectionObject);
            }

        ?>
    </body>
    </html>
</DOCTYPE>