
<html>

<?php
include '../../../core/page.php';
$ThisPage = new Page();
$ThisPage->SessionCheckout();
$ThisPage->checkifblocked(3);
header("Content-Type: text/html; charset=utf-8");

?>
<head>
    <title>MainPanel</title>
    <?php $ThisPage->LoadStyles(1);?>
    <link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body onload="greeding();">
<div class="TopMenu">
    <ul>
        <a href="../panel.php"><li>Αρχικό μενού</li></a>
        <a href="../Options/profile.php"><li>Επαγγελματικό προφίλ</li></a>
        <a href="../Options/notes.php"><li>Σημειώσεις</li></a>
        <a href="../Options/mystydents.php"><li>Οι μαθητές μου</li></a>
        <a href="../Options/logoff.php"><li>Αποσύνδεση</li></a>
    </ul>

</div>
<div class="Context">
    <div class="LeftMenu">
        <ul>
            <a href="myquestions.php"><li>Οι ερωτήσεις μου</li></a>
            <a href="createnewquestion.php"><li style="background-color:#7ca593;color:#ffffff;" >Δημιουργία Νέας Ερώτησης</li></a>
            <a href="showprogress.php"><li>Πρόοδος αιτημάτων</li></a>
            <a href="reports.php"><li>Αναφορές/Διορθώσεις</li></a>
            <a href="messages.php"><li>Μυνήματα</li></a>
            <a href="settings.php"><li>Ρυθμίσεις</li></a>
            <a href="about.php"><li>Περί...</li></a>
        </ul>

    </div>
    <div class="MainMenu" style="background: none;">
        <div class="StartMessage">
            Καλωσωρίσατε στον οδηγό γρήγορης εισαγωγής ερώτησης στο Quizleague , <br>
            Με λίγα απλά βήματα θα είμαστε σε θέση να εισάγουμε την ερώτηση μας στο σύστημα<br>
            <form class="NextStep" action="NewQuestion/index.php"><button type="submit">Ας ξεκινήσουμε!</button></form>
        </div>
    </div>
</div>
<?php $ThisPage->Footer(1);?>
</body>

</html>