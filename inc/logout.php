<?php

    session_start();
    session_destroy();
    header("location:../LoginValidation/login.php");

?>