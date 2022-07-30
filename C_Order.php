<?php
    include 'sql_conn.php';
    $conn = conn();
    $oID = $_POST['oID'];
    $gID = $_POST['GoodsID'];
    $sql = 'UPDATE order_items SET status = "C" WHERE oID = '.$oID.' AND GoodsID = '.$gID.';';
    mysqli_query($conn,$sql);
    echo '<script language="javascript">';
    echo 'alert("Order has been confirm!");';
    echo '</script>';
    header("refresh:0.1; url=COrder.php")
?>