<html>
    <head>
        <?php session_start(); ?>
        <link rel="stylesheet" type="text/css" href="css/profile.css">
        <link href="assets/css/basic.css" rel="stylesheet" />
    </head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Create shopkeepr account</h1>
            </div>
        </div>
        <div style="width:90%; margin: auto;">
            <form method="POST" action="A_Cskac.php">
                <p>Username<br><input type="text" id="username" name="username" required></p>
                <p>Password<br><input type="text" id="password" name="password" required></p>
                <p>Stall Name<br><input type="text" id="stallname" name="stallname" required></p>
                <p>Location<br><input type="text" id="location" name="location" required></p>
                <p>Tel<br><input placeholder="12341234" type="tel" id="tel" name="tel" required></p>
                <p>Opening hour<br><input placeholder="7:00-23:00" type="text" id="hour" name="hour" required></p>
                <div id="buttons">
                    <button id="submit" name="submit" type="submit">Create</button>
                </div>
            </form>
        </div>
    </body>

</html>