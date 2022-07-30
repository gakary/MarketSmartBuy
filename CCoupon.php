<html>
<html>
    <head>
        <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
        <link href="assets/css/basic.css" rel="stylesheet" />
        <link href="css/CCoupon.css" rel="stylesheet" />
    </head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Coupon</h1>
            </div>
        </div>
                <?php
                    session_start();
                    $bgcolor = 0;
                    include 'sql_conn.php';
                    $conn = conn();
                    $sql = 'SELECT p.Title, s.StallName, p.Content, g.GoodsName, c.Discount, c.Expirytion FROM coupon c, promotion p, goods g, stall s WHERE c.pID = p.pID AND c.GoodsID = g.GoodsID AND s.sID = g.sID AND c.cID = '.$_SESSION['ID'];
                    $rs = mysqli_query($conn, $sql);
                    while($rc = mysqli_fetch_assoc($rs)){
                ?>
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
                            Expiry - <?php echo $rc['Expirytion'] ?>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
    </body>
</html>