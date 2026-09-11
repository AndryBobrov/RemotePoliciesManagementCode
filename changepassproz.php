<!--!!!Доделать!!!-->

<?php
require_once("DataBankConnect/db.php");
$token = $_COOKIE["remembertoken"];

$request = "SELECT Passwort FROM Clients WHERE token = '$token'";
$send = $conn->query($request);
$passold = $send->fetch_assoc();

?>


<?php require_once("templates/headertext.php");?>

<?php
if (isset($_POST['passwort']) && !empty(trim($_POST['passwort'])) && isset($_POST['passnew']) && !empty(trim($_POST['passnew'])) && password_verify($_POST["passwort"], $passold["Passwort"])):
    ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $passnew = trim($_POST["passnew"]);
        $hash = password_hash($passnew, PASSWORD_DEFAULT);
        $token = $_COOKIE["remembertoken"];
        $counter = 0;

        $mysql = "UPDATE Clients SET Passwort = '$hash' WHERE token = '$token'";

        mysqli_query($conn, $mysql);

        echo "Pass Changed Successfully";

        $conn->close();
    }
    ?>

    <?php require_once("templates/changesuccess.php");?>

<?php else:?>

    <?php require_once("templates/changepass.php");?>

<?php endif;?>

<?php require_once("templates/footer.php");?>