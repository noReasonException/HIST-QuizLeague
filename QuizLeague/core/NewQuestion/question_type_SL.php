<?php
class DefineNewAnswers{
    function __construct()
    {
        $Answers_ID = (array)json_decode(file_get_contents('../../../../config/CorrectFalseID.json'));
        echo '<div class="QuestionGetInfo"> Η απαντηση στην ερωτηση ειναι <br>';
            echo '<select name="answer_id" form="ConfirmButton">';
                foreach ($Answers_ID as $key=>$value){
                    echo '<option value="'.$value.'">'.$key.'</option>';
                }
            echo '<select>';
        EchoConfirmButton('insertAnswers.php');
        echo '</div>';

    }

}
