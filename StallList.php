<html>
    <head>
        <link rel="stylesheet" href="css/stalldetail.css">
        <link rel="stylesheet" href="css/StallList.css">
        <link href="assets/css/basic.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="css/Goods.css">
        <link rel="stylesheet" type="text/css" href="css/card.css">
    </head>
    <body>
        <?php 
            session_start(); 
            include 'navbar.php';
        ?>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Stall list</h1>
            </div>
        </div>
        <div id="SLcontent">
            <div id="StallList">
                <?php
                    include 'sql_conn.php';
                    $conn = conn();
                    $sql = 'SELECT * FROM stall';
                    $rs = mysqli_query($conn, $sql);
                    while($rc = mysqli_fetch_assoc($rs)){
                ?>
                <div class="wrapper">
                    
                    <div class="left">
                        <form action="?" method="POST" onclick="this.submit();" style="width:100%; height:100%; cursor:pointer;">
                            <input type="hidden" name="shop" value="<?php echo $rc['sID'] ?>">
                            <h4>Stall Information</h4>
                        </form>
                    </div>
                    <div class="right">
                        <div class="info">
                            <div class="info_data">
                                <div class="data">
                                    <h4>Name:</h4>
                                    <p><?php echo $rc['StallName'] ?></p>
                                </div>
                                <div class="data">
                                    <h4>Location</h4>
                                    <p><?php echo $rc['Location'] ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="projects">
                            <h3></h3>
                            <div class="projects_data">
                                <div class="data">
                                    <h4>BusinessHours</h4>
                                    <p><?php echo $rc['BusinessHours'] ?></p>
                                </div>
                                <div class="data">
                                    <h4>Phone</h4>
                                    <p><?php echo $rc['Tel'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>

            </div>

            <div id="StallProduct">
                <div class="row" style="margin-top: 50px;">
                    <div class="col-md-1">
                        <h1 class="page-head-line" style="border: none;">Product</h1>
                    </div>
                </div>
                    <div class="goods" style="margin-top: 30px;">
                        <?php
                            if(isset($_POST['shop'])){
                                $sql = 'SELECT * FROM goods WHERE sID = '.$_POST['shop'];
                                $rs = mysqli_query($conn, $sql);
                                while($rc = mysqli_fetch_assoc($rs)){
                        ?>
                            
                            <form method="POST" action="addToSC.php" style="display: block; margin: 0;">
                                <div class="card">
                                    <img class="cardIMG" src="img/goods/<?php echo($rc['GoodsID']); ?>.png" style="width:100%">
                                    <h1><?php echo($rc['GoodsName']); ?></h1>
                                    <p class="price" 
                                    <?php
                                        if(!isset($_SESSION['acType'])){
                                    ?>
                                            style="margin-right: 20%;"
                                    <?php
                                        }
                                    ?>
                                    >$
                                        <?php echo($rc['Price']); ?>
                                    <?php
                                        if(isset($_SESSION['acType'])){
                                    ?>
                                        <input type="number" class="qty" name="qty" min="0" max="<?php echo($rc['Qty']); ?>" style="height: 30px; width:45px; float: right" required>
                                    </p>
                                        <input type="hidden" name="gID" value="<?php echo($rc['GoodsID']) ?>">
                                        <input type="hidden" name="gName" value="<?php echo($rc['GoodsName']) ?>">
                                        <input type="hidden" name="price" value="<?php echo($rc['Price']) ?>">
                                        <button type="submit">Add to Cart</button>
                                    <?php
                                        }else{
                                            echo "</p>";
                                        }
                                    ?>
                                </div> 
                            </form>
                        <?php
                                }
                            }
                        ?>
                    </div>
            </div>
        </div>
    </body>
</html>