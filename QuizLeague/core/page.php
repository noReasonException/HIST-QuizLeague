<?php
class Page{
    private $isloginused=0;
    function __construct()
    {
        header("Content-Type: text/html; charset=utf-8");
    }
    function Footer($place="external"){
        include 'footer.php';
        echo_footer($place);
    }
    function Login(){
        include 'login.php';
        $this->isloginused=1;
    }
    function SessionCheckout(){
        include 'SessionCheck.php';
    }
    function LoadStyles($depth){
        include 'loadcss.php';
        load($depth);
    }
    function checkifblocked($depth=2){
        include 'CheckIfBlocked/checkifblocked.php';
        $CheckObjTemp=new CheckIfBlocked($depth);
        if ($CheckObjTemp->cookiecheck()){
            $this->LetsBlockSomeone($depth);
        }
    }
    function LetsBlockSomeone($depth=2){
        include 'LetsBlockSomeone/LetsBlockSomeone.php';
        $ThisAsshole = new LetsBlockSomeone($depth);

    }
    function __destruct()
    {
        if($this->isloginused){
            global $connectionObject;
            mysqli_close($connectionObject) or null;
        }
        //FIX
        // TODO: Implement __destruct() method.
    }
}