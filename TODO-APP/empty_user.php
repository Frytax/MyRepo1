<?php

    session_start();

    if(!isset($_SESSION['login_true']))
    {
        header('location: index.php');
        exit();
    }


?>