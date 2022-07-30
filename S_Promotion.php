<?php 
    session_start();
    include 'sql_conn.php';
    $conn = conn();
    $title = $_POST['title'];
    $discount = $_POST['discount'];
    $product = $_POST['product'];
    $expiry = date('Y-m-d', strtotime($_POST['expiry']));
    $content = $_POST['content'];
    $sql = "SELECT MAX(pID) AS pID FROM promotion";
    $rs = mysqli_query($conn, $sql);
    if(mysqli_num_rows($rs)==0){
        $pID = 1;
    }else{
        $rc = mysqli_fetch_assoc($rs);
        $pID = $rc['pID']+1;
    }

    $sql = 'SELECT sID FROM stall WHERE skID = '.$_SESSION['ID'];
    $rs = mysqli_query($conn, $sql);
    $rc = mysqli_fetch_assoc($rs);
    $sID = $rc['sID'];
    $sql = 'INSERT INTO promotion VALUES('.$pID.','.$sID.','.$product.',"'.$title.'","'.$content.'",'.$discount.',"'.$expiry.'")';
    mysqli_query($conn,$sql);
    echo '<script language="javascript">';
    echo 'alert("New promotional event created!");';
    echo '</script>';
    header("refresh:0.1; url=SPromotion.php")
?>