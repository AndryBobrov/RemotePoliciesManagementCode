
<div class="window-layout">

    <div class="window" style="background-color: white">

        <br><br><div style="text-decoration: underline"><h1>Nachnamen Ändern</h1></div><br><br><br><br><br><br>

        <form action="https://remotepoliciesmanagement.de/changesurnameproz.php" method="post"><h3>
                <div class="input">

                    <div class="labels2">
                        <?php
                        if (!isset($_POST['surname'])):
                            ?>
                            Nachname:<br><br><br>
                        <?php elseif (isset($_POST['surname']) && empty(trim($_POST['surname']))):?>
                            <p style="color: red">Nachname:</p><br><br>
                        <?php else:?>
                            Nachname:<br><br><br>
                        <?php endif;?>

                    </div>
                    <div>
                        <input type="text" name="surname" value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>">
                    </div>

                </div><br><br><br>

                <div class="buttonbutton">
                    <button type="submit"><div class="button"><h4>Bestätigen</h4></div></button>
                </div>

            </h3></form>

    </div>

</div>
