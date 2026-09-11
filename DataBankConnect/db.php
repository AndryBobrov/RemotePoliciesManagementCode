<?php
$host = "localhost";
$dbname = "lena9947_test";
$user = "Andrusha";
$pass = "Cw9&y635g";

//try {
    //$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//} catch (PDOException $e) {
    //die("DB Fehler: " . $e->getMessage());
//}


    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connection Failed" . $conn->connect_error);
    }
//    echo "Connected successfully";
?>