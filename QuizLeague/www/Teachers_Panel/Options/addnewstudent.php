
<html>

<?php
include '../../../core/page.php';
include '../../../core/addnewstudent.php';
include '../../../core/getsearchresults.php';
include '../../../core/modalalert.php';
$ThisPage = new Page();
$ThisPage->SessionCheckout();
$ThisPage->checkifblocked(3);


?>
<head>
    <title>MainPanel</title>
    <?php $ThisPage->LoadStyles(1);?>
    <script src="js/addnewstudent.js"></script>
    <script src="js/modal_alert.js"></script>
    <link rel="stylesheet" href="css/style.css">



</head>
<body id="Body">
<div class="TopMenu">
    <ul>
        <a href="../panel.php"><li >Αρχικό μενού</li></a>
        <a href="profile.php"><li>Επαγγελματικό προφίλ</li></a>
        <a href="notes.php"><li  >Σημειώσεις</li></a>
        <a href="mystydents.php"><li style="background-color:#7ca593;color:#ffffff;">Οι μαθητές μου</li></a>
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
        <?php $NewModal = new CreateNewModalAlertBox('Επιλέξτε Μάθημα','schooltype_id','select something!');?>
        <div class="Label">Προσθήκη μαθητών..</div>
        <div class="UserLogs">Συνδεδεμένος ώς <?php if(isset($_SESSION['INF_username'])){echo $_SESSION['INF_username'];}else{header('Location:index.php?status=1');}?></div><br><hr>

        <?php
            $ThisStudentPage=new AddNewStudentEntry();
            if(isset($_POST['SearchQuery'])){
                $ThisStudentPage = new GetSearchResults($_POST['SearchQuery']);
            }
        ?>
    </div>
</div>
</div>
<?php $ThisPage->Footer(1);?>
</body>

</html>