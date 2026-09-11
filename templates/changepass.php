<!--!!!Доделать!!!-->
<div class="window-layout">

    <div class="window" style="background-color: white">

        <br><br><div style="text-decoration: underline"><h1>Neues Passwort Setzen</h1></div><br><br><br><br><br><br>

        <form action="https://remotepoliciesmanagement.de/changepassproz.php" method="post"><h3>
                <div class="input">

                    <div class="labels2">
                        <?php
                        if (!isset($_POST['passwort'])):
                            ?>
                            Passwort:<br><br><br>
                        <?php elseif (isset($_POST['passwort']) && empty(trim($_POST['passwort'])) || !password_verify($_POST["passwort"], $passold["Passwort"])):?>
                            <p style="color: red">Passwort:</p><br><br>
                        <?php else:?>
                            Passwort:<br><br><br>
                        <?php endif;?>

                        <?php
                        if (!isset($_POST['passnew'])):
                            ?>
                            Passwort Neu:<br><br><br>
                        <?php elseif (isset($_POST['passnew']) && empty(trim($_POST['passnew']))):?>
                            <p style="color: red">Passwort Neu:</p><br><br>
                        <?php else:?>
                            Passwort Neu:<br><br><br>
                        <?php endif;?>

                    </div>
                    <div>
                        <input type="password" name="passwort">

                        <br><br><br>

                        <input type="password" name="passnew">
                    </div>

                </div><br><br><br>

                <div class="buttonbutton">
                    <button type="submit"><div class="button"><h4>Bestätigen</h4></div></button>
                </div>

            </h3></form>

    </div>

</div>
