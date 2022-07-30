 <?php
    session_start();
    include 'sql_conn.php';
    $conn = conn();
    $oID = $_POST['oID'];
    $gID = $_POST['GID'];
    $status = " ";
    if (isset($_POST['btnAccept'])) { //when click accept button
        $status = "A";
    }else if(isset($_POST['btnReject'])){ //when click reject button
        $status = "R";
    }else{ //when click deliver button
        $status = "D";
    }
    if($status == " "){
        echo '<script language="javascript">';
        echo 'alert("Status invalid!");';
        echo '</script>';
        header("refresh:0.1; url=logout.php");
    }
    $sql = 'UPDATE order_items SET status = "'.$status.'" WHERE oID = '.$oID.' AND GoodsID = '.$gID.';';
    mysqli_query($conn,$sql);
    echo '<script language="javascript">';
    echo 'alert("Status of the order successfully changed!");';
    echo '</script>';
    header("refresh:0.1; url=SOrder.php")
 ?>