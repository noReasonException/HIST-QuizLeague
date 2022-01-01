<?php

    class SomethingGoneWrong{
        function __construct($ImagePath,$Text)
        {
            echo '<div class="SomethingGoneWrong">
            <img src="'.$ImagePath.'"></img>
                <span>'.$Text.'</span>
            </div>';
        }
    }
    ?>