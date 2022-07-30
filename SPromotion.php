<html>
    <head>
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/basic.css" rel="stylesheet" />
        <link href="css/SPromotion.css" rel="stylesheet" />
    </head>
    <body>
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Promotion</h1>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Stall information
                    </div>
                    <?php
                        session_start();
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
                    <div class="panel-body">
                        <form>
                            <p>Stall Name<br><input type="text" id="stallname" name="stallname" value="<?php echo($stallname); ?>" required disabled></p>
                            <p>Location<br><input type="text" id="location" name="location" value="<?php echo($location); ?>" required disabled></p>
                            <p>Tel<br><input type="text" id="tel" name="tel" value="<?php echo($tel); ?>" required disabled></p>
                            <p>Opening hour<br><input type="text" id="hour" name="hour" value="<?php echo($hour); ?>" required disabled></p>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Promotion
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="S_Promotion.php">
                            <p>Title<br><input type="text" id="title" name="title" required></p>
                            <p>Discount<br><input type="number" step="0.1" max="1" min="0.1" id="discount" name="discount" required></p>
                            <p>Related product<br>
                            
                            <?php
                                $sql = 'SELECT g.GoodsID, g.GoodsName FROM goods g, stall s, shopkeeper sk where s.skID = sk.skID AND g.sID = s.sID AND sk.skID = '.$_SESSION['ID'].'';
                                $rs = mysqli_query($conn, $sql);
                                if(!$rs){
                            ?>
                            <select name="product" id="product" disabled required>
                            <?php
                                }else{
                            ?>
                            <select name="product" id="product" required>
                            <?php
                                    while($rc = mysqli_fetch_assoc($rs)){
                            ?>
                                <option value="<?php echo $rc['GoodsID'] ?>"><?php echo $rc['GoodsName'] ?></option>
                            <?php
                                    }
                                }
                            ?>
                            </select>
                            </p>
                            <p>Expiry Date<br><input type="date" id="expiry" name="expiry" data-date-format="YYYY-MM-DD" required></p>
                            <p><textarea id="content" name="content" rows="4" cols="50" placeholder="Descrition or content of the event"></textarea></p>
                            <div id="buttons">
                                <button id="submit" name="submit" type="submit" >Submit</button>
                            </div>
                        </form>
                     </div>
                </div>
            </div>
        </div>
        <script>
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            if(dd<10){
                dd='0'+dd
            }  
            if(mm<10){
                mm='0'+mm
            } 
            today = yyyy+'-'+mm+'-'+dd;
            document.getElementById("expiry").setAttribute("min", today);
        </script>
    </body>
    </html>