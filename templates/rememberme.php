<?php
$token = bin2hex(random_bytes(32));
$id = $idextract["id"];
//echo $token;
$update = "UPDATE Clients SET token = '$token' WHERE id = '$id'";


//$check = "SELECT token FROM CLients WHERE token = '$token'";
//$checkexist = $conn->query($check);
//$counter = 0;

mysqli_query($conn, $update);

setcookie("remembertoken", $token, time() + (86400 * 30), "/");
//var_dump($_COOKIE["remembertoken"]);

//while($row = $checkexist->fetch_assoc()){
//    $counter++;
//    echo 9;
//}
//if($counter > 0){
//    $execute = $conn->query($update);
//    setcookie("remembertoken", $token, time() + (60 * 1), "/");
//} else if($counter == 0){
//    mysqli_query($conn, $insert);
//    setcookie("remembertoken", $token, time() + (60 * 1), "/");
//}

?>