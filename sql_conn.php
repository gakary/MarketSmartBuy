<?php
    function conn(){
        $hostname = 'localhost';
		$username = 'root';
		$pwd = '';
        $db = 'fp_db';
        $conn = mysqli_connect($hostname,$username,$pwd,$db);
        return $conn;
    }
?>