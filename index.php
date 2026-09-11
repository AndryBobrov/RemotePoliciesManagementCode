<?php
    require_once("DataBankConnect/db.php");
    $token = $_COOKIE["remembertoken"];
    $check = "SELECT * FROM Clients WHERE token = '$token'";
    $send = $conn->query($check);
    $counter = 0;

    while($checking = $send->fetch_assoc()){
        $counter++;
    }

    $conn->close();

if($counter == 1){
    require_once("templates/headerloggedin.php");
} else if($counter == 0){
    require_once("templates/header.php");
} else{
    echo "ERROR";
}
?>

<?php require_once("templates/intro.php");?>

<?php require_once("templates/footer.php");?>
