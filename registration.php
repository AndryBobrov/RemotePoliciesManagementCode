

<?php require_once("templates/header.php");?>

    <?php
        if (isset($_POST['name']) && !empty(trim($_POST['name'])) && isset($_POST['surname']) && !empty(trim($_POST['surname'])) && isset($_POST['email']) && !empty(trim($_POST['email'])) && isset($_POST['passwort'])
            && !empty(trim($_POST['passwort'])) && isset($_POST['passrepeat']) && !empty(trim($_POST['passrepeat'])) && $_POST['passwort'] == $_POST['passrepeat']):
    ?>

            <?php
            require_once("DataBankConnect/db.php");
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $name = trim($_POST["name"]);
                $surname = trim($_POST["surname"]);
                $email = trim($_POST["email"]);
                $passwort = $_POST["passwort"];
                $passrepeat = $_POST["passrepeat"];
                $counter = 0;

                $hash = password_hash($passwort, PASSWORD_DEFAULT);

                //  Вставка в БД
                //$stmt = $pdo->prepare("INSERT INTO Clients (Name, Surname, Email, Password) VALUES (?, ?, ?, ?)");

                //$stmt->execute([$name, $surname, $email, $hash]);
                $mysql = "INSERT INTO Clients (Name, Surname, Email, Passwort) VALUES ('$name', '$surname', '$email', '$hash')";
                $checkexist = "SELECT * FROM Clients WHERE Email = '$email'";


                $sendcheck = $conn->query($checkexist);
                while($row = $sendcheck->fetch_assoc()) {
                    $counter++;
                    echo '3';
                }
                if ($counter > 0) {
                    echo "Error. Account Duplication";
                    die;
                } else if($counter == 0) {
                    mysqli_query($conn, $mysql);
                    echo "Record Created";
                }

                $grabber = "SELECT id, Email FROM Clients WHERE Email = '$email'";
                $idgrab = $conn->query($grabber);
                $idextract = $idgrab->fetch_assoc();
                
                require_once("templates/rememberme.php");
//                require_once("templates/sessionstart.php");

                $conn->close();
            }
            ?>

            <?php require_once("templates/regsuccess.php");?>

    <?php else:?>

            <?php require_once("templates/reg.php");?>

    <?php endif;?>

<?php require_once("templates/footer.php");?>