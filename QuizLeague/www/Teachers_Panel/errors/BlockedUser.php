
<html>

<?php
include '../../../core/page.php';
$ThisPage = new Page();


?>
<head>
    <title>MainPanel</title>
    <?php $ThisPage->LoadStyles(1);?>
    <link rel="stylesheet" href="css/style.css">


</head>

    <div class="MainMenu">
        <div class="Message">
            Λόγω προώθησης μη εγκεκριμένου αιτήματος προς τους κεντρικούς διακομιστές μας <br>
            Το αυτόματο σύστημα αποτροπής επιθέσεων αποφάσισε την απόριψη σας <br>
            για τις επόμενες 2 ημέρες.....<br>
            Αν πιστεύετε οτι είναι μια άδικη απόφαση , μπορείτε να επικοινωνήσετε με την υποστήριξη :)
            <div class="Contact" onclick="window.location='../contactform/contactform.php';">Επικοινωνήστε με την υποστήριξη</div>

        </div>
    </div>
</body>

</html>