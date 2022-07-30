<?php 
    session_start();
    include 'sql_conn.php';
    $conn = conn();
    $stallname = $_POST['stallname'];
    $location = $_POST['location'];
    $tel = $_POST['tel'];
    $hour = $_POST['hour'];
    $sql = 'UPDATE Stall SET StallName = "'.$stallname.'",Location = "'.$location.'",Tel = "'.$tel.'",BusinessHours = "'.$hour.'" WHERE sID = '.$_SESSION['ID'].'';
    mysqli_query($conn,$sql);
    echo '<script language="javascript">';
    echo 'alert("Stall information changed!");';
    echo '</script>';
    header("refresh:0.1; url=SShop.php")
?>