<div class="window-layout">

    <div class="window" style="background-color: white">

        <br><br><div style="text-decoration: underline"><h1>Login</h1></div><br><br><br><br><br><br>

        <form action="https://remotepoliciesmanagement.de/login.php" method="post"><h3>
                <div class="input">

                    <div class="labels2">
                        <?php
                        if (!isset($_POST['email'])):
                            ?>
                            Email:<br><br><br>
                        <?php elseif (isset($_POST['email']) && empty(trim($_POST['email']))):?>
                            <p style="color: red">Email:</p><br><br>
                        <?php elseif($counter == 0):?>
                            <p style="color: red">Email:</p><br><br>
                        <?php else:?>
                            Email:<br><br><br>
                        <?php endif;?>

                    </div>

                    <?php if (!isset($_POST['email'])):?>
                    <div>
                        <input type="text" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>
                    <?php elseif (isset($_POST['email']) && empty(trim($_POST['email']))):?>
                    <div>
                        <input type="text" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                        <div style="color: red"><h4>Eingabe fehlt</h4></div><br><br>
                    </div>
                    <?php elseif ($counter == 0):?>
                    <div>
                        <input type="text" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                        <div style="color: red"><h4>Account existiert nicht</h4></div>
                    </div>
                    <?php endif;?>


                </div><br><br><br>

                <div class="buttonbutton">
                    <button type="submit"><div class="button"><h4>Bestätigen</h4></div></button>
                </div>

            </h3></form>

    </div>

</div>