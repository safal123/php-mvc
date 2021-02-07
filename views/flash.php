<?php 
    if(isset($_SESSION["message"])){
        echo '
            <div class="alert alert-info mt-2" role="alert">
                <div class="">
                    '.$_SESSION["message"].'
                </div>
            </div>
        ';
    } 
?>