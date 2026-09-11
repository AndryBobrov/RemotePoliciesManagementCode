<?php require_once("templates/header.php")?>

<?php if (isset($_POST['email']) && !empty(trim($_POST['email']))):?>

<?php
    require_once("DataBankConnect/db.php");
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = trim($_POST["email"]);
        $counter = 0;

        $request = "SELECT * FROM Clients WHERE Email = '$email'";
//        $getid = "SELECT id FROM Clients WHERE Email = '$email'";
//
//        $requestid = "";
//        $idextract = "";

        $send = $conn->query($request);

        while($data = $send->fetch_assoc()){
            $counter++;
        }
    }

    if($counter == 1):
?>

    <?php
//    $requestid = $conn->query($getid);
//    $idextract = $requestid->fetch_assoc();
    setcookie("email", $email, time() + (86400 * 30), "/");
    $conn->close();

    header("Location: /loginpt2.php");
    ?>

<?php else:?>

    <?php require_once("templates/logininterface.php");?>

<?php endif;?>


<?php else:?>

    <?php require_once("templates/logininterface.php");?>

<?php endif;?>

<?php require_once("templates/footer.php")?>
