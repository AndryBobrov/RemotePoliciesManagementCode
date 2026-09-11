
<div class="window-layout">

    <div class="window" style="background-color: white">

        <br><br><div style="text-decoration: underline"><h1>Email Ändern</h1></div><br><br><br><br><br><br>

        <form action="https://remotepoliciesmanagement.de/emailchangeproz.php" method="post"><h3>
                <div class="input">

                    <div class="labels2">
                        <?php
                        if (!isset($_POST['email'])):
                            ?>
                            Email:<br><br><br>
                        <?php elseif (isset($_POST['email']) && empty(trim($_POST['email']))):?>
                            <p style="color: red">Email:</p><br><br>
                        <?php else:?>
                            Email:<br><br><br>
                        <?php endif;?>

                    </div>
                    <div>
                        <input type="text" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>

                </div><br><br><br>

                <div class="buttonbutton">
                    <button type="submit"><div class="button"><h4>Bestätigen</h4></div></button>
                </div>

            </h3></form>

    </div>

</div>
