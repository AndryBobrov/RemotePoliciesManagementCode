<?php
    $comp = $_POST["deletecomps"];

        $compsrequest = "DELETE FROM comps WHERE id = '$comp'";
        mysqli_query($conn, $compsrequest);

        $valuesrequest = "DELETE FROM ValueWH WHERE comp_id = '$comp'";
        mysqli_query($conn, $valuesrequest);

        $userscompsrequest = "DELETE FROM userscomps WHERE compid = '$comp'";
        mysqli_query($conn, $userscompsrequest);

?>
