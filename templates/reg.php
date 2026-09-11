<div class="window-layout">

    <div class="window" style="background-color: white">

        <br><br><div style="text-decoration: underline"><h1>Registration</h1></div><br><br><br><br><br><br>

        <form action="https://remotepoliciesmanagement.de/registration.php" method="post"><h3>
                <div class="input">

                    <div class="labels2">
                        <?php
                            if (!isset($_POST['name'])):
                        ?>
                            Name:<br><br><br>
                        <?php elseif (isset($_POST['name']) && empty(trim($_POST['name']))):?>
                            <p style="color: red">Name:</p><br><br>
                        <?php else:?>
                           Name:<br><br><br>
                        <?php endif;?>

                        <?php
                        if (!isset($_POST['surname'])):
                            ?>
                            Nachname:<br><br><br>
                        <?php elseif (isset($_POST['surname']) && empty(trim($_POST['surname']))):?>
                            <p style="color: red">Nachname:</p><br><br>
                        <?php else:?>
                            Nachname:<br><br><br>
                        <?php endif;?>

                        <?php
                        if (!isset($_POST['email'])):
                            ?>
                            Email:<br><br><br>
                        <?php elseif (isset($_POST['email']) && empty(trim($_POST['email']))):?>
                            <p style="color: red">Email:</p><br><br>
                        <?php else:?>
                            Email:<br><br><br>
                        <?php endif;?>

                        <?php
                        if (!isset($_POST['passwort'])):
                            ?>
                            Passwort:<br><br><br>
                        <?php elseif (isset($_POST['passwort']) && empty(trim($_POST['passwort']))):?>
                            <p style="color: red">Passwort:</p><br><br>
                        <?php else:?>
                            Passwort:<br><br><br>
                        <?php endif;?>

                        <?php
                        if (!isset($_POST['passrepeat'])):
                            ?>
                            Passwort wiederholen:<br><br><br>
                        <?php elseif (
                            isset($_POST['passrepeat']) &&
                            (empty(trim($_POST['passrepeat'])) || $_POST['passwort'] != $_POST['passrepeat'])
                        ):?>
                            <p style="color: red">Passwort wiederholen:</p><br><br>
                        <?php else:?>
                            Passwort wiederholen:<br><br><br>
                        <?php endif;?>

                    </div>
                    <div>
                        <input type="text" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">

                        <br><br><br>

                        <input type="text" name="surname" value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>">

                        <br><br><br>

                        <input type="text" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">

                        <br><br><br>

                        <input type="password" name="passwort">

                        <br><br><br>

                        <input type="password" name="passrepeat">
                    </div>

                </div><br><br><br>

                <div class="buttonbutton">
                    <button type="submit"><div class="button"><h4>Registrieren</h4></div></button>
                </div>

            </h3></form>

    </div>

</div>