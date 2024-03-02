<?php
if(session_start()){
    session_unset();
    session_destroy();
    header("Location: Login.php");
}
else{
    header("Location: adminDashboard.php");
}


?>