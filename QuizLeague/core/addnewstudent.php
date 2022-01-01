<?php
class AddNewStudentEntry{

    function __construct()
    {
        echo '<div class="Search"><form action="addnewstudent.php" method="POST" id="SearchForm" ><input id="SearchBox" name="SearchQuery" value="Πληκρολογήστε όνομα για αναζήτηση" onclick="SearchBoxReset();"></form><a class="Searchbutton" onclick="SubmitPrecheck()">Αναζήτηση Μαθητή</a></div>';
        if(isset($_POST['SearchQuery'])){
            echo '<script>document.getElementById("SearchBox").value="'.$_POST['SearchQuery'].'";</script>';
        }
    }
}