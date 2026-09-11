<?php require_once("DataBankConnect/db.php")?>
<?php require_once("templates/headertext.php")?>

<div class="window-layout">
    <div class="window" style="background-color: white">

        <br><br><div style="text-decoration: underline"><h1>Disconnect Computer</h1></div><br><br><br><br>
<?php
$token = $_COOKIE["remembertoken"];

$useridrequest = "SELECT id FROM Clients WHERE token = '$token'";
$useridgrab = $conn->query($useridrequest);
$useridget = $useridgrab->fetch_assoc();

$userid = $useridget["id"];

$compnamerequest = "SELECT compname FROM comps JOIN userscomps ON comps.id = userscomps.compid WHERE userscomps.userid = '$userid'";
$compnamesget = $conn->query($compnamerequest);
//                $compnames = $compnamesget->fetch_assoc();
//                 echo $compnames["compname"];
//               var_dump($compnames);
while($compnames = $compnamesget->fetch_assoc()):
    ?>
    <div class="input">
        <div class="windowitems" style="text-decoration: underline">
            <h3><?php echo $compnames["compname"]?></h3>
        </div>
    </div>
<?php endwhile;?>

        <br><br><br>

        <div class="input">

            <div class="labels2">
                Welchen Computer möchten Sie entkoppeln?
            </div>

            <form action="https://remotepoliciesmanagement.de/try.php" method="post">
                <div class="input">
                    <input type="" name="compname">
                    <button type="submit">Bestätigen</button>

                </div>
            </form>
        </div>

    </div>
</div>

<?php require_once("templates/footer.php")?>