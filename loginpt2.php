
<?php require_once("templates/headertext.php");?>

<?php if(isset($_POST["passwort"]) && !empty(trim($_POST["passwort"]))):?>

    <?php if($_SERVER["REQUEST_METHOD"] === "POST"):?>

        <?php
            require_once("DataBankConnect/db.php");
            $email = $_COOKIE["email"];

            $requestpass = "SELECT Passwort FROM Clients WHERE Email = '$email'";
            $send = $conn->query($requestpass);
            $passdb = $send->fetch_assoc();

            if(password_verify($_POST["passwort"], $passdb["Passwort"])):
        ?>

            <?php
                $grabber = "SELECT id, Email FROM Clients WHERE Email = '$email'";
                $idgrab = $conn->query($grabber);
                $idextract = $idgrab->fetch_assoc();

                require_once("templates/rememberme.php");

                setcookie("email", "", time() - 1, "/");

                $conn->close();

                header("Location: /logthankes.php");
//                var_dump(ob_get_level());
//                echo 1;
            ?>

        <?php else:?>

            <?php require_once("templates/logininterfacept2.php");?>

        <?php endif;?>

    <?php endif;?>

<?php else:?>

    <?php require_once("templates/logininterfacept2.php");?>

<?php endif;?>

<?php require_once("templates/footer.php");?>
