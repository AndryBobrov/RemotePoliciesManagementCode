<?php
    $directory = $_POST["policy_directory"];
    $compid = $_POST["compid"];
    $compnamerequest = "SELECT compname FROM comps WHERE id = '$compid'";
    $sendrequest = $conn->query($compnamerequest);
    $compname = $sendrequest->fetch_assoc();
    $policyname = $_POST["policy_name"];
?>

<div class="window-layout">
    <div class="window" style="background-color: white">

        <form action="https://remotepoliciesmanagement.de/try.php" method="post">
            <input type="hidden" name="compid" value="<?php echo $compid?>">
            <button type="submit" name="disdirectory" value="<?php echo $directory?>">Zurück</button>
        </form>

        <br><h4><div style="text-decoration: underline"><?php echo $directory?></div></h4>
        <br><h3><div style="text-decoration: underline"><?php echo $compname["compname"]?></div></h3>
        <br><h1><div style="text-decoration: underline"><?php echo $policyname?></div></h1><br><br>

        <form action="https://remotepoliciesmanagement.de/try.php" method="post">

            <?php
            $finddispol = "SELECT id, policy_path, data_type FROM $directory WHERE policy_name = '$policyname'";
            $send = $conn->query($finddispol);
            $dispol = $send->fetch_assoc();
            ?>

                    <div class="input">

                        <h3>Value</h3>

                        <?php if ($dispol["data_type"] == "DWord"):?>

                            <input type="text" name="policyvalue" id="policyvalue" inputmode="numeric" onkeydown="if(event.key === ' ') return false;" value="<?php echo isset($_POST['policyvalue']) ? htmlspecialchars($_POST['policyvalue']) : ''; ?>" required>

                            <script>

                                const input = document.getElementById('policyvalue');

                                input.addEventListener('input', () => {input.value = input.value.replace(/\D/g, '');});

                            </script>

                        <?php elseif ($dispol["data_type"] == "String"):?>
                            <input type="text" name="policyvalue" onkeydown="if(event.key === ' ') return false;" value="<?php echo isset($_POST['policyvalue']) ? htmlspecialchars($_POST['policyvalue']) : ''; ?>" required>
                        <?php endif;?>

<!--                        <input type="hidden" name="compid" value="--><?php //echo $compid?><!--">-->
<!--                        <button type="submit" name="machinevalue" value="--><?php //echo $_POST["applynewmachinepolicies"]?><!--">Apply</button>-->

                        <div class="buttonbutton">
                            <input type="hidden" name="compid" value="<?php echo $compid?>">
                            <input type="hidden" name="policy_id" value="<?php echo $dispol["id"]?>">
                            <input type="hidden" name="end_directory" value="<?php echo $_POST["policy_directory"]?>">
                            <input type="hidden" name="policy_path" value="<?php echo $dispol["policy_path"]?>">

                            <input type="hidden" name="directory" value="<?php echo $directory?>">

                            <button type="submit"><div class="button"><h4>Apply</h4></div></button>
                        </div>

                    </div>

        </form>
    </div>
</div>

<!--pattern="^[^\s]+$" - дает ввести символ, но не дает отправить форму с запрещенным символом-->

<!--onkeydown="if(event.key === ' ') return false;" - не дает ввести поределенный символ, символ не вводится-->