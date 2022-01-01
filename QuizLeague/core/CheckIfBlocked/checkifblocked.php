<?php
    class CheckIfBlocked{
        public function __construct($depth)
        {
            $prefix='';
            for ($i=0;$i<$depth;$i++){$prefix=$prefix.'../';}
            $Ips=(array)json_decode(file_get_contents($prefix.'config/blocked_ips.json'));
            if (array_key_exists('IP_'.$_SERVER['REMOTE_ADDR'],$Ips) and $Ips['IP_'.$_SERVER['REMOTE_ADDR']]==1){
                //header('Location:errors/BlockedUser.php');
                header('Location: '.$prefix.'Teachers_Panel/errors/BlockedUser.php');
            }
        }
        public function cookiecheck(){
            if (isset($_COOKIE['1611'])){
                return 1;
            }
            else {
                return 0;

            }
        }
    }

?>

