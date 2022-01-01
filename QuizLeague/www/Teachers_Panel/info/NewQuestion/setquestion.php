
<html>
<?php
include '../../../../core/page.php';
include '../../../../core/NewQuestion/NewQuestion.php';
include '../../errors/unnownError.php';
$ThisPage = new Page();

$ThisPage->SessionCheckout();
$ThisPage->checkifblocked(4);
header("Content-Type: text/html; charset=utf-8");

?>
<head>
    <title>MainPanel</title>
    <?php $ThisPage->LoadStyles(2);?>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/checkform.js"></script>


</head>
<body onload="greeding();">
<div class="TopMenu">
    <ul>
        <a href="../../panel.php"><li>Αρχικό μενού</li></a>
        <a href="../../Options/profile.php"><li>Επαγγελματικό προφίλ</li></a>
        <a href="../../Options/notes.php"><li>Σημειώσεις</li></a>
        <a href="../../Options/mystydents.php"><li>Οι μαθητές μου</li></a>
        <a href="../../Options/logoff.php"><li>Αποσύνδεση</li></a>
    </ul>

</div>
<div class="Context">
    <div class="LeftMenu">
        <ul>
            <a href="../myquestions.php"><li>Οι ερωτήσεις μου</li></a>
            <a href="../createnewquestion.php" ><li style="background-color:#7ca593;color:#ffffff;" >Δημιουργία Νέας Ερώτησης</li></a>
            <a href="../showprogress.php"><li>Πρόοδος αιτημάτων</li></a>
            <a href="../reports.php"><li>Αναφορές/Διορθώσεις</li></a>
            <a href="../messages.php"><li>Μυνήματα</li></a>
            <a href="../settings.php"><li>Ρυθμίσεις</li></a>
            <a href="../about.php"><li>Περί...</li></a>
        </ul>

    </div>
    <div class="MainMenu">
        <div class="QuestionGetText">
            Εισάγετε το κείμενο της ερώτησης.. <br>
            <textarea cols="70" form="ConfirmButton" onclick="resetstyle();" name="question_mainbody" id="question_mainbody" class="question_mainbody" rows="10">Πληκρολογήστε την ερώτηση :) </textarea>

            <?php
            if(isset($_POST['sub_chapter_id']) and is_numeric($_POST['sub_chapter_id'])){
                $_SESSION['sub_chapter_id']=$_POST['sub_chapter_id'];//FIX! PROBLEM
            }
            else{
                header('Location:index.php');//FIX
            }

                echo '<ul>';
                    echo '<li>';
                        echo 'Είδος ερώτησης...<br>';
                        if(!ShowChoices('ConfirmButton','question_type_id','question_type_name','select question_type_id,question_type_name from question_type;','../../../../config/translations.json'));
                    echo '</li>';
                    echo '<li>';
                        echo 'Δυσκολία ερώτησης...<br>';
                        ShowChoices('ConfirmButton','question_level_id','question_level_name','select question_level_id , question_level_name from question_level;');
                    echo '</li>';
                echo '</ul>';
                EchoConfirmButton('InsertQuestion.php','js/checkform.js','check();');
                ?>
        </div>
    </div>
</div>
<?php $ThisPage->Footer(2);?>
</body>

</html>