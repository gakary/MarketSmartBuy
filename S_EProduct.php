<?php
    session_start();
    include 'sql_conn.php';
    $conn = conn();
    $id = $_POST['id'];
    $pname = $_POST['productname'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    if ($_FILES['ProductImage']['name']=='' && !file_exists("img/goods/".$id.'.png') )
    {
        copy("img/IMG_NF.png", "img/goods/".$id.".png");
    }
    else if($_FILES['ProductImage']['name']!='')
    {
        $file_tmp =$_FILES['ProductImage']['tmp_name'];
        $file_size =$_FILES['ProductImage']['size'];
        if($file_size > 2097152){
            $errors[]='Image file size must smaller than 2 MB';
        }
        if(empty($errors)==true){
            if(file_exists("img/goods/".$id.'.png')) {
                unlink("img/goods/".$id.".png");
            }
            move_uploaded_file($file_tmp,"img/goods/".$id.".png");
         }else{
            echo '<script language="javascript">';
            echo 'alert("'.$errors.'");';
            echo '</script>';
         }
    }
    $sql = 'UPDATE goods SET GoodsType = "'.$type.'", GoodsName = "'.$pname.'", Price = '.$price.', Qty = '.$qty.' WHERE GoodsID = '.$id.';';
    mysqli_query($conn,$sql);
    echo '<script language="javascript">';
    echo 'alert("Product information has been edited!");';
    echo '</script>';
    header("refresh:0.1; url=SVProduct.php")
?>