<?php 
    session_start();
    include 'sql_conn.php';
    $conn = conn();
    $sql = "SELECT MAX(GoodsID) AS GID FROM goods";
    $rs = mysqli_query($conn, $sql);
    $rc = mysqli_fetch_assoc($rs);
    $GID = $rc['GID']+1;
    $pname = $_POST['productname'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    if ($_FILES['ProductImage']['name']=='') 
    {
        copy("img/IMG_NF.png", "img/goods/".$GID.".png");
    }
    else
    {
        $file_tmp =$_FILES['ProductImage']['tmp_name'];
        $file_size =$_FILES['ProductImage']['size'];
        if($file_size > 2097152){
            $errors[]='Image file size must smaller than 2 MB';
        }
        if(empty($errors)==true){
            if(file_exists((String)$GID.'.png')) {
                unlink("img/goods/".$GID.".png");
            }
            move_uploaded_file($file_tmp,"img/goods/".$GID.".png");
         }else{
            echo '<script language="javascript">';
            echo 'alert("'.$errors.'");';
            echo '</script>';
         }
    }
    $sql = 'INSERT INTO goods VALUES('.$GID.',"'.$type.'","'.$pname.'",'.$_SESSION['ID'].','.$price.','.$qty.')';
    mysqli_query($conn,$sql);
    echo '<script language="javascript">';
    echo 'alert("New product posted!");';
    echo '</script>';
    header("refresh:0.1; url=SProduct.php")
?>