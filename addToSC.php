<?php 
    session_start();
    function alert($string){
        echo '<script language="javascript">';
        echo 'alert("'.$string.'");';
        echo '</script>';
    }
    $qty = $_POST['qty'];
    $gID = $_POST['gID'];
    $gName = $_POST['gName'];
    $price = $_POST['price'];
    if(!isset($_SESSION['Goodslen'])){
        $_SESSION['Goodslen']=1;
    }
    else{
        $_SESSION['Goodslen']++;
    }
    $check = 0;
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] AS $key => $cart){
            if($cart['GoodsID']==$gID){
                unset($_SESSION['cart'][$key]);
                $qty += $cart['qty'];
            }
        }
    }
    $_SESSION['cart'][$_SESSION['Goodslen']] = array("GoodsID" => $gID, "GoodsName" => $gName, "qty" => $qty, "Price" => $price);
    alert("Item add to cart successfully.");
    header("refresh:0.1; url=Goods.php");
?>