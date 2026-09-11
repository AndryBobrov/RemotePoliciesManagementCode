<?php
//    var_dump($_FILES);
    $where = "/profilepictures";
    $filepath = $where.basename($_FILES["profilepic"]["name"]);
//    echo 1;
    if(move_uploaded_file($_FILES['profilepic']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/profilepictures/" . $_FILES['profilepic']['name'])){
//        require_once("DataBankConnect/db.php");
        $token = $_COOKIE["remembertoken"];
        $picname = $_FILES["profilepic"]["name"];
//        echo $picname;
//        echo $token;

        $requestname = "SELECT ProfPic FROM Clients WHERE token = '$token'";
        $getname = $conn->query($requestname);
        $namesave = $getname->fetch_assoc();

        if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/profilepictures/" . $namesave["ProfPic"])){
            unlink($_SERVER["DOCUMENT_ROOT"] . "/profilepictures/" . $namesave["ProfPic"]);
        }

        $request = "UPDATE Clients SET ProfPic = '$picname' WHERE token = '$token'";

        mysqli_query($conn, $request);

        echo "Successful";
    }else{
        echo "Error";
    }

//    $conn->close();
?>