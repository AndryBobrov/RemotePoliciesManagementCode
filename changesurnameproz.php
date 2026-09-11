

<?php require_once("templates/headertext.php");?>

<?php
if (isset($_POST['surname']) && !empty(trim($_POST['surname']))):
    ?>

    <?php
    require_once("DataBankConnect/db.php");
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $surname = trim($_POST["surname"]);
        $token = $_COOKIE["remembertoken"];
        $counter = 0;

        $mysql = "UPDATE Clients SET Surname = '$surname' WHERE token = '$token'";

        mysqli_query($conn, $mysql);
        echo "Record Created";

        $conn->close();
    }
    ?>

    <?php require_once("templates/changesuccess.php");?>

<?php else:?>

    <?php require_once("templates/changesurname.php");?>

<?php endif;?>

<?php require_once("templates/footer.php");?>