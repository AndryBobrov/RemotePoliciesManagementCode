

<?php require_once("templates/headertext.php");?>

<?php
if (isset($_POST['name']) && !empty(trim($_POST['name']))):
    ?>

    <?php
    require_once("DataBankConnect/db.php");
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = trim($_POST["name"]);
        $token = $_COOKIE["remembertoken"];
        $counter = 0;

        $mysql = "UPDATE Clients SET Name = '$name' WHERE token = '$token'";

            mysqli_query($conn, $mysql);
            echo "Record Created";

        $conn->close();
    }
    ?>

    <?php require_once("templates/changesuccess.php");?>

<?php else:?>

    <?php require_once("templates/changename.php");?>

<?php endif;?>

<?php require_once("templates/footer.php");?>