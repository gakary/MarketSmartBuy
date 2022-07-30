<html>
    <head>
        <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
        <link href="assets/css/basic.css" rel="stylesheet" />
        <link href="css/AOrder.css" rel="stylesheet" />
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
                <th class="price">Price</th>
                <th class="time">Time</th>
                <th class="btn"></th>
            </tr>
            
                <?php
                    session_start();
                    $bgcolor = 0;
                    include 'sql_conn.php';
                    $conn = conn();
                    $sql = 'SELECT * FROM orders;';
                    $rs = mysqli_query($conn, $sql);
                    while($rc = mysqli_fetch_assoc($rs)){
                        $sql2 = 'SELECT Username FROM client WHERE cID ='.$rc['cID'];
                        $rs2 = mysqli_query($conn, $sql2);
                        $rc2 = mysqli_fetch_assoc($rs2);
                        $client = $rc2['Username'];
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
                <form method="POST" action="A_Order.php">
                    <td class="oID"><?php echo $rc['oID']; ?></th>
                    <td class="client"><?php echo $client; ?></th>
                    <td class="price"><?php echo $rc['Price']; ?></th>
                    <td class="time"><?php echo $rc['OrderTime']; ?></th>
                    <td class="btn">
                        <input type="hidden" name="oID" value="<?php echo $rc['oID'] ?>">
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