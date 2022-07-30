<html>
    <head>
        <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
        <link href="assets/css/basic.css" rel="stylesheet" />
        <link href="css/AProduct.css" rel="stylesheet" />
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
                    $sql = 'SELECT * FROM Goods;';
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
                <form method="POST" action="A_Product.php">
                    <td class="name"><?php echo $rc['GoodsName']; ?></th>
                    <td class="type"><?php echo $rc['GoodsType']; ?></th>
                    <td class="price"><?php echo $rc['Price']; ?></th>
                    <td class="qty"><?php echo $rc['Qty']; ?></th>
                    <td class="btn">
                        <input type="hidden" name="price" value="<?php echo $rc['Price'] ?>">
                        <input type="hidden" name="goodsID" value="<?php echo $rc['GoodsID'] ?>">
                        <button type="submit" id="btnDelete" class="btnDelete">Delete</button>
                    </td>
                </form>
            </tr>
            <?php
                    }
            ?>
        </table>
    </body>
</html>