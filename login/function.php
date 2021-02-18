<?php
//checking login session timeout
function isLoginSessionExpired(){
    $login_session_duration = 10;
    $current_time = time();
    $session_life = time()-$_SESSION['loggedin_time'];

    if(isset($_SESSION['loggedin_time']) and isset($_SESSION["uid"])){
        //logout if session_life is greater than login_session_duration
        if($session_life > $login_session_duration){
            return true;
        }
        return false;
    }
}


?>