<?php
    class ShowProfileInfo{
        private $connectionObject;
        private $Translations;
        private function Connect(){
            $config=(array)json_decode(file_get_contents('../config/config.json'));
            $this->connectionObject=mysqli_connect($config['dbaddress'],$config['dbusername'],$config['dbpassword'],$config['dbname']);
            mysqli_set_charset($this->connectionObject,'utf-8');
        }
        private function LoadTranslations(){
            $this->Translations = (array)json_decode(file_get_contents('../../../config/translations.json'));
        }
        function __construct($id=null)
        {
            $this->LoadTranslations();
            if($id==null){
                echo '<img id="PhotoImage" src="img/nophoto.png">';
                echo '<ul>';
                foreach ($_SESSION as $key=>$value){
                    if(isset($this->Translations[$key])){

                        if($key=='isconnected'){
                            echo '<li style="text-align:center;">Συνδεδεμένος Τώρα...</li>';

                        }
                        else{
                            echo '<li>'.$this->Translations[$key].$value.'<a title="Αλλαγή" href="editprofile.php"><img src="img/edit.png"></a></li>';
                        }
                    }

                }
                echo '</ul>';
            }
            else{

            }
        }

    }

?>