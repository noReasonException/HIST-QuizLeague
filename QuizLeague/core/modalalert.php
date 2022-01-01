<?php

    class CreateNewModalAlertBox{
        private $connectionObject;
        private function Connect(){
            $config=(array)json_decode(file_get_contents('../../../config/config.json'));
            $this->connectionObject=mysqli_connect($config['dbaddress'],$config['dbusername'],$config['dbpassword'],$config['dbname']);
            mysqli_set_charset($this->connectionObject,'utf8');
        }
        public function __construct($Title,$name,$sql)
        {
            //$this->Connect();
            /*
            echo '<div id="ModalAlertBox"><div class="Title">'.$Title.'</div><br><select>';
            //ΦΙΑΞΕ ΣΧΕΣΕΙΣ ΒΑΣΕΙΣ
            //ΤΣΕΚΑΡΕ ΣΗΜΕΙΩΣΕΙΣ
            //ΠΙΕΣ ΠΟΛΥ ΚΑΦΕ :p
            echo '<option>Φυσική</option>';
            echo '<option>Μαθηματικά</option>';
            echo '</select><button>Προσθήκη μαθητή!</button>';
            echo '</div>';
        */
            echo '<div id="ModalAlertBox"><div class="Title">Δοκιμαστική έκδοση</div>Λυπούμαστε αλλα αυτή είναι μια δοκιμαστική έκδοση <br>και η λειτουργία αυτή δεν υποστηρίζεται <br></βρ></div>';
        }
    }
?>