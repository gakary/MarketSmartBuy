<?php
    function alert($str){
        echo '<script language="javascript">';
        echo 'alert("'.$str.'")';
        echo '</script>';
    }
    session_start();
    include 'sql_conn.php';
    $conn = conn();
    $sql = 'SELECT MAX(oID) AS oID FROM orders';
    $rs = mysqli_query($conn, $sql);
    $rc = mysqli_fetch_assoc($rs);
    $oID = $rc['oID']+1;
    $cID = $_SESSION['ID'];
    $price = 0;
    foreach($_SESSION['cart'] as $cart){
        $sql = 'SELECT Discount FROM coupon c WHERE c.GoodsID = '.$cart['GoodsID'].' AND c.cID = '.$_SESSION['ID'].' AND "'.date('Y-m-d').'" <= c.Expirytion;';
        $rs = mysqli_query($conn, $sql);
        if(mysqli_num_rows($rs)!=0){
            $rc = mysqli_fetch_assoc($rs);
            $price += ($cart['Price']*$cart['qty'])*$rc['Discount'];
        }else{
            $price += $cart['Price']*$cart['qty'];
        }
    }
    $time = date('Y-m-d');
    $sql = 'INSERT INTO orders VALUE('.$oID.','.$cID.','.$price.',"'.$time.'","'.$time.'")';
    mysqli_query($conn,$sql);
    foreach($_SESSION['cart'] as $cart){
        $sql = 'INSERT INTO order_items VALUE('.$cart['GoodsID'].','.$oID.','.$cart['qty'].',"N")';
        mysqli_query($conn,$sql);
        $sql = 'SELECT Qty FROM goods WHERE GoodsID = '.$cart['GoodsID'];
        $rs = mysqli_query($conn, $sql);
        $rc = mysqli_fetch_assoc($rs);
        $qty = $rc['Qty'];
        $qty = $qty - $cart['qty'];
        $sql = 'UPDATE goods SET Qty = "'.$qty.'" WHERE GoodsID = '.$cart['GoodsID'];
        mysqli_query($conn,$sql);
    }
    echo '<script language="javascript">';
    echo 'alert("Order has been placed!");';
    echo '</script>';
    header("refresh:0.1; url=ClearSC.php")
?>