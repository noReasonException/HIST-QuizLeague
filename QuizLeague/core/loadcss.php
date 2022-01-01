


<?php
    function load($depthoffile){
        $prefix="";
        for($i=0;$i<=$depthoffile-1;$i++){$prefix=$prefix.'../';}
        echo "
            <link rel=\"stylesheet\" type=\"text/css\" href=\"".$prefix."css/style.css\">
            <link rel=\"stylesheet\" type=\"text/css\" href=\"".$prefix."css/panel.css\">
            <link rel=\"stylesheet\" type=\"text/css\" href=\"".$prefix."css/footer.css\">";
    }

    ?>


