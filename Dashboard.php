<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php session_start(); ?>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Market Smart Buy</title>
    <link rel="icon" href="pictures/CCCC.png">
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".db-link").click(function () {
                if($(this).attr('value')!=$('#page-inner').attr("src")){
                    $(".db-link").css('background',"none");
                    $(this).css('background', "#00ca79b9");
                    $src = $(this).attr('value');
                    $('#page-inner').fadeOut(300, function() {
                        $('#page-inner').attr("src",$src);
                    }).fadeIn(300);
                }
            });
        });
    </script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="
                <?php
                    if($_SESSION['acType']=="client"){
                        echo "HomePage.php";
                    }else{
                        echo "Dashboard.php";
                    }
                ?>
                " style="padding-top: 0px;"><img class="CCbrand"
                        src='assets/img/CCCC.png' width='80px'></a>
            </div>

            <div class="header-right">
                <a href="logout.php" class="btn btn-danger" title="Logout"><img style="width: 30px;"
                        src="img/Logout.png"></a>
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-div">
                            <div class="welcome" width="60">
                                Welcome
                            </div>

                            <div class="inner-text">
                                <?php echo $_SESSION['Uname']; ?>
                                <br />
                                <small><?php echo $_SESSION['acType']; ?> </small>
                            </div>
                        </div>
                    </li>

                    <?php
                        if($_SESSION['acType']=="client"){
                    ?>

                    <li>
                        <button class="db-link" type="button" value="CProfile.php">Profile</button>
                    </li>
                    <li>
                        <button class="db-link" type="button" value="COrder.php">Order</button>
                    </li>
                    <li>
                        <button class="db-link" type="button" value="CCoupon.php">Coupon</button>
                    </li>

                    <?php
                        }else if($_SESSION['acType']=="shopkeeper"){
                    ?>

                    <li>
                        <button class="db-link" type="button" value="SShop.php">Shop</button>
                    </li>
                    <li>
                        <button class="db-link" type="button" value="SVProduct.php">Product</button>
                    </li>
                    <li>
                        <button class="db-link" type="button" value="SPromotion.php">Promotion</button>
                    </li>
                    <li>
                        <button class="db-link" type="button" value="SOrder.php">Order</button>
                    </li>

                    <?php
                        }else if($_SESSION['acType']=="admin"){
                    ?>

                    <li>
                        <button class="db-link" type="button" value="AAcount.php">Account</button>
                    </li>
                    <li>
                        <button class="db-link" type="button" value="AProduct.php">Product</button>
                    </li>
                    <li>
                        <button class="db-link" type="button" value="AOrder.php">Order</button>
                    </li>

                    <?php
                        }
                    ?>

                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
             <iframe id="page-inner" src="
             <?php
                if($_SESSION['acType']=="client"){
                    echo "CProfile.php";
                }else if($_SESSION['acType']=="shopkeeper"){
                    echo "SShop.php";
                }else if($_SESSION['acType']=="admin"){
                    echo "AAcount.php";
                }
             ?>
             " title="W3Schools Free Online Web Tutorials"></iframe> 
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2021 HK Market Smart Buy | All rights reserved
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
</body>

</html>