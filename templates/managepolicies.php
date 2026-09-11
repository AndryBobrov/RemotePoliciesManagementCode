<?php
    $directory = $_POST["directory"];
    $compid = $_POST["compid"];
    $compnamerequest = "SELECT compname FROM comps WHERE id = '$compid'";
    $sendrequest = $conn->query($compnamerequest);
    $compname = $sendrequest->fetch_assoc();
?>

<div class="window-layout">
    <div class="window" style="background-color: white">

        <form action="https://remotepoliciesmanagement.de/try.php" method="post">
            <button type="submit" name="selectfolder" value="<?php echo $compid?>">Zurück</button>
        </form>

        <br><h4><div style="text-decoration: underline"><?php echo $directory?></div></h4>
        <br><h3><div style="text-decoration: underline"><?php echo $compname["compname"]?></div></h3>
        <br><h1><div style="text-decoration: underline">Active Policies</div></h1><br><br>

        <form action="https://remotepoliciesmanagement.de/try.php" method="post">
            <table style="margin-bottom: 30px; width: 100%" width="500">
                <thead>

                    <tr>
                        <th style="text-decoration: underline"><h3>Name</h3></th>
                        <th style="text-decoration: underline"><h3>Value</h3></th>
                        <th></th>
                        <th></th>
                    </tr>

                </thead>
                <tbody>
            <?php
                $findworkingpol = "SELECT policy_name, $directory.id FROM $directory LEFT JOIN ValueWH ON $directory.id = ValueWH.policy_id WHERE ValueWH.comp_id = '$compid' AND ValueWH.directory = '$directory'";
                $send = $conn->query($findworkingpol);
                while($workingpol = $send->fetch_assoc()):
            ?>

                    <?php
//                        var_dump($workingpol);
                        $polid = $workingpol["id"];
                        $policyvalue = "SELECT policy_value FROM ValueWH LEFT JOIN $directory ON ValueWH.policy_id = $directory.id WHERE ValueWH.comp_id = '$compid' AND ValueWH.policy_id = '$polid' AND ValueWH.directory = '$directory'";
                        $ask = $conn->query($policyvalue);
                        $value = $ask->fetch_assoc();
                    ?>

                    <tr>
                        <td><h3><?php echo $workingpol["policy_name"]?>:</h3></td>
                        <td style="color: red"><h3><?php echo $value["policy_value"]?></h3></td>

                        <form action="https://remotepoliciesmanagement.de/try.php" method="post">

                            <td><button type="submit" name="polchange" value="<?php echo $polid?>">Ändern</button></td>

                            <input type="hidden" name="manpolvalue" value="<?php echo $value["policy_value"]?>">
                            <input type="hidden" name="manpolname" value="<?php echo $workingpol["policy_name"]?>">
                            <input type="hidden" name="mancompid" value="<?php echo $compid?>">
                            <input type="hidden" name="mandirectory" value="<?php echo $directory?>">
                        </form>

                        <form action="https://remotepoliciesmanagement.de/try.php" method="post">

                            <td><button style="background-color: indianred" type="submit" name="poldelete" value="<?php echo $polid?>">Entfernen</button></td>

                            <input type="hidden" name="manpolvalue" value="<?php echo $value["policy_value"]?>">
                            <input type="hidden" name="manpolname" value="<?php echo $workingpol["policy_name"]?>">
                            <input type="hidden" name="mancompid" value="<?php echo $compid?>">
                            <input type="hidden" name="mandirectory" value="<?php echo $directory?>">

                            <input type="hidden" name="directory" value="<?php echo $directory?>">
                            <input type="hidden" name="compid" value="<?php echo $compid?>">
                        </form>
                    </tr>

<!--                <div class="input">-->
<!--                    <div class="labels2"></div><h3>--><?php //echo $workingpol["policy_name"]?><!--:</h3>-->
<!--                    <div style="color: red" class="labels2"><h3>--><?php //echo $value["policy_value"]?><!--</h3></div>-->
<!--                </div>-->


            <?php endwhile;?>
                </tbody>
            </table>
        </form>

        <form action="https://remotepoliciesmanagement.de/try.php" method="post">
            <input type="hidden" name="compid" value="<?php echo $_POST["compid"]?>">
            <button type="submit" name="disdirectory" value="<?php echo $_POST["directory"]?>">Apply New Policies</button>
        </form>

    </div>
</div>