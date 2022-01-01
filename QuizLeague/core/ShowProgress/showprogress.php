<?php
    class ProgressPage{
        function __construct()
        {
            $config=(array)json_decode(file_get_contents('../../../config/config.json'));
            $connectionObject = mysqli_connect($config['dbaddress'],$config['dbusername'],$config['dbpassword'],$config['dbname']);
            $sql = 'select question_id,question_mainbody,isconfirmed from questions where teacher_id=%d order by question_id DESC ;';
            $sql = sprintf($sql,$_SESSION['INF_teacher_id']);
            $res = mysqli_query($connectionObject,$sql);
            if(mysqli_num_rows($res)>0){
                $IconsFile = (array)json_decode(file_get_contents('../../../config/confirm_unconfirm_icons_location.json'));
                echo '<ul>';
                while($row=mysqli_fetch_assoc($res)){
                    echo '<li><img  width="30" height="30" alt="'.$IconsFile['ALT_'.$row['isconfirmed']].'" src='.$IconsFile['FILE_'.$row['isconfirmed']].'><div class="QuestionID">'.$row['question_id'].'</div><div class="QuestionBody">'.str_split($row['question_mainbody'],10)[0].'...</div></li>';
                }
                echo '</div>';
            }
            else{
                echo '<div class="NoDataFound" style="margin-top: 20%"><img src="../img/sad.png" ><span style="margin-left: 20px;display: inline;">Δεν έχουν καταχωρηθεί Ερωτήσεις σας ακόμα!! <br> Μπορείτε να ξεκινήσετε πατώντας στο κουμπί "Δημιουργία Νέας ερώτησης" <br> </span></img></div>';
                echo '<script>obj=document.getElementById("AddQuestion");
                  obj.animationName="HintAnimate";
                  obj.style.animationName="HintAnimate";
                  obj.style.animationDuration="2s";
                  obj.style.animationPlayState="play";
                  obj.style.animationIterationCount="infinite";
                  </script>';
            }


        }
    }

?>