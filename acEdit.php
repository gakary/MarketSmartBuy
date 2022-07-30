<?php
    session_start();
    include 'sql_conn.php';
    $conn = conn();
    $type=$_POST['type'];
    $id=$_POST['ID'];
    if (isset($_POST['submit'])) {
        if($type=="client"){
            $pw=$_POST['password'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $sql = 'UPDATE client SET Password = "'.$pw.'", Email = "'.$email.'", PhoneNum = '.$phone.' WHERE cID = '.$id.';';
            mysqli_query($conn,$sql);
        }else{
            $pw=$_POST['password'];
            $sql = 'UPDATE shopkeeper SET Password = "'.$pw.'" WHERE skID = '.$id.';';
            mysqli_query($conn,$sql);
        }
        echo '<script language="javascript">';
        echo 'alert("Account information has been modified!");';
        echo '</script>';
    } else if (isset($_POST['delete'])) {
        if($type=="client"){
            $sql = 'DELETE FROM coupon WHERE cID = '.$id;
            mysqli_query($conn,$sql);
            $sql = 'SELECT oID FROM orders WHERE cID = '.$id;
            $rs = mysqli_query($conn, $sql);
            while($rc = mysqli_fetch_assoc($rs)){
                $sql = 'DELETE FROM order_items WHERE oID = '.$rc['oID'];
                mysqli_query($conn,$sql);
            }
            $sql = 'DELETE FROM orders WHERE cID = '.$id;
            mysqli_query($conn,$sql);
            echo $id;
            $sql = 'DELETE FROM client WHERE cID = '.$id.';';
            mysqli_query($conn,$sql);
        }else{
            $sql = 'SELECT sID FROM stall WHERE skID = '.$id.'';
            $rs = mysqli_query($conn, $sql);
            $rc = mysqli_fetch_assoc($rs);
            $sID = $rc['sID'];
            $pw=$_POST['password'];
            $sql = 'DELETE FROM promotion WHERE sID = '.$sID.';';
            mysqli_query($conn,$sql);
            $sql = 'DELETE FROM coupon WHERE sID = '.$sID.';';
            mysqli_query($conn,$sql);
            $sql = 'SELECT GoodsID FROM goods WHERE sID = '.$sID.'';
            $rs = mysqli_query($conn, $sql);
            while($rc = mysqli_fetch_assoc($rs)){
                $sql2 = 'SELECT oID FROM order_items WHERE GoodsID = '.$rc['GoodsID'];
                $rs2 = mysqli_query($conn, $sql2);
                while($rc2 = mysqli_fetch_assoc($rs2)){
                    $sql = 'DELETE FROM order WHERE oID = '.$rc2['oID'].'';
                    mysqli_query($conn,$sql);
                }
                $sql = 'DELETE FROM order_items WHERE GoodsID = '.$rc['GoodsID'];
                mysqli_query($conn,$sql);
                unlink("img/goods/".$rc['GoodsID'].".png");
            }
            $sql = 'DELETE FROM goods WHERE sID = '.$sID.';';
            mysqli_query($conn,$sql);
            $sql = 'DELETE FROM stall WHERE skID = '.$id.';';
            mysqli_query($conn,$sql);
            $sql = 'DELETE FROM shopkeeper WHERE skID = '.$id.';';
            mysqli_query($conn,$sql);
        }
        echo '<script language="javascript">';
        echo 'alert("Account has been deleted!");';
        echo '</script>';
    }
    header("refresh:0.1; url=AAcount.php")
?>