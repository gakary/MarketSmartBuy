<html>
    <head>
        <?php session_start(); ?>
        <link rel="stylesheet" type="text/css" href="css/profile.css">
        <link href="assets/css/basic.css" rel="stylesheet" />
    </head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Profile</h1>
            </div>
        </div>
        <div style="width:90%; margin: auto;">
            <?php
                include 'sql_conn.php';
                $conn = conn();
                $sql = "SELECT * FROM stall where skID = ".$_SESSION['ID'];
                $rs = mysqli_query($conn, $sql);
                while($rc = mysqli_fetch_assoc($rs)){
                    $stallname = $rc['StallName'];
                    $location = $rc['Location'];
                    $tel = $rc['Tel'];
                    $hour = $rc['BusinessHours'];
                }
            ?>
            <form method="POST" action="S_SEdit.php">
                <p>Stall Name<br><input type="text" id="stallname" name="stallname" value="<?php echo($stallname); ?>" required disabled></p>
                <p>Location<br><input type="text" id="location" name="location" value="<?php echo($location); ?>" required disabled></p>
                <p>Tel<br><input type="text" id="tel" name="tel" value="<?php echo($tel); ?>" required disabled></p>
                <p>Opening hour<br><input type="text" id="hour" name="hour" value="<?php echo($hour); ?>" required disabled></p>
                <div id="buttons">
                    <button id="edit" name="edit" type="button" onclick="this.style.display = 'none'; document.getElementById('submit').style.display = 'block'; 
                    document.getElementById('stallname').disabled = false;
                    document.getElementById('location').disabled = false;
                    document.getElementById('tel').disabled = false;
                    document.getElementById('hour').disabled = false; ">Edit</button>
                    <button id="submit" name="submit" type="submit" style="display: none;" onclick="this.style.display = 'none';
                    document.getElementById('edit').style.display = 'block';">Submit</button>
                </div>
            </form>
        </div>
    </body>

</html>