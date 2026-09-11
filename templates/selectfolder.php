<?php
$compid = $_POST["selectfolder"];
$compnamerequest = "SELECT compname FROM comps WHERE id = '$compid'";
$sendrequest = $conn->query($compnamerequest);
$compname = $sendrequest->fetch_assoc();

?>

<div class="window-layout">
    <div class="window" style="background-color: white">

        <form action="https://remotepoliciesmanagement.de/try.php" method="post">
            <button type="submit">Zurück</button>
        </form>


        <br><h3><div style="text-decoration: underline"><?php echo $compname["compname"]?></div></h3>
        <br><h1><div style="text-decoration: underline">Select Folder</div></h1><br><br>

        <form action="https://remotepoliciesmanagement.de/try.php" method="post">
            <input type="hidden" name="compid" value="<?php echo $compid?>">
            <button type="submit" name="directory" value="HKEY_LOCAL_MACHINE">HKEY_LOCAL_MACHINE</button>
            <button type="submit" name="directory" value="HKEY_CURRENT_USER">HKEY_CURRENT_USER</button>
        </form>

    </div>
</div>