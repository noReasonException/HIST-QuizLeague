<?php
    function escape($connectionObject,$string){
        return mysqli_real_escape_string($connectionObject,$string);
    }
    class NewQuestion{
        public $question_mainbody;
        private $question_id;
        private $connectionObject;
        public $isOkStatus;
        function __construct($question_mainbody,$sub_chapter_id,$question_level_id,$question_type_id)
        {
            $config=(array)json_decode(file_get_contents('../../../../config/config.json'));
            $this->connectionObject = mysqli_connect($config['dbaddress'],$config['dbusername'],$config['dbpassword'],$config['dbname']);
            mysqli_set_charset($this->connectionObject,'utf8');

            $this->question_mainbody = $question_mainbody;
            if(!is_numeric($sub_chapter_id) or !is_numeric($question_level_id) and !is_numeric($question_type_id)){
                header('Location:index.php');
            }
            else{
                $sql = 'insert into questions(question_mainbody,sub_chapter_id,question_level_id,question_type_id,teacher_id) values ("%s",%d,%d,%d,%d);';
                $sql = sprintf($sql,escape($this->connectionObject,$question_mainbody),$sub_chapter_id,$question_level_id,$question_type_id,$_SESSION['INF_teacher_id']);
                $res = mysqli_query($this->connectionObject,$sql);
                if(!$res or mysqli_error($this->connectionObject)){
                    $this->isOkStatus=0;
                }
                else{
                    $this->isOkStatus=1;
                }
            }
        }
        function getQuestionID(){
            $res = mysqli_query($this->connectionObject,'select question_id from questions where question_mainbody="'.mysqli_real_escape_string($this->connectionObject,$this->question_mainbody).'";');
            if(mysqli_num_rows($res)!=1 or !mysqli_error($this->connectionObject)){
                $this->isOkStatus=1;
                return mysqli_fetch_assoc($res)['question_id'];
            }
            else{
                $this->isOkStatus=0;
                return -1;
            }
        }
        function __destruct()
        {
            global $connectionObject;
            mysqli_close($connectionObject);//FIX
        }
    }
    function ShowChoices($formName,$value_return_name,$value_shown_name,$sql,$translation_file=null){
        $config=(array)json_decode(file_get_contents('../../../../config/config.json'));
        $connectionObject = mysqli_connect($config['dbaddress'],$config['dbusername'],$config['dbpassword'],$config['dbname']);
        mysqli_set_charset($connectionObject,'utf8');

        $result = mysqli_query($connectionObject,$sql);
        if($result==false or mysqli_error($connectionObject)){
            return 0;
        }
        else if(mysqli_num_rows($result)==0){return -1;}
        echo '<select name="'.$value_return_name.'" class="MultipleChoice" form="'.$formName.'">';
        if($translation_file==null){
            while($row = mysqli_fetch_assoc($result)){
                echo '<option value="'.$row[$value_return_name].'">'.$row[$value_shown_name].'</option>';
            }
        }
        else{
            $translation_file = (array)json_decode(file_get_contents($translation_file));
            while($row=mysqli_fetch_assoc($result)){
                echo '<option value="'.$row[$value_return_name].'">'.$translation_file[$row[$value_shown_name]].'</option>';
            }
        }
        echo '</select><br>';
        return 1;
    }
    function EchoConfirmButton($nextfile,$checkjs_file=null,$startfunction_name=null){
        if($checkjs_file==null){
            echo '<form class="ConfirmButton" id="ConfirmButton" action='.$nextfile.' method="post"><div class="NextButton" onclick="document.getElementById(\'ConfirmButton\').submit();">Επιβεβαίωση</div> </form> ';
        }
        else{
            echo '<form  class="ConfirmButton" id="ConfirmButton" action='.$nextfile.' method="post"> <div class="NextButton" onclick="'.$startfunction_name.'">Επιβεβαίωση</div></form>';
        }

    }
    function AddCategoryButton($value,$String){
        echo '<div onclick="window.location(\'SetNew/index.php\')" class="AddCategory"><span>'.$String.'</span></div>';

    }

    ?>