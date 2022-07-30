<html>

<head>
    <?php session_start(); ?>
    <title>Login</title>
    <link rel="icon" href="pictures/CCCC.png">
    <link rel="stylesheet" href="css/signup.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/loading.css">
    <?php
			function alert($string){
				echo '<script language="javascript">';
				echo 'alert("'.$string.'");';
				echo '</script>';
			}
	?>
</head>

<!--Sign Up form-->
<div id="particles-js2"></div>

<body>
    <?php
		if(isset($_POST['username'])){ //if isset post uid (won't be set at the first time user enter this page)
			$acc = false;
			$isset = false;
            $usertype = array("client","shopkeeper","admin");
            include 'sql_conn.php';
            $conn = conn();
            foreach($usertype as $ut){
                $sql = "SELECT * FROM ".$ut.";";
                $rs = mysqli_query($conn, $sql);
                while($rc = mysqli_fetch_assoc($rs)){
                    if($_POST['username']==$rc['Username']){
                        $acc = true;
                        if($_POST['password']==$rc['Password']){
                            $isset = true;
                            $_SESSION['login']=1;
                            $_SESSION['acType']=$ut;
                            $_SESSION['Uname']=$rc['Username'];
                            if($ut=="client"){
                                $_SESSION['ID']=$rc['cID'];
                            }else if($ut=="shopkeeper"){
                                $_SESSION['ID']=$rc['skID'];
                            }else{
                                $_SESSION['ID']=$rc['aID'];
                            }
                        }
                        break;
                    }
                }
            }
			if($isset){
                alert("Successfully login!");
                if($_SESSION['acType']=="client"){
                    header("refresh:0; url=Homepage.php");
                }else if($_SESSION['acType']=="shopkeeper"){
                    header("refresh:0; url=Dashboard.php");
                }else if($_SESSION['acType']=="admin"){
                    header("refresh:0; url=Dashboard.php");
                }
			}
			else if($acc){
				alert("Wrong password!");
			}
			else{
				alert("Account doesn't exist");
			}
		}
	?>
    <div id="slider">
		<div id="loading" class="loading">
		<p>Loading...</p>
	</div>
    <div id="particles-js">
        <div class="sign-up-form">
            <img src="pictures/CCCC.png">
            <h1> Login Now</h1>
            <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                <input type="text" id="username" name="username" class="input-box" placeholder="Your Username" required>
                <input type="password" id="password" name="password" class="input-box" placeholder="Your Password" required>
                <button type="submit" class="signup-btn" value="Submit">Login</button>
                <hr>
                <p>No account ? <a href="register.php">Sign up</a></p>
                </br>
                <a href="HomePage.php">Back to home page</a>
            </form>
        </div>
        <script type="text/javascript" src="js/particles.js"></script>
        <script type="text/javascript" src="js/app.js"></script>
        <script>
            $(document).ready(function(){
                $(".loading").delay(500).fadeOut(500);
            
            });
        </script> 
</body>

</html>