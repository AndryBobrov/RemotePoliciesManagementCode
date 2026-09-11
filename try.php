<?php require_once("DataBankConnect/db.php");?>

<?php require_once("templates/headertext.php");?>

<?php if(isset($_FILES["profilepic"])):?>

    <?php require_once("templates/picupload.php")?>

<?php else:?>

    <?php echo "Add Something"?>

<?php endif;?>



<?php if(isset($_POST['compname']) && !empty(trim($_POST['compname']))):?>

<?php
    $token = $_COOKIE["remembertoken"];
    $useridrequest = "SELECT id FROM Clients WHERE token = '$token'";
    $useridgrab = $conn->query($useridrequest);
    $useridget = $useridgrab->fetch_assoc();

    $userid = $useridget["id"];
    echo $userid;

    $compname = $_POST["compname"];
    $check = "SELECT * FROM comps WHERE compname = '$compname'";
    $checking = $conn->query($check);
    $counter = 0;

    while($fetch = $checking->fetch_assoc()){
        $computerid = $fetch["id"];
        echo $computerid;
        $userscompscheck = "SELECT * FROM userscomps WHERE compid = '$computerid' AND userid = '$userid'";
        $userscompschecking = $conn->query($userscompscheck);

        while($userscompsfetch = $userscompschecking->fetch_assoc()){
            $counter++;
        }
    }

    if($counter == 0):
?>

    <?php require_once("templates/addcomputer.php")?>

<?php else:?>

        <?php echo "Name Unavailable"?>

<?php endif;?>

<?php else:?>

    <?php echo "Insert Name"?>

<?php endif;?>


<?php if(isset($_POST['deletecomps']) && !empty($_POST['deletecomps'])):?>

    <?php require_once("templates/deletecomp.php")?>

<?php endif;?>


<?php if(isset($_POST['poldelete']) && !empty($_POST['poldelete'])):?>

    <?php require_once("templates/deletepol.php")?>

<?php endif;?>


<?php if(isset($_POST['compid']) && !empty($_POST['compid']) && isset($_POST['end_directory']) && !empty($_POST['end_directory']) && isset($_POST['policyvalue']) && $_POST['policyvalue'] !== ''
        && isset($_POST['policy_id']) && !empty($_POST['policy_id']) && isset($_POST['policy_path']) && !empty($_POST['policy_path'])):?>

    <?php
        $compid = $_POST["compid"];
        $policyid = $_POST["policy_id"];
        $directory = $_POST["end_directory"];
        $policyvalue = $_POST["policyvalue"];
        $policypath = $_POST["policy_path"];

        $savepolicy = "INSERT INTO ValueWH (directory, comp_id, policy_id, policy_value, policy_path) VALUES ('$directory', '$compid', '$policyid', '$policyvalue', '$policypath')";
        mysqli_query($conn, $savepolicy);

    ?>

<?php endif;?>



<?php if(isset($_POST['change_compid']) && !empty($_POST['change_compid']) && isset($_POST['change_directory']) && !empty($_POST['change_directory']) && isset($_POST['change_policyvalue'])
    && $_POST['change_policyvalue'] !== '' && isset($_POST['change_policy_id']) && !empty($_POST['change_policy_id'])):?>

    <?php
    $compid = $_POST["change_compid"];
    $policyid = $_POST["change_policy_id"];
    $directory = $_POST["change_directory"];
    $policyvalue = $_POST["change_policyvalue"];

    $editpolicy = "UPDATE ValueWH SET policy_value = '$policyvalue' WHERE comp_id = '$compid' AND directory = '$directory' AND policy_id = '$policyid'";
    mysqli_query($conn, $editpolicy);

    ?>

<?php endif;?>



<?php
//require_once("DataBankConnect/db.php");

$token = $_COOKIE["remembertoken"];
$id = "";
$name = "";
$surname = "";
$email = "";
$password = "";

$extract = "SELECT Name, Surname, Email FROM Clients WHERE token = '$token'";
//!!! строчка запроса неверна

$extractdata = $conn->query($extract);
$read = $extractdata->fetch_assoc();
$name = $read["Name"];
$surname = $read["Surname"];
$email = $read["Email"];

//$dataline = fetch assoc
//$conn->close();
?>


<?php
var_dump($_POST);
    if(!isset($_POST["disdirectory"]) && empty($_POST["disdirectory"]) && !isset($_POST["selectfolder"]) && empty($_POST["selectfolder"])
        && !isset($_POST["directory"]) && empty($_POST["directory"]) && !isset($_POST["policy_directory"]) && empty($_POST["policy_directory"]) && !isset($_POST["polchange"]) && empty($_POST["polchange"])) {

        require_once("templates/userscorner.php");

    } elseif(isset($_POST["selectfolder"]) && !empty($_POST["selectfolder"])){

        require_once("templates/selectfolder.php");

    } elseif(isset($_POST["directory"]) && !empty($_POST["directory"])) {

        require_once("templates/managepolicies.php");

    } elseif(isset($_POST["polchange"]) && !empty($_POST["polchange"])) {

        require_once("templates/adjustpol.php");

    } elseif(isset($_POST["disdirectory"]) && !empty($_POST["disdirectory"])){

        require_once("templates/disabledpolicies.php");

    } elseif(isset($_POST["policy_directory"]) && !empty($_POST["policy_directory"])){

        require_once("templates/setvalue.php");

    }
?>

<?php require_once("templates/footer.php");?>

<?php $conn->close();?>