<?php
class LetsBlockSomeone{
    private $prefix='';
    private function ipblock(){
        $Ips=(array)json_decode(file_get_contents($this->prefix.'config/blocked_ips.json'));
        $Ips['IP_'.$_SERVER['REMOTE_ADDR']] = 1;
        $blocked_ips_file=fopen($this->prefix.'config/blocked_ips.json','w');
        fwrite($blocked_ips_file,json_encode($Ips));
        fclose($blocked_ips_file);
    }
    private function cookieblock(){
        setcookie('1611', '1166', time() + (86400 * 30), "/");
        //BEFORE HTML
        //OL!
    }
    public function __construct($depth)
    {
        $this->prefix='';
        for ($i=0;$i<$depth;$i++){$this->prefix=$this->prefix.'../';}
        $this->ipblock();
        $this->cookieblock();



    }

}

?>