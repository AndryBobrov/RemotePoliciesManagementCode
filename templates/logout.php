<?php
//    $_COOKIE["remembertoken"] = 0;
    setcookie("remembertoken", "", time() - 1, "/");

    header("Location: /index.php");
    exit;
?>