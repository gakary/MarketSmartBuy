<html>
    <head>
        <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
        <link href="assets/css/basic.css" rel="stylesheet" />
        <link href="css/SOrder.css" rel="stylesheet" />
    </head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Order list</h1>
            </div>
        </div>
        <h5>! Click the table headers to sort the table !</h5>
        <table class="order sortable">
            <tr class="first">
                <th class="oID">OrderID</th>
                <th class="client">Client</th>
                <th class="product">Product</th>
                <th class="qty">Qty</th>
                <th class="time">Time</th>
                <th class="status">Status</th>
                <th class="btn"></th>
            </tr>
            
                <?php
                    session_start();
                    $bgcolor = 0;
                    include 'sql_conn.php';
                    $conn = conn();
                    $sql = 'SELECT oID FROM order_items oi, goods g, stall s WHERE oi.GoodsID=g.GoodsID AND g.sID = s.sID AND s.skID = '.$_SESSION['ID'].' GROUP by oID;';
                    $rs = mysqli_query($conn, $sql);
                    while($rc = mysqli_fetch_assoc($rs)){
                        $sql2 = 'SELECT oi.oID, c.Username, g.GoodsName, oi.qty, o.OrderTime, oi.status, oi.GoodsID FROM order_items oi, orders o, client c, goods g
                        WHERE o.oID = '.$rc['oID'].' AND o.oID = oi.oID AND c.cID = o.cID AND g.GoodsID = oi.GoodsID';
                        $rs2 = mysqli_query($conn, $sql2);
                        while($rc2 = mysqli_fetch_assoc($rs2)){
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
                <form method="POST" action="S_Order.php">
                    <td class="oID"><?php echo $rc2['oID']; ?></th>
                    <td class="client"><?php echo $rc2['Username']; ?></th>
                    <td class="product"><?php echo $rc2['GoodsName']; ?></th>
                    <td class="qty"><?php echo $rc2['qty']; ?></th>
                    <td class="time"><?php echo $rc2['OrderTime']; ?></th>
                    <td class="status"><?php echo $rc2['status']; ?></th>
                    <td class="btn">
                        <input type="hidden" name="oID" value="<?php echo $rc2['oID'] ?>">
                        <input type="hidden" name="GID" value="<?php echo $rc2['GoodsID'] ?>">
                        <?php
                            if($rc2['status']=='N'){
                        ?>
                        <button type="submit" name="btnAccept" id="btnAccept" class="btnAccept">Accept</button>
                        <button type="submit" name="btnReject" id="btnReject" class="btnReject">Reject</button>
                        <?php
                            }else if($rc2['status']=='A'){
                        ?>
                        <button type="submit" name="btnDeliver" id="btnDeliver" class="btnDeliver">Deliver</button>
                        <?php
                            }
                        }
                        ?>
                    </td>
                </form>
            </tr>
            <?php
                    }
            ?>
        </table>
    </body>
</html>