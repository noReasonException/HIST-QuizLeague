
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
    <?php $ThisPage->LoadStyles(2)?>
    <link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body>
<div class="TopMenu">
    <ul>
        <a href="../../panel.php"><li >Αρχικό μενού</li></a>
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
    <div class="MainMenu" style="background: none;">
        <div class="QuestionGetInfo">
            Επιλέξτε είδος σχολείου...<br>
            <?php
            $ShowChoicesStatus = ShowChoices('ConfirmButton','schooltype_id','schooltype_name','select schooltype_id,schooltype_name from schooltypes;');
            if($ShowChoicesStatus==1){
                EchoConfirmButton('setdirection.php');
                AddCategoryButton(1,'Προσθήκη Είδους σχολείου');
            }
            else{
                $ThisError = new NewError("Δεν υπάρχουν δεδομένα σε αυτήν την κατηγορία...",["Επιστροφή στην αρχική σελίδα"=>"../../panel.php","Επικοινωνήστε με την υποστήριξη"=>"../index.php","Δημιουργία Νέας κατηγορίας!"=>"../index.php"]);
            }
            ?>

        </div>

    </div>
</div>
<?php $ThisPage->Footer(2);?>
</body>

</html>