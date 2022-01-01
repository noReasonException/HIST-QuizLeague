
<html>

<?php
include '../../../core/page.php';
include '../../../core/profile.php';
include '../../../core/UnderConstruction/UC.php';
$ThisPage = new Page();
$ThisPage->SessionCheckout();
$ThisPage->checkifblocked(3);

?>
<head>
    <title>MainPanel</title>
    <?php $ThisPage->LoadStyles(1);?>
    <link rel="stylesheet" href="css/style.css">


</head>
<body onload="greeding();">
<div class="TopMenu">
    <ul>
        <a href="../panel.php"><li>Αρχικό μενού</li></a>
        <a href="profile.php" " ><li style="background-color:#7ca593;color:#ffffff;" >Επαγγελματικό προφίλ</li></a>
        <a href="notes.php"><li>Σημειώσεις</li></a>
        <a href="mystydents.php"><li>Οι μαθητές μου</li></a>
        <a href="logoff.php"><li>Αποσύνδεση</li></a>
    </ul>

</div>
<div class="Context">
    <div class="LeftMenu">
        <ul>
            <a href="../info/myquestions.php"><li>Οι ερωτήσεις μου</li></a>
            <a href="../info/createnewquestion.php"><li>Δημιουργία Νέας Ερώτησης</li></a>
            <a href="../info/showprogress.php"><li>Πρόοδος αιτημάτων</li></a>
            <a href="../info/reports.php"><li>Αναφορές/Διορθώσεις</li></a>
            <a href="../info/messages.php"><li>Μυνήματα</li></a>
            <a href="../info/settings.php"><li>Ρυθμίσεις</li></a>
            <a href="../info/about.php"><li>Περί...</li></a>
        </ul>

    </div>
        <div class="MainMenu">
                 <?php
                    if(isset($_GET['role']) and isset($_GET['id'])){
                        $NewErrorFeatureBox = new NewUnderConstructionFeatureAlertBox();
                    }
                    else{
                        echo '<div class="Label">Το προφίλ μου..</div>';
                        echo '<div class="UserLogs">Συνδεδεμένος ώς ';
                                if(isset($_SESSION['INF_username'])){
                                    echo $_SESSION['INF_username'];
                                }
                                else{
                                    header('Location:index.php?status=1');
                                    die();
                                }
                        echo '</div><br><hr>';
                        echo '<div class="UserInfo">Βασικἐς πληροφορίες..';
                        $Profile = new ShowProfileInfo();
                        echo '</div>';
                    }
                    ?>
        </div>
</div>
<?php $ThisPage->Footer(1);?>
</body>

</html>