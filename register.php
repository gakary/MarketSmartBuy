<html>

<head>
    <?php session_start(); ?>
    <title>Registration</title>
    <link rel="icon" href="pictures/CCCC.png">
    <link rel="stylesheet" href="css/signup.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,700" rel="stylesheet">
    <!--v sign in with gmail v-->
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!--^ sign in with gmail ^-->

</head>

<!--Sign Up form-->

<body>
    <div class="sign-up-form">
        <img src="pictures/CCCC.png">
        <h1> Sign Up Now</h1>
        <form action="reg.php" method="POST">
            <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="input-box" placeholder="Email" required>
            <input type="text" name="username" class="input-box" placeholder="User name" required>
            <input type="password" name="password" class="input-box" placeholder="Password" required>
            <input type="tel" name="tel" class="input-box" placeholder="Phone number" pattern="[0-9]{8}" required>
            <p><span><input type="checkbox" required></span>I agree to the <a onclick="myFunction()" style="color: blue; cursor: pointer;">terms of services</a></p>
            <button type="submit" class="signup-btn">Sign up</button>
            <hr>
            </br>
            <a href="HomePage.php">Back to home page</a>
        </form>
    </div>
    <!--This is alert onclick event of the terms of services-->
    <script>
        function myFunction() {
            alert("Privacy Policy :\nYour personal details will be stored in our database to be a reference . We will not use for another purpose .");
        }
    </script>
</body>

</html>