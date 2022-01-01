<?php function echo_footer($place=0){
    $folder_back="";
    for ($i=0;$i<$place;$i++){
        $folder_back=$folder_back."../";
    }

    if($place=="internal"){$folder_back="";}
    echo "
    	<div class=\"Footer\">
		    <div class=\"AdditionalInfo\">
			    <ul>
				    <div class=\"AdditionalInfoHeader\">Find us on...</div>
				    <li><img src=\"".$folder_back."img/GlobalFooter/facebook.png\"> Facebook</li>
				    <li><img src=\"".$folder_back."img/GlobalFooter/twitter.png\"> Twitter</li>
				    <li><img src=\"".$folder_back."img/GlobalFooter/insta.png\"> Instagram</li>
			    </ul>
		    </div>
		    <div class=\"CopyrightText\">
			    Quizleague © 2016-2017 by Athens Coding Scene , All Rights Reserved
		    </div>
	    </div>";

}