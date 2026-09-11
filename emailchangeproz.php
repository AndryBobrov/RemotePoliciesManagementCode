

<?php require_once("templates/headertext.php");?>

<?php
if (isset($_POST['email']) && !empty(trim($_POST['email']))):
    ?>

    <?php
    require_once("DataBankConnect/db.php");
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = trim($_POST["email"]);
        $token = $_COOKIE["remembertoken"];
        $counter = 0;

        $mysql = "UPDATE Clients SET Email = '$email' WHERE token = '$token'";

        mysqli_query($conn, $mysql);
        echo "Record Created";

        $conn->close();
    }
    ?>

    <?php require_once("templates/changesuccess.php");?>

<?php else:?>

    <?php require_once("templates/emailchange.php");?>

<?php endif;?>

<?php require_once("templates/footer.php");?>