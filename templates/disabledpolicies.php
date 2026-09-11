<?php
    $disdirectory = $_POST["disdirectory"];
    $compid = $_POST["compid"];
    $compnamerequest = "SELECT compname FROM comps WHERE id = '$compid'";
    $sendrequest = $conn->query($compnamerequest);
    $compname = $sendrequest->fetch_assoc();
?>

<div class="window-layout">
    <div class="window" style="background-color: white">

        <form action="https://remotepoliciesmanagement.de/try.php" method="post">
            <input type="hidden" name="compid" value="<?php echo $compid?>">
            <button type="submit" name="directory" value="<?php echo $disdirectory?>">Zurück</button>
        </form>

        <br><h4><div style="text-decoration: underline"><?php echo $disdirectory?></div></h4>
        <br><h3><div style="text-decoration: underline"><?php echo $compname["compname"]?></div></h3>
        <br><h1><div style="text-decoration: underline">Disabled Policies</div></h1><br><br>

            <?php
                $findallpol = "SELECT id, policy_name FROM $disdirectory";
                $find = $conn->query($findallpol);
//                $allpol = $find->fetch_assoc();
                $allpolmas[][] = 0;

                $j = 0;
                while($allpol = $find->fetch_assoc()){
                    $allpolmas[$j][0] = $allpol["id"];
                    $allpolmas[$j][1] = $allpol["policy_name"];
                    $j++;
                }

                $workingpol = "SELECT * FROM ValueWH WHERE ValueWH.comp_id = '$compid' AND ValueWH.directory = '$disdirectory'";
                $send = $conn->query($workingpol);
                $workingpolmas[] = 0;

                $j = 0;
                while($dispol = $send->fetch_assoc()){
                    $workingpolmas[$j] = $dispol["policy_id"];
                    $j++;
                }

                for($i = 0; $i < count($allpolmas); $i++):
            ?>
                <?php
                    $count = 0;
//                    var_dump($allpol["id"]);
//                    var_dump($allpolmas);
//                    var_dump($dispol);
//                    echo count($allpol);
                    for($j = 0; $j < count($workingpolmas); $j++):
                ?>
                    <?php
                        if($workingpolmas[$j] == $allpolmas[$i][0]){
                            $count++;
                        }
                    ?>

                <?php endfor;?>

                        <?php if($count == 0):?>
                            <form action="https://remotepoliciesmanagement.de/try.php" method="post">
                                <div class="input" style="color: red">
                                    <h3><?php echo $allpolmas[$i][1]?></h3>
                                    <input type="hidden" name="compid" value="<?php echo $compid?>">
                                    <input type="hidden" name="policy_name" value="<?php echo $allpolmas[$i][1]?>">
                                    <button type="submit" name="policy_directory" value="<?php echo $_POST["disdirectory"]?>">Apply</button>
                                </div>
                            </form>
                        <?php endif;?>

<!--                --><?php //endfor;?>

            <?php endfor;?>

    </div>
</div>


<!--Сделать так, что бы с включенной политикой сверялись все доступные-->

<!--SELECT * FROM $disdirectory LEFT JOIN ValueWH ON $disdirectory.directory = ValueWH.directory WHERE ValueWH.comp_id = $compid AND ValueWH.policy_value IS NULL-->
<!--WHERE ValueWH.id IS NULL-->
<!--WHERE ValueWH.policy_value IS NULL AND ValueWH.comp_id IS NULL-->
<!--WHERE ValueWH.comp_id IS NULL OR ValueWH.comp_id != '$compid' OR ValueWH.directory != '$disdirectory'-->
<!--$disdirectory.policy_name-->