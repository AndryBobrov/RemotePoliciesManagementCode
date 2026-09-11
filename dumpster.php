<!---->
<!---->
<?php //require_once("templates/header.php");?>
<!---->
<?php
//    require_once("DataBankConnect/db.php");
//    if($_SERVER["REQUEST_METHOD"] === "POST"){
//        $email = $_POST["email"];
//        $passwort = $_POST["passwort"];
//        $passrepeat = $_POST["passrepeat"];
//        $counter = 0;
//        $hash = password_hash($passwort, PASSWORD_DEFAULT);
//
//        $checkexist = "SELECT * FROM Clients WHERE Email = '$email'";
//        $hashcompare = "SELECT Passwort FROM Clients WHERE Email = '$email'";
//
//        $sendcheck = $conn->query($checkexist);
//        while($row = $sendcheck->fetch_assoc()) {
//            $counter++;
//            echo '3';
//        }
//        if($counter == 1):
////if (isset($_POST['email']) && !empty(trim($_POST['email'])) && isset($_POST['passwort']) && !empty(trim($_POST['passwort'])) && isset($_POST['passrepeat']) && !empty(trim($_POST['passrepeat'])) && $_POST['passwort'] == $_POST['passrepeat']):
//?>
<!---->
<!--    --><?php
//            $docompare = $conn->query($hashcompare);
//            $read = $docompare->fetch_assoc();
//            if(password_verify($passwort, $read["Passwort"])):
//    ?>
<!--            --><?php
//                $grabber = "SELECT id, Email FROM Clients WHERE Email = '$email'";
//                $idgrab = $conn->query($grabber);
//                $idextract = $idgrab->fetch_assoc();
//                require_once("templates/rememberme.php");
//                echo "You Logged In";
//                $conn->close();
//
//                header("Location: /logthankes.php");
//            ?>
<!---->
<!--    --><?php //else:?>
<!--            --><?php
//                require_once("templates/logininterface.php");
//            ?>
<!--    --><?php //endif;?>
<!---->
<?php //elseif($counter == 0):?>
<!---->
<!--     --><?php
//        require_once("templates/logininterface.php");
//     ?>
<!---->
<?php //endif;?>
<!---->
<?php //require_once("templates/footer.php");?>
<!---->
<!--    --><?php
////    require_once("DataBankConnect/db.php");
////    if ($_SERVER["REQUEST_METHOD"] === "POST") {
////
////        $email = trim($_POST["email"]);
////        $passwort = $_POST["passwort"];
////        $passrepeat = $_POST["passrepeat"];
////        $counter = 0;
////
////        $hash = password_hash($passwort, PASSWORD_DEFAULT);
////        echo $hash;
////        //  Вставка в БД
////        //$stmt = $pdo->prepare("INSERT INTO Clients (Name, Surname, Email, Password) VALUES (?, ?, ?, ?)");
////
////        //$stmt->execute([$name, $surname, $email, $hash]);
////
////        $checkexist = "SELECT * FROM Clients WHERE Email = '$email'";
////        $hashcompare = "SELECT Passwort FROM Clients WHERE Email = '$email'";
////
////        $sendcheck = $conn->query($checkexist);
////        while($row = $sendcheck->fetch_assoc()) {
////            $counter++;
////            echo '3';
////        }
////        if ($counter > 1) {
////            echo "Error. Something went wrong";
////            die;
////        }else if($counter == 0){
////            echo "Wrong Data/Account Does Not Exist, Try Again";
////        }else if($counter == 1) {
////            $docompare = $conn->query($hashcompare);
////            $read = $docompare->fetch_assoc();
////            if(password_verify($passwort, $read["Passwort"])){
////                $grabber = "SELECT id, Email FROM Clients WHERE Email = '$email'";
////                $idgrab = $conn->query($grabber);
////                $idextract = $idgrab->fetch_assoc();
////                require_once("templates/rememberme.php");
////                echo "You Logged In";
////            }else{
////                echo "ERROR";
////            }
////
////        }
////
////
////        $conn->close();
////    }
//    ?>
<!---->
<!--<!--    -->--><?php ////header("Location: /logthankes.php")?>
<!---->
<?php ////else:?>
<!---->
<!--<!--    -->--><?php ////require_once("templates/logininterface.php");?>
<!---->
<?php ////endif;?>
<!---->
<?php ////require_once("templates/footer.php");?>


.windowitems{
display: flex;
flex-direction: column;
margin-left: 23px;
margin-bottom: 30px;
}

.inputtest{
display: flex;
flex-direction: row;
}