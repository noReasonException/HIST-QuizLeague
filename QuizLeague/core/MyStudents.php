<?php

class MyStudents {
    private $connectionObject;
    private function Connect(){
        $config=(array)json_decode(file_get_contents('../../../config/config.json'));
        $this->connectionObject=mysqli_connect($config['dbaddress'],$config['dbusername'],$config['dbpassword'],$config['dbname']);
        mysqli_set_charset($this->connectionObject,'utf-8');
    }
    function __construct($Teacher_id)
    {
        $this->Connect();
        $que = 'select users_union_teachers.lesson_id,lesson_name,user_id,username from users_union_teachers join lessons on users_union_teachers.lesson_id=lessons.lesson_id join users on users.id=users_union_teachers.user_id where users_union_teachers.teacher_id='.$Teacher_id.' order by lesson_id;';
        $res = mysqli_query($this->connectionObject,$que);
        $row=mysqli_fetch_assoc($res);
        $PrintLesson = $row['lesson_name'];
        $AnotherLesson=true;
        if(mysqli_num_rows($res)>0){
            echo '<ul>';
            while($row=mysqli_fetch_assoc($res)){
                if($row["lesson_name"]!=$PrintLesson){
                    $PrintLesson=$row['lesson_name'];
                    $AnotherLesson=true;
                }
                if($AnotherLesson){
                    echo '<div class="LessonName">Μάθημα: '.$PrintLesson.'</div>';
                    $AnotherLesson=false;
                }
                echo '<li>'.$row['username'].'</li>';

            }
        }
        else{
            echo '<div class="NoDataFound" style="margin-top: 20%"><img src="../img/sad.png" ><span style="margin-left: 20px;display: inline;">Δεν έχουν καταχωρηθεί μαθητές σας ακόμα!! <br> Μπορείτε να ξεκινήσετε πατώντας στο κουμπί "Προσθήκη μαθητή" <br> </span></img></div>';
            echo '<script>obj=document.getElementById("AddStudent");
                  obj.animationName="HintAnimate";
                  obj.style.animationName="HintAnimate";
                  obj.style.animationDuration="2s";
                  obj.style.animationPlayState="play";
                  obj.style.animationIterationCount="infinite";
                  </script>';
        }



    }
    function __destruct()
    {
        mysqli_close($this->connectionObject);
    }
}