<?php 
    session_start();
    $gID = $_POST['RMkey'];
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] AS $key => $cart){
            if($cart['GoodsID']==$gID){
                unset($_SESSION['cart'][$key]);
            }
        }
    }
    header("refresh:0.1; url=shoppingCart.php");
?>