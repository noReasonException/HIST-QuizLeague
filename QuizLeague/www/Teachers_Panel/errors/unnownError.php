<?php
class NewError
{
    function __construct($ErrorString, $RedirectButtons/*,$RedirectLinks*/)
    {
        echo $ErrorString;
        echo '<ul class="ErrorButtons">';
        foreach ($RedirectButtons as $Button=>$url){
            echo '<a href="'.$url.'"><li>'.$Button.'</li></a>';
        }
        echo '</ul>';
        die();
        //if($RedirectLink)
    }
}
?>

