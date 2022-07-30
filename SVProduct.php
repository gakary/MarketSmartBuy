<html>
    <head>
        <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
        <link href="assets/css/basic.css" rel="stylesheet" />
        <link href="css/SVProduct.css" rel="stylesheet" />
    </head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Products list</h1>
            </div>
        </div>
        <h5>! Click the table headers to sort the table !</h5>
        <table class="goods sortable">
            <tr class="first">
                <th class="name">Goods name</th>
                <th class="type">Type</th>
                <th class="price">price</th>
                <th class="qty">qty</th>
                <th class="btn"></th>
            </tr>
            
                <?php
                    session_start();
                    $bgcolor = 0;
                    include 'sql_conn.php';
                    $conn = conn();
                    $sql = 'SELECT * FROM Goods g, stall s, shopkeeper sk WHERE g.sID = s.sID AND s.skID = sk.skID AND sk.skID = '.$_SESSION['ID'].';';
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
                <form method="POST" action="SEProduct.php">
                    <td class="name"><?php echo $rc['GoodsName']; ?></td>
                    <td class="type"><?php echo $rc['GoodsType']; ?></td>
                    <td class="price"><?php echo $rc['Price']; ?></td>
                    <td class="qty"><?php echo $rc['Qty']; ?></td>
                    <td class="btn">
                        <input type="hidden" name="id" value="<?php echo $rc['GoodsID'] ?>" required>
                        <input type="hidden" name="name" value="<?php echo $rc['GoodsName'] ?>">
                        <input type="hidden" name="type" value="<?php echo $rc['GoodsType'] ?>">
                        <input type="hidden" name="price" value="<?php echo $rc['Price'] ?>">
                        <input type="hidden" name="qty" value="<?php echo $rc['Qty'] ?>">
                        <button type="submit" id="btnEdit" class="btnEdit">Edit</button>
                    </td>
                </form>
            </tr>
            <?php
                    }
            ?>
        </table>
        <div class="add" colspan="5" onclick="location.href='SProduct.php'">Post new product</div>
    </body>
</html>