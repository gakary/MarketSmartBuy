<?php 
    session_start();
    if(isset($_SESSION['cart'])){
        unset($_SESSION['cart']);
    }
    header("refresh:0.1; url=HomePage.php");
?>