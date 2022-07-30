<html>
<html>
    <head>
        <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
        <link href="assets/css/basic.css" rel="stylesheet" />
        <link href="css/CCoupon.css" rel="stylesheet" />
    </head>
    <body>
        <?php session_start(); 
            include 'navbar.php';
        ?>
        <img src="img/promotion.png" style="display: block; margin: 30px auto; height: 240px;">
                <?php
                    $bgcolor = 0;
                    include 'sql_conn.php';
                    $conn = conn();
                    $sql = 'SELECT p.Title, s.StallName, p.Content, g.GoodsName, p.Discount, p.ExpiryDate, p.pID FROM promotion p, goods g, stall s WHERE p.GoodsID = g.GoodsID AND s.sID = g.sID';
                    $rs = mysqli_query($conn, $sql);
                    while($rc = mysqli_fetch_assoc($rs)){
                ?>
                <form action="Get_Coupon.php" method="POST" onclick="this.submit()" style="cursor: pointer;">
                    <div class="card">
                        <div class="top">
                            <div class="title">
                                <div style="margin-left: 30px; margin-top: 30px;"><?php echo $rc['Title'] ?></div>
                            </div>
                            <div class="stall">
                                <div style="margin-right: 20px; margin-top: 30px;"><?php echo $rc['StallName'] ?></div>
                            </div>
                        </div>
                        <div class="left">
                            <div style="margin-left: 30px; margin-top: 30px;"><?php echo $rc['Content'] ?></div>
                        </div>
                        <div class="right">
                            <div class="Product">
                                Product - <?php echo $rc['GoodsName'] ?>
                            </div>
                            <div class="Discount">
                                Discount - <?php echo $rc['Discount'] ?>
                            </div>
                            <div class="ExpiryDate">
                                Expiry - <?php echo $rc['ExpiryDate'] ?>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="pID" name="pID" value="<?php echo $rc['pID'] ?>">
                </form>
                <?php
                    }
                ?>
    </body>
</html>