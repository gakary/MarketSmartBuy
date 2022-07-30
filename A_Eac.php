<html>
    <head>
        <?php session_start(); ?>
        <link rel="stylesheet" type="text/css" href="css/profile.css">
        <link href="assets/css/basic.css" rel="stylesheet" />
        <style>
            .button{
                width: 200px;
                height: 40px;
                display: inline-block;
                text-transform:uppercase;
                outline:none;
                border:none;
                font-size:20px;
                font-weight:600;
                cursor:pointer;
                opacity: 0.8;
                transition: 0.2s ease-in-out
            }
            #submit{
                background:#23b62f;
                color:#f5f5f5;
            }
            #submit:hover{
                opacity: 1;
            }
            #delete{
                background:#FF4D4D;
                color:#f5f5f5;
            }
            #delete:hover{
                opacity: 1;
            }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Edit account</h1>
            </div>
        </div>
        <div style="width:90%; margin: auto;">
            <form method="POST" action="acEdit.php">
                <input type="hidden" name="type" value="<?php echo $_POST['type'] ?>">
            <?php if($_POST['type']=="client"){ ?>
                <input type="hidden" name="ID" value="<?php echo $_POST['cID'] ?>">
                <p>Username<br><input type="text" id="username" name="username" value="<?php echo $_POST['username'] ?>" required disabled></p>
                <p>Password<br><input type="text" id="password" name="password" value="<?php echo $_POST['password'] ?>" required></p>
                <p>Email<br><input type="email" id="email" name="email" value="<?php echo $_POST['email'] ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required></p>
                <p>Phone<br><input type="number" id="phone" name="phone" value="<?php echo $_POST['phone'] ?>" required></p>
            <?php }else{ ?>
                <input type="hidden" name="ID" value="<?php echo $_POST['skID'] ?>">
                <p>Username<br><input type="text" id="username" name="username" value="<?php echo $_POST['username'] ?>" required disabled></p>
                <p>Password<br><input type="text" id="password" name="password" value="<?php echo $_POST['password'] ?>" required></p>
            <?php } ?>
                <div id="buttons">
                    <button class="button" id="submit" name="submit" type="submit">Edit</button>
                    <button class="button" id="delete" name="delete" type="submit">Delete</button>
                </div>
            </form>
        </div>
    </body>

</html>