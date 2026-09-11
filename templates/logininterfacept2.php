<div class="window-layout">

    <div class="window" style="background-color: white">

        <br><br><div style="text-decoration: underline"><h1>Login</h1></div><br><br><br><br><br><br>

        <form action="https://remotepoliciesmanagement.de/loginpt2.php" method="post"><h3>
                <div class="input">

                    <div class="labels2">

                        Email:<br><br><br>

                        <?php
                        if (!isset($_POST['passwort'])):
                            ?>
                            Passwort:<br><br><br>
                        <?php elseif (isset($_POST['passwort']) && empty(trim($_POST['passwort']))):?>
                            <p style="color: red">Passwort:</p><br><br>
                        <?php elseif(!password_verify($_POST["passwort"], $passdb["Passwort"])):?>
                            <p style="color: red">Passwort:</p><br><br>
                        <?php else:?>
                            Passwort:<br><br><br>
                        <?php endif;?>

                    </div>

                    <?php if(!isset($_POST["passwort"])):?>
                        <div>
                            <?php echo $_COOKIE["email"];?><br><br><br>
                            <input type="password" name="passwort">
                        </div>
                    <?php elseif(isset($_POST['passwort']) && empty(trim($_POST['passwort']))):?>
                        <div>
                            <?php echo $_COOKIE["email"];?><br><br><br>
                            <input type="password" name="passwort">
                            <div style="color: red"><h4>Eingabe fehlt</h4></div>
                        </div>
                    <?php elseif(!password_verify($_POST["passwort"], $passdb["Passwort"])):?>
                        <div>
                            <?php echo $_COOKIE["email"];?><br><br><br>
                            <input type="password" name="passwort">
                            <div style="color: red"><h4>Falsches Passwort</h4></div>
                        </div>
                    <?php endif;?>

                </div><br><br><br>

                <div class="buttonbutton">
                    <button type="submit"><div class="button"><h4>Bestätigen</h4></div></button>
                </div>

            </h3></form>

    </div>

</div>