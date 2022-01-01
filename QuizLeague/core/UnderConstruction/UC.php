<?php
    class NewUnderConstructionFeatureAlertBox{
        function __construct($depth=0)
        {
            $prefix='../';
            for ($i=0;$i<$depth;$i++){
                $prefix=$prefix.'../';

            }
            echo "
                <div class=\"UnderContruction\">
                <img src=\"".$prefix."img/uc.png\">
                <span>Αυτή η δυνατότητα είναι υπο κατασκευή :( <br>
                    Λυπoύμαστε για αυτό 
                 </span>
                </div>
            ";
        }
    }
?>
