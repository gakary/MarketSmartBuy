<html>
    <head>
        <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
        <link href="assets/css/basic.css" rel="stylesheet" />
        <link href="css/COrder.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('tr:not(.header)').hide();
                $('.header').click(function(){
                    $(this).nextUntil('tr.header').slideToggle(500);
                });
            });
        </script>
    </head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Products list</h1>
            </div>
        </div>
        <h5> N: Not accepted yet<br>A: Accepted by shopkeeper<br>D: Delivering<br>C: Completed</h5>
                <?php
                    session_start();
                    include 'sql_conn.php';
                    $conn = conn();
                    $sql = 'SELECT o.oID, o.price, (SELECT count(*) FROM order_items oi WHERE  o.oID = oi.oID) AS item, o.OrderTime FROM orders o WHERE o.cID = '.$_SESSION['ID'].';';
                    $rs = mysqli_query($conn, $sql);
                    while($rc = mysqli_fetch_assoc($rs)){
                        $bgcolor = 0;
                ?>
            <table class="order">
                <tr class="content header">
                    <td class="oID">OrderID : <?php echo $rc['oID']; ?></td>
                    <td class="item">Item : <?php echo $rc['item']; ?></td>
                    <td class="o_price">Price : <?php echo $rc['price']; ?></td>
                    <td class="time">Time : <?php echo $rc['OrderTime']; ?></td>
                </tr>
                <tr class="first">
                    <th class="product">Product</th> 
                    <th class="price">Price</th>
                    <th class="qty">Qty</th>
                    <th class="status">Status</th>
                </tr>
                <?php
                    $sql2 = 'SELECT oi.GoodsID, oi.oID, g.GoodsName, g.Price, oi.qty, oi.status FROM order_items oi, goods g WHERE oi.GoodsID = g.GoodsID AND oi.oID = '.$rc['oID'];
                    $rs2 = mysqli_query($conn, $sql2);
                    while($rc2 = mysqli_fetch_assoc($rs2)){
                ?>
                <tr class="content">
                    <form action="C_Order" method="POST">
                        <td class="product"><?php echo $rc2['GoodsName']; ?></td>
                        <td class="price"><?php echo $rc2['Price']; ?></td>
                        <td class="qty"><?php echo $rc2['qty']; ?></td>
                        <td class="status">
                            <?php
                                echo $rc2['status'];
                                if($rc2['status']=="D"){
                            ?>
                                    <input type="hidden" name="oID" value="<?php echo $rc2['oID']; ?>">
                                    <input type="hidden" name="GoodsID" value="<?php echo $rc2['GoodsID']; ?>">
                                    <button type="submit" name="btnConfirm" id="btnConfirm" class="btnConfirm">Confirm</button>
                            <?php
                                }
                            ?>
                        </td>
                    </form>
                </tr>
            <?php
                        }
            ?>
            </table>
            <?php
                    }
            ?>
    </body>
</html>