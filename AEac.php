<html>
    <head>
        <link href="assets/css/basic.css" rel="stylesheet" />
        <link href="css/AEac.css" rel="stylesheet" />
    </head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Edit user acccount</h1>
            </div>
        </div>
        <div id="selectType">
            <form action="?" method="POST">
                Select a type of user :
                <select name="usertype" id="usertype" onchange="javascript:this.form.submit()">
                        <option>Choose a type</option>
                        <option value="client">Client</option>
                        <option value="shopkeeper">Shopkeeepr</option>
                </select></p>
            </form>
        </div>
        <table class="users">
            <tr class="first">
                <th class="type">Type</th>
                <th class="Username">Username</th>
                <th class="btn"></th>
            </tr>
            
                <?php
                    if(isset($_POST['usertype'])){
                        session_start();
                        $bgcolor = 0;
                        include 'sql_conn.php';
                        $conn = conn();
                        if($_POST['usertype']=="client"){
                            $sql = 'SELECT * FROM client;';
                            $rs = mysqli_query($conn, $sql);
                            while($rc = mysqli_fetch_assoc($rs)){
                ?>
            <tr class="content
            <?php
                if($bgcolor==0){
                    $bgcolor=1;
                }else{
                    echo "bgcolor";
                    $bgcolor=0;
                }
            ?>
            ">
                <form method="POST" action="A_Eac.php">
                    <td class="type"><?php echo $_POST['usertype']; ?></td>
                    <td class="Username"><?php echo $rc['Username']; ?></td>
                    <td class="btn">
                        <input type="hidden" name="type" value="<?php echo $_POST['usertype'] ?>">
                        <input type="hidden" name="cID" value="<?php echo $rc['cID'] ?>">
                        <input type="hidden" name="username" value="<?php echo $rc['Username'] ?>">
                        <input type="hidden" name="password" value="<?php echo $rc['Password'] ?>">
                        <input type="hidden" name="email" value="<?php echo $rc['Email'] ?>">
                        <input type="hidden" name="phone" value="<?php echo $rc['PhoneNum'] ?>">
                        <button type="submit" id="btnUpdate" class="btnUpdate">Manage</button>
                    </td>
                </form>
            </tr>
            <?php
                            }
                        }else{
                            $sql = 'SELECT * FROM shopkeeper;';
                            $rs = mysqli_query($conn, $sql);
                            while($rc = mysqli_fetch_assoc($rs)){
                ?>
            <tr class="content
            <?php
                if($bgcolor==0){
                    $bgcolor=1;
                }else{
                    echo "bgcolor";
                    $bgcolor=0;
                }
            ?>
            ">
                <form method="POST" action="A_Eac.php">
                    <td class="type"><?php echo $_POST['usertype']; ?></td>
                    <td class="Username"><?php echo $rc['Username']; ?></td>
                    <td class="btn">
                        <input type="hidden" name="type" value="<?php echo $_POST['usertype'] ?>">
                        <input type="hidden" name="skID" value="<?php echo $rc['skID'] ?>">
                        <input type="hidden" name="username" value="<?php echo $rc['Username'] ?>">
                        <input type="hidden" name="password" value="<?php echo $rc['Password'] ?>">
                        <button type="submit" id="btnUpdate" class="btnUpdate">Manage</button>
                    </td>
                </form>
            </tr>
            <?php
                            }
                        }
                    }
            ?>
        </table>
    </body>
</html>