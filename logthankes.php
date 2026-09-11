<?php
    require_once("DataBankConnect/db.php");
    $token = $_COOKIE["remembertoken"];

    $request = "SELECT Name FROM Clients WHERE token = '$token'";
    $send = $conn->query($request);
    $name = $send->fetch_assoc();
    $conn->close();
?>

<?php
    require_once("templates/headertext.php");
    require_once("templates/logsuccess.php");
    require_once("templates/footer.php");
?>

