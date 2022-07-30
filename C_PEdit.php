<?php 
    session_start();
    include 'sql_conn.php';
    $conn = conn();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql = 'UPDATE client SET Username = "'.$username.'",Password = "'.$password.'",Email = "'.$email.'",PhoneNum = "'.$phone.'" WHERE cID = '.$_SESSION['ID'].'';
    mysqli_query($conn,$sql);
    mysqli_query($conn,$sql);
    echo '<script language="javascript">';
    echo 'alert("Account information changed!");';
    echo '</script>';
    header("refresh:0.1; url=CProfile.php")
?>