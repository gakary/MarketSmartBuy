<?php
    session_start();
    include 'sql_conn.php';
    $conn = conn();
    $id=$_POST['goodsID'];
    $price=$_POST['price'];
    $sql = 'DELETE FROM coupon WHERE GoodsID = '.$id;
    mysqli_query($conn,$sql);
    $sql = 'DELETE FROM promotion WHERE GoodsID = '.$id;
    mysqli_query($conn,$sql);
    $sql = 'SELECT * FROM order_items WHERE GoodsID = '.$id;
    $rs = mysqli_query($conn, $sql);
    while($rc = mysqli_fetch_assoc($rs)){
        $sql2 = 'SELECT oID FROM order WHERE oID = '.$rc['oID'];
        $rs2 = mysqli_query($conn, $sql2);
        $rc2 = mysqli_fetch_assoc($rs2);
        $price = $price*$rc['qty'] - $rc2['Price'];
        $sql2 = 'UPDATE order SET Price = '.$price.' WHERE oID = '.$rc['oID'];
        mysqli_query($conn,$sql);
    }
    $sql = 'DELETE FROM order_items WHERE GoodsID = '.$rc['GoodsID'];
    mysqli_query($conn,$sql);
    $sql = 'DELETE FROM goods WHERE GoodsID = '.$id;
    mysqli_query($conn,$sql);
    echo '<script language="javascript">';
    echo 'alert("Product has been deleted!");';
    echo '</script>';
    header("refresh:0.1; url=AProduct.php")
?>