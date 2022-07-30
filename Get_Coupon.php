<?php
    session_start();
    if(!isset($_SESSION['acType'])){
        echo '<script language="javascript">';
        echo 'alert("Please login first!");';
        echo '</script>';
        header("refresh:0.1; url=login.php");
    }else{
        include 'sql_conn.php';
        $conn = conn();
        $pID=$_POST['pID'];
        $type=$_SESSION['acType'];
        $sql = 'SELECT * FROM coupon WHERE pID = '.$pID.' AND cID = '.$_SESSION['ID'];
        $rs = mysqli_query($conn, $sql);
        if(mysqli_num_rows($rs)!=0){
            echo '<script language="javascript">';
            echo 'alert("You have already taken the coupon!");';
            echo '</script>';
            header("refresh:0.1; url=Promotion.php");
        }else{
            $sql = 'SELECT * FROM promotion WHERE pID = '.$pID;
            $rs = mysqli_query($conn, $sql);
            $rc = mysqli_fetch_assoc($rs);
            $sql = 'INSERT INTO coupon VALUES('.$pID.','.$rc['GoodsID'].','.$_SESSION['ID'].','.$rc['sID'].','.$rc['Discount'].',"'.$rc['ExpiryDate'].'")';
            mysqli_query($conn,$sql);
            echo '<script language="javascript">';
            echo 'alert("Coupon successfully get!");';
            echo '</script>';
            header("refresh:0.1; url=Promotion.php");
        }
    }
?>