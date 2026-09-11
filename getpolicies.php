<?php require_once("DataBankConnect/db.php");?>
<?php
    $userid = $_GET["userid"];
    $compid = $_GET["compid"];

    $please = "SELECT * FROM ValueWH WHERE comp_id = '$compid'";
    $transmit = $conn->query($please);

    //$polnamerequest = "SELECT HKEY_LOCAL_MACHINE.policy_name FROM HKEY_LOCAL_MACHINE LEFT JOIN ValueWH ON HKEY_LOCAL_MACHINE.id = ValueWH.policy_id AND HKEY_LOCAL_MACHINE.directory = ValueWH.directory WHERE ValueWH.comp_id = '$compid'";
    //$send = $conn->query($polnamerequest);

    header('Content-Type: application/json; charset=utf-8');
    $data = [];

    while($read = $transmit->fetch_assoc()){
        //$polname = $send->fetch_assoc();

        $poldirectiry = $read["directory"];
        $polid = $read["policy_id"];

        $namerequest = "SELECT policy_name, data_type FROM $poldirectiry WHERE id = '$polid'";
        $request = $conn->query($namerequest);
        $save = $request->fetch_assoc();

        $data[] = ["UserID" => $userid, "CompID" => $read["comp_id"], "Directory" => $read["directory"], "PolicyValue" => $read["policy_value"], "PolicyPath" => $read["policy_path"], "PolicyName" => $save["policy_name"], "DataType" => $save["data_type"]];
//        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    echo json_encode($data, JSON_PRETTY_PRINT);
?>