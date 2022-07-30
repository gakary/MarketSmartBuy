<!DOCTYPE html>
<html>

<link rel="stylesheet" href="home.css" />
<!--fontawesome-->
<script src="https://kit.fontawesome.com/6422b69724.js" crossorigin="anonymous"></script>

<script>
    function stickyMenu() {
        var sticky = document.getElementById('sticky');
        if (window.pageYOffset > 220) {
            sticky.classList.add('sticky');
        }
        else {
            sticky.classList.remove('sticky');
        }
    }
    window.onscroll = function () {
        stickyMenu();
    }

</script>

<head>
    <title>Market Smart Buy</title>
</head>

<body>

    <?php 
        session_start(); 
        include 'navbar.php';
    ?>

    <!--Main Page (Category) Content-->
    <div class="container">

            
            <div class="categories">
                <form action="Goods.php" method="POST" onclick="this.submit();" style="cursor: pointer;">
                    <input type="hidden" name="type" value="fv">
                    <img src="images/veg/veg1.jpg" class="item-image" />
                    <div class="image-title">Vegetables / Fruits</div>
                </form>
            </div>

            <div class="categories">
                <form action="Goods.php" method="POST" onclick="this.submit();" style="cursor: pointer;">
                    <input type="hidden" name="type" value="dry">
                    <img src="images/fruits/fruits1.jpg" class="item-image" />
                    <div class="image-title">Dry</div>
                </form>
            </div>

            <div class="categories">
                <form action="Goods.php" method="POST" onclick="this.submit();" style="cursor: pointer;">
                    <input type="hidden" name="type" value="meat">
                    <img src="images/MeatAndSeafood/meat1.jpg" class="item-image" />
                    <div class="image-title">Meat</div>
                </form>
            </div>
            
        <a href="Promotion.php">
            <div class="categories">
                <img src="images/Deals/deals1.jpg" class="item-image" />
                <div class="image-title" style="color: black;">Deals</div>
            </div>
        </a>
    </div>
    <!--End Main (Category) Page -->

    <!--Deals-->
    <div class="deals-container" id="deals">
        <div class="parallax">
            <div class="hp_title">DEALS</div>
        </div>

        <?php
            include 'sql_conn.php';
            $conn = conn();
            $sql = 'SELECT Title FROM promotion';
            $rs = mysqli_query($conn, $sql);
            $rc1 = mysqli_fetch_assoc($rs);
            $rc2 = mysqli_fetch_assoc($rs);
        ?>

        <div class="deal">
            <?php echo $rc1['Title']; ?><br />
            <button class="coupon-btn" onclick="location.href='Promotion.php'" style="cursor: pointer">Get Now</button>
        </div>

        <div class="deal">
            <?php echo $rc2['Title']; ?><br />
            <button class="coupon-btn" onclick="location.href='Promotion.php'" style="cursor: pointer">Get Now</button>
        </div>

    </div>
    <!--End Deals-->

        <footer>
            <div class="parallax2">
                <div class="footer">

                    <div class="quick-links">
                        <div style="font-size: 30px;">Contact Us</div>
                        <ul>
                            <li>+852 9443 6578</a></li>
                            <li>Smartbuy@service.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="copyrights">
                Copyright<i class="far fa-copyright fa-lx"></i>2021 Market Smart Buy
            </div>
        </footer>
    </body>
</html>