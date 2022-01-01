
<DOCTYPE HTML>
    <html>
        <head>
            <?php
                include '../../../../core/page.php';
                $ThisPage=new Page();
                $ThisPage->checkifblocked(4);
                echo $_GET['id'];
                function block(){
                    global $ThisPage;
                    $ThisPage->LetsBlockSomeone(4);

                }
                if(!isset($_GET['id']) or !is_numeric($_GET['id']) ){
                    //TODO:FIX!
                    //block();
                    //echo 'blocked';
                }
                $config = (array) json_decode(file_get_contents('../../../../config/config.json'));
                $ConnectionObject = mysqli_connect($config['dbaddress'],$config['dbusername'],$config['dbpassword'],$config['dbname']);
                if($ConnectionObject){
                    $checkifexist = mysqli_query($ConnectionObject,'select isconfirmed from teachers where salt="'.mysqli_real_escape_string($ConnectionObject,$_GET['id']).'";');
                    if($checkifexist){
                        if(mysqli_fetch_assoc($checkifexist)['isconfirmed']){
                            header("Location:../../index.php?status=4");//already confirmed
                        }
                        else{
                            $confirmquery = mysqli_query($ConnectionObject,'update teachers set isconfirmed=1 where salt="'.mysqli_real_escape_string($ConnectionObject,$_GET['id']).'" LIMIT 1;');
                            if(mysqli_error($ConnectionObject)){
                                header("Location:../../index.php?status=5");//unnown error

                            }
                            else{
                                header("Location:../../index.php?status=6");//everything ok!

                            }
                        }


                    }
                }
                else{
                    header("Location:../../index.php?status=7");//servers overloaded
                }

            ?>

        </head>
    </html>
</DOCTYPE>

