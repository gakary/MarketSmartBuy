<?php 
    session_start();
    include 'sql_conn.php';
    $conn = conn();
    $sql = "SELECT MAX(skID) AS skID FROM shopkeeper";
    $rs = mysqli_query($conn, $sql);
    if(mysqli_num_rows($rs)==0){
        $skID = 1;
    }else{
        $rc = mysqli_fetch_assoc($rs);
        $skID = $rc['skID']+1;
    }
    $sql = "SELECT MAX(sID) AS sID FROM shopkeeper";
    $rs = mysqli_query($conn, $sql);
    if(mysqli_num_rows($rs)==0){
        $sID = 1;
    }else{
        $rc = mysqli_fetch_assoc($rs);
        $sID = $rc['sID']+1;
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sName = $_POST['stallname'];
    $location = $_POST['location'];
    $tel = $_POST['tel'];
    $hour = $_POST['hour'];
    $error = 0;
    $sql = "SELECT * FROM shopkeeper";
    $rs = mysqli_query($conn, $sql);
    while($rc = mysqli_fetch_assoc($rs)){
        if($username==$rc['Username']){
            $error = 1;
            echo '<script language="javascript">';
            echo 'alert("This username has been used.");';
            echo '</script>';
        }
    }
    if($error != 1){
        $sql = 'INSERT INTO shopkeeper VALUES('.$skID.',"'.$username.'","'.$password.'",'.$sID.')';
        mysqli_query($conn,$sql);
        $sql = 'INSERT INTO stall VALUES('.$sID.','.$skID.',"'.$sName.'","'.$location.'",'.$tel.',"'.$hour.'")';
        mysqli_query($conn,$sql);
        echo '<script language="javascript">';
        echo 'alert("Shopkeepr account & stall has been created!");';
        echo '</script>';
    }
    
    header("refresh:0.1; url=AAcount.php")
?>