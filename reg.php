<?php
    function alert($string){
        echo '<script language="javascript">';
        echo 'alert("'.$string.'");';
        echo '</script>';
    }
    $error = 0;
    include 'sql_conn.php';
    $conn = conn();
    $sql = "SELECT * FROM client";
    $rs = mysqli_query($conn, $sql);
    while($rc = mysqli_fetch_assoc($rs)){
        if($_POST['email']==$rc['Email']){
            $error = 1;
            alert("This email has been used.");
        }
        else if($_POST['username']==$rc['Username']){
            $error = 1;
            alert("This user name has been used.");
        }
    }
    $sql = "SELECT cID FROM client WHERE cID = (SELECT MAX(cID) FROM client);";
    $rs = mysqli_query($conn, $sql);
    if(mysqli_num_rows($rs)==0){
        $cID = 1;
    }else{
        while($rc = mysqli_fetch_assoc($rs)){
            $cID = $rc['cID'];
        }
    }
    if($error==0){
        $sql = 'INSERT INTO client VALUES ('.($cID+1).',"'.$_POST['username'].'","'.$_POST['password'].'","'.$_POST['email'].'",'.$_POST['tel'].')';
        if (mysqli_query($conn, $sql)) {
            alert("Register succeess!");
            header("refresh:2; url=HomePage.php");
          } else {
            alert("Error: " . $sql . "<br>" . mysqli_error($conn));
            header("refresh:2; url=register.php");
          }
    }
        header("refresh:0.1; url=register.php");
?>