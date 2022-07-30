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
                $sql = "SELECT * FROM client where cID = ".$_SESSION['ID'];
                $rs = mysqli_query($conn, $sql);
                $username = null;
                $password = null;
                $email = null;
                while($rc = mysqli_fetch_assoc($rs)){
                    $username = $rc['Username'];
                    $password = $rc['Password'];
                    $email = $rc['Email'];
                    $phone = $rc['PhoneNum'];
                }
            ?>
            <form method="POST" action="C_PEdit.php">
                <input type="hidden" name="action" value="edit_service">
                <input type="hidden" name="o_type" value="<%=id%>">
                <p>Username<br><input type="text" id="username" name="username" value="<?php echo($username); ?>" required disabled></p>
                <p>Password<br><input type="password" id="password" name="password" value="<?php echo($password); ?>" required disabled></p>
                <p>Email<br><input type="text" id="email" name="email" value="<?php echo($email); ?>" required disabled></p>
                <p>Phone No.<br><input type="text" id="phone" name="phone" value="<?php echo($phone); ?>" required disabled></p>
                <div id="buttons">
                    <button id="edit" name="edit" type="button" onclick="this.style.display = 'none'; document.getElementById('submit').style.display = 'block'; 
                    document.getElementById('username').disabled = false;
                    document.getElementById('password').disabled = false;
                    document.getElementById('email').disabled = false;
                    document.getElementById('phone').disabled = false; ">Edit</button>
                    <button id="submit" name="submit" type="submit" style="display: none;" onclick="this.style.display = 'none';
                    document.getElementById('edit').style.display = 'block';">Submit</button>
                </div>
            </form>
        </div>
    </body>
</html>