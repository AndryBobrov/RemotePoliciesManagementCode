<?php
    $request = "SELECT ProfPic FROM Clients WHERE token = '$token'";
    $send = $conn->query($request);
    $get = $send->fetch_assoc();

    $pathpart = $_SERVER["DOCUMENT_ROOT"] . "/profilepictures/";
    $img = "/profilepictures/" . $get["ProfPic"];

    ini_set('upload_max_filesize', '10M');
    ini_set('post_max_size', '12M');
?>

<div class="window-layout">

    <div class="window" style="background-color: white">

        <br><br><div style="text-decoration: underline"><h1>Personal Data</h1></div><br><br>

        <div>

            <div><img src="<?php echo $img;?>" alt="ProfPic" width="150"></div>
            <br>

            <?php if(!isset($_FILES["profilepic"])):?>

                <form action="https://remotepoliciesmanagement.de/try.php" method ="post" enctype="multipart/form-data">
                    <input type="file" name="profilepic" accept="image/png, image/jpg, image/jpeg">

                    <button type="submit">Bestätigen</button>
                </form>

                <br><br><br>

            <?php elseif(isset($_FILES["profilepic"]) && empty($_FILES["profilepic"]["name"])):?>

                <form action="https://remotepoliciesmanagement.de/try.php" method ="post" enctype="multipart/form-data">
                    <input type="file" name="profilepic" accept="image/png, image/jpg, image/jpeg">

                    <button type="submit"> Bestätigen</button>
                </form>

                <p style="color: red">No Input</p>

                <br><br>
            <?php else:?>

                <form action="https://remotepoliciesmanagement.de/try.php" method ="post" enctype="multipart/form-data">
                    <input type="file" name="profilepic" accept="image/png, image/jpg, image/jpeg">

                    <button type="submit">Bestätigen</button>
                </form>

                <br><br><br>

            <?php endif;?>


            <?php echo $name;?>
            <div><a href="/changenameproz.php">Namen ändern</a></div>
            <br><br><br>
            <?php echo $surname;?>
            <div><a href="/changesurnameproz.php">Nachnamen ändern</a></div>
            <br><br><br>
            <?php echo $email;?>
            <div><a href="/emailchangeproz.php">Email ändern</a></div>
            <br><br><br>
            <?php echo "**********";?>
            <div><a href="/changepassproz.php">Passwort ändern</a></div>




            <br><br><br>
            <h3><a href="templates/logout.php">Logout</a></h3>

        </div>

    </div>

    <div class="window" style="background-color: white">

        <br><br><div style="text-decoration: underline"><h1>Manage Policies</h1></div><br><br><br><br>

        <div>
            <form action="https://remotepoliciesmanagement.de/try.php" method="post">
                <div class="windowitems">
                    <div>
                        <?php
                            $useridrequest = "SELECT id FROM Clients WHERE token = '$token'";
                            $useridgrab = $conn->query($useridrequest);
                            $useridget = $useridgrab->fetch_assoc();

                            $userid = $useridget["id"];

                            $compnamerequest = "SELECT compname, id FROM comps JOIN userscomps ON comps.id = userscomps.compid WHERE userscomps.userid = '$userid'";
                            $compnamesget = $conn->query($compnamerequest);
                            while($compnames = $compnamesget->fetch_assoc()):
                        ?>

                            <div class="input" style="text-decoration: underline">

                                <h3><?php echo $compnames["compname"]?></h3>

                                <div class="labels2"><button type="submit" name="selectfolder" value="<?php echo $compnames["id"]?>">Manage Policies</button></div>

                                <div class="labels2"><button type="submit" name="deletecomps" value="<?php echo $compnames["id"]?>" style="background-color: indianred">Computer Entfernen</button></div>
                            </div>

                        <?php endwhile;?>

                    </div>

                </div>



            </form>

            <br><br><br>

            <?php if(!isset($_POST["compname"])):?>

                <form action="https://remotepoliciesmanagement.de/try.php" method="post">
                    <div class="input">
                        <div class="labels">Name:</div>

                        <input type="text" name="compname">
                        <button type="submit">Bestätigen</button>

                    </div>
                </form>

            <?php elseif(isset($_POST["compname"]) && empty($_POST["compname"])):?>
                <form action="https://remotepoliciesmanagement.de/try.php" method="post">
                    <div class="input">
                        <div class="labels">Name:</div>

                        <input type="text" name="compname">
                        <button type="submit">Bestätigen</button>

                    </div>
                </form>

                <p style="color: red">No Input</p>

            <?php elseif($counter != 0):?>
                <form action="https://remotepoliciesmanagement.de/try.php" method="post">
                    <div class="input">
                        <div class="labels">Name:</div>

                        <input type="text" name="compname">
                        <button type="submit">Bestätigen</button>

                    </div>
                </form>

                <p style="color: red">Name Unavailable</p>

            <?php else:?>

                <form action="https://remotepoliciesmanagement.de/try.php" method="post">
                    <div class="input">
                        <div class="labels">Name:</div>

                        <input type="text" name="compname">
                        <button type="submit">Bestätigen</button>

                    </div>
                </form>

            <?php endif;?>

            <br><br><br><br><br>

<!--            <h3><a href="deletecompinterface.php">Computer Entfernen</a></h3>-->

        </div>

    </div>

</div>

<!--SELECT comps.compname FROM comps JOIN userscomps ON comps.id = userscomps.compid WHERE userscomps.userid = 46;-->
<!--$_FILES[]["error"] === UPLOAD_ERR_OK = проверка ошибки не загруженного файла-->
<!--move_uploaded_file()-->
