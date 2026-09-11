
    <div class="window-layout">

        <div class="window" style="background-color: white">

            <br><br><div style="text-decoration: underline"><h1>Name Ändern</h1></div><br><br><br><br><br><br>

            <form action="https://remotepoliciesmanagement.de/changenameproz.php" method="post"><h3>
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

                        </div>
                        <div>
                            <input type="text" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                        </div>

                    </div><br><br><br>

                    <div class="buttonbutton">
                        <button type="submit"><div class="button"><h4>Bestätigen</h4></div></button>
                    </div>

                </h3></form>

        </div>

    </div>
