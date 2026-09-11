<?php
    $compname = $_POST["compname"];
    $token = $_COOKIE["remembertoken"];

    $clientidrequest = "SELECT id FROM Clients WHERE token = '$token'";
    $clientidgrab = $conn->query($clientidrequest);
    $clientidsave = $clientidgrab->fetch_assoc();
    $clientid = $clientidsave["id"];
    echo $clientid;
    $compsinsert = "INSERT INTO comps (compname) VALUES ('$compname')";
    mysqli_query($conn, $compsinsert);

    $compidrequest = "SELECT id FROM comps WHERE compname = '$compname'";
    $compidgrab = $conn->query($compidrequest);

    while($compidsave = $compidgrab->fetch_assoc()){
        $compid = $compidsave["id"];
    }

//    $compidsave = $compidgrab->fetch_assoc();
//    $compid = $compidsave["id"];
    echo $compid;
    $userscompsinsert = "INSERT INTO userscomps (userid, compid) VALUES ('$clientid', '$compid')";
    mysqli_query($conn, $userscompsinsert);

?>