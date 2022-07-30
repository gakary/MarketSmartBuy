<?php
    session_start();
    include 'sql_conn.php';
    $conn = conn();
    $id=$_POST['oID'];
    $sql = 'DELETE FROM order_items WHERE oID = '.$id;
    mysqli_query($conn,$sql);
    $sql = 'DELETE FROM orders WHERE oID = '.$id;
    mysqli_query($conn,$sql);
    echo '<script language="javascript">';
    echo 'alert("Order has been deleted!");';
    echo '</script>';
    header("refresh:0.1; url=AOrder.php")
?>