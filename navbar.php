<html>
    <head>
        <link rel="stylesheet" href="home.css" />
    </head>
    <body>
    <?php
        if(!isset($_SESSION['acType'])){
    ?>

    <div class="parallax">

        <div class="page-title">Smart Buy</div>

        <!--menu bar-->
        <div class="menu" id="sticky">
            <ul class="menu-ul">
                <a href="HomePage.php" class="a-menu">
                    <li>HOME</li>
                </a>
                <a href="Goods.php" class="a-menu">
                    <li>GOODS</li>
                </a>
                <a href="Promotion.php" class="a-menu">
                    <li>PROMOTION</li>
                </a>
                <a href="StallList.php" class="a-menu">
                    <li>STALL</li>
                </a>
                <a href="login.php" class="a-menu">
                    <li>LOGIN</li>
                </a>
                <a href="register.php" class="a-menu">
                    <li>REGISTER</li>
                </a>
            </ul>
        </div>

        <?php
        }else{
    ?>
      <div class="parallax">

<div class="page-title">Smart Buy</div>
    <div class="menu" id="sticky">
            <ul class="menu-ul">
                <a href="HomePage.php" class="a-menu">
                    <li>HOME</li>
                </a>
                <a href="Goods.php" class="a-menu">
                    <li>GOODS</li>
                </a>
                <a href="Promotion.php" class="a-menu">
                    <li>PROMOTION</li>
                </a>
                <a href="StallList.php" class="a-menu">
                    <li>STALL</li>
                </a>
                <a href="shoppingCart.php" class="a-menu">
                    <li>SHOPCART</li>
                </a>
                <a href="Dashboard.php" class="a-menu">
                    <li>PROFILE</li>
                </a>
                <a href="logout.php" class="a-menu">
                    <li>LOGOUT</li>
                </a>
            </ul>
        </div>

        <?php
        }
        ?>
        <!--End -->
    </div>
    </body>
</html>