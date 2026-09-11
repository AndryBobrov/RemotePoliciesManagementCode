<?php
    session_start();

    $_SESSION["id"] = $idextract["id"];
    $_SESSION["email"] = $idextract["Email"];

    if(!isset($_SESSION["id"]) && isset($_COOKIE["remembertoken"])){
        $token = $_COOKIE["remembertoken"];

        $dataget = "SELECT * FROM user_tokens WHERE token = '$token'";
        $datagrab = $conn->query($dataget);
        $dataextract = $datagrab->fetch_assoc();

        if($dataextract){
            $_SESSION["id"] = $dataextract["user_id"];
            $id = $_SESSION["id"];

            $emailget = "SELECT Email FROM Clients WHERE id = '$id'";
            $emailgrab = $conn->query($dataget);
            $emailextract = $datagrab->fetch_assoc();

            $_SESSION["email"] = $emailextract["Email"];
        }
    }


    echo "Session Started";
?>