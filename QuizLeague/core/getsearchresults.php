<?php

class GetSearchResults{
    private $connectionObject;
    private $Translations;
    private $SearchQuery;
    private function NoDataFound(){
        echo '<div class="NoDataFound"><img src="img/sad.png"><span>Δεν βρήθηκαν δεδομένα ,ξαναπροσπαθήστε</span></div>';
    }
    private function Connect(){
        $config=(array)json_decode(file_get_contents('../../../config/config.json'));
        $this->connectionObject=mysqli_connect($config['dbaddress'],$config['dbusername'],$config['dbpassword'],$config['dbname']);
        mysqli_set_charset($this->connectionObject,'utf8');
    }
    private function LoadTranslations(){
        $this->Translations = (array)json_decode(file_get_contents('../../../config/translations.json'));
    }
    private function PrintResults(){
        $sql = 'select username,firstname,lastname,id from users where username like "%'.mysqli_real_escape_string($this->connectionObject,$this->SearchQuery).'%" OR firstname LIKE "%'.mysqli_real_escape_string($this->connectionObject,$this->SearchQuery).'%" OR lastname LIKE "%'.mysqli_real_escape_string($this->connectionObject,$this->SearchQuery).'%";';
        $res = mysqli_query($this->connectionObject,$sql);
        if(mysqli_num_rows($res)>0){
            echo '<table class="Results">';
            echo '<tr><td>Όνομα Χρήστη</td><td>Επἰθετο χρήστη</td><td>Nickname</td><td>Επιλογές</td></tr>';
            while($row=mysqli_fetch_assoc($res)){
                echo '<tr><td>'.$row['firstname'].'</td><td>'.$row['lastname'].'</td><td>'.$row['username'].'</td><td><a id="OpenModalBox" onclick="modal_alert('.$row['id'].','.$_SESSION['INF_teacher_id'].');" title="Προσθήκη στην λίστα μαθητών"><div class="AddIntoStudentList"></div></a><a href="profile.php?id='.$row['id'].'&role=1" title="Προβολή προφίλ"><div class="ViewProfile"></div></a></td></tr>';
            }
            echo '</table>';
        }
        else{
            $this->NoDataFound();
        }


    }
    public function __construct($SearchQuery)
    {
        $this->SearchQuery=$SearchQuery;
        $this->Connect();
        echo '<div class="Label">Αποτελέσματα Αναζήτησης...</div>';
        $this->PrintResults();
    }
    public function __destruct()
    {
        mysqli_close($this->connectionObject);
    }

}