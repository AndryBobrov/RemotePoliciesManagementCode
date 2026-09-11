
<div class="window-layout">
    <div class="window" style="background-color: white">
        <div style="text-decoration: underline"><h1>Danke!</h1></div>
        <div style="text-decoration: underline">Sie haben folgende Daten eingetragen:</div><br><br><br><br><br><br>

        <div class="input">
            <div class="labels2">Name:<br><br><br>Surname<br><br><br>Email:<br><br><br>Passwort:<br><br><br>Passwort wiederholen:</div>
            <div><?php echo $_POST['name']?><br><br><br><?php echo $_POST['surname']?><br><br><br><?php echo $_POST['email']?><br><br><br><?php echo $_POST['passwort']?><br><br><br><?php echo $_POST['passrepeat']?></div>

            <div class="buttonbutton">
                <a href="/index.php" style="text-decoration: none; color: black"><button><h4>Back to Main</h4></button></a>
            </div>

        </div>
    </div>
</div>