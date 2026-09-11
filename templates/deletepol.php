<?php
    $polid = $_POST["poldelete"];
    $poldirectory = $_POST["mandirectory"];
    $compid = $_POST["mancompid"];

    $deletepolrequest = "DELETE FROM ValueWH WHERE comp_id = '$compid' AND directory = '$poldirectory' AND policy_id = '$polid'";
    mysqli_query($conn, $deletepolrequest);

?>