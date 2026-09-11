<?php
$directory = $_POST["mandirectory"];
$compid = $_POST["mancompid"];
$compnamerequest = "SELECT compname FROM comps WHERE id = '$compid'";
$sendrequest = $conn->query($compnamerequest);
$compname = $sendrequest->fetch_assoc();
$policyname = $_POST["manpolname"];
$policyvalue = $_POST["manpolvalue"];
?>

<div class="window-layout">
    <div class="window" style="background-color: white">

        <form action="https://remotepoliciesmanagement.de/try.php" method="post">
            <input type="hidden" name="compid" value="<?php echo $compid?>">
            <button type="submit" name="directory" value="<?php echo $directory?>">Zurück</button>
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

                    <input type="text" name="change_policyvalue" id="policyvalue" inputmode="numeric" onkeydown="if(event.key === ' ') return false;" value="<?php echo isset($_POST['policyvalue']) ? htmlspecialchars($_POST['policyvalue']) : ''; ?>" required>

                        <script>

                            const input = document.getElementById('policyvalue');

                            input.addEventListener('input', () => {input.value = input.value.replace(/\D/g, '');});

                        </script>

                <?php elseif ($dispol["data_type"] == "String"):?>
                    <input type="text" name="change_policyvalue" onkeydown="if(event.key === ' ') return false;" value="<?php echo isset($policyvalue) ? htmlspecialchars($policyvalue) : ''; ?>" required>
                <?php endif;?>



                <!--                        <input type="hidden" name="compid" value="--><?php //echo $compid?><!--">-->
                <!--                        <button type="submit" name="machinevalue" value="--><?php //echo $_POST["applynewmachinepolicies"]?><!--">Apply</button>-->

                <div class="buttonbutton">
                    <input type="hidden" name="change_compid" value="<?php echo $compid?>">
                    <input type="hidden" name="change_policy_id" value="<?php echo $_POST["polchange"]?>">
                    <input type="hidden" name="change_directory" value="<?php echo $_POST["mandirectory"]?>">

                    <input type="hidden" name="directory" value="<?php echo $directory?>">
                    <input type="hidden" name="compid" value="<?php echo $compid?>">

                    <button type="submit"><div class="button"><h4>Apply</h4></div></button>
                </div>

            </div>

        </form>
    </div>
</div>

<!--pattern="^[^\s]+$" - дает ввести символ, но не дает отправить форму с запрещенным символом-->

<!--onkeydown="if(event.key === ' ') return false;" - не дает ввести поределенный символ, символ не вводится-->