<?php
    header("Content-Type: text/plain");

    session_start();
    unset($_SESSION["IDUser"]);
    session_destroy();
    header("Location: index.php");
?>