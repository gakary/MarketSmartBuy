<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Goods</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/Goods.css">
    <link rel="stylesheet" type="text/css" href="css/card.css">
</head>

<body>
    <?php 
        session_start(); 
        include 'navbar.php';
    ?>
    <div class="goods" style="margin-top: 30px; width: 65%">

        <?php
            include 'sql_conn.php';
            $conn = conn();
            $sql = "SELECT * FROM goods";
			if(isset($_POST['type']) && $_POST['type']!=" "){
                if(isset($_POST['price'])){
                    switch($_POST['price']){
                        case '50':
                            $sql = 'SELECT * FROM goods where GoodsType = "'.$_POST['type'].'" AND Price <= 50 AND Qty > 0;';
                            break;
                        case '50-150':
                            $sql = 'SELECT * FROM goods where GoodsType = "'.$_POST['type'].'" AND Price > 50 AND Price <= 150 AND Qty > 0;';
                            break;
                        case '150-300':
                            $sql = 'SELECT * FROM goods where GoodsType = "'.$_POST['type'].'" AND Price > 150 AND Price <= 300 AND Qty > 0;';
                            break;
                        case '300':
                            $sql = 'SELECT * FROM goods where GoodsType = "'.$_POST['type'].'" AND Price > 300 AND Qty > 0;';
                            break;
                    }
                }else{
                    $sql = 'SELECT * FROM goods where GoodsType = "'.$_POST['type'].'";';
                }
            }else if(isset($_POST['price'])){
                switch($_POST['price']){
                    case '50':
                        $sql = 'SELECT * FROM goods where Price <= 50 AND Qty > 0;';
                        break;
                    case '50-150':
                        $sql = 'SELECT * FROM goods where Price > 50 AND Price <= 150 AND Qty > 0;';
                        break;
                    case '150-300':
                        $sql = 'SELECT * FROM goods where Price > 150 AND Price <= 300 AND Qty > 0;';
                        break;
                    case '300':
                        $sql = 'SELECT * FROM goods where Price > 300 AND Qty > 0;';
                        break;
                }
            }
            $rs = mysqli_query($conn, $sql);
			while($rc = mysqli_fetch_assoc($rs)){
        ?>
             
            <form method="POST" action="addToSC.php" style="display: block; margin: 0;">
                <div class="card">
                    <img class="cardIMG" src="img/goods/<?php echo($rc['GoodsID']); ?>.png" style="width:100%">
                    <h1><?php echo($rc['GoodsName']); ?></h1>
                    <p class="price" 
                    <?php
                        if(!isset($_SESSION['acType'])){
                    ?>
                            style="margin-right: 20%;"
                    <?php
                        }
                    ?>
                    >$
                        <?php echo($rc['Price']); ?>
                    <?php
                        if(isset($_SESSION['acType'])){
                    ?>
                        <input type="number" class="qty" name="qty" min="0" max="<?php echo($rc['Qty']); ?>" style="height: 30px; width:45px; float: right" required>
                    </p>
                        <input type="hidden" name="gID" value="<?php echo($rc['GoodsID']) ?>">
                        <input type="hidden" name="gName" value="<?php echo($rc['GoodsName']) ?>">
                        <input type="hidden" name="price" value="<?php echo($rc['Price']) ?>">
                        <button type="submit">Add to Cart</button>
                    <?php
                        }else{
                            echo "</p>";
                        }
                    ?>
                </div> 
            </form>
        <?php
            }
        ?>
    </div>

    <div class="filter">
        <div style="height: 5%"></div>
        <div class="FContent">
            <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                <span>
                    Type of Goods
                    <select id="type" name="type">
                        <option value=" ">Choose a type</option>
                        <option value="meat">Meat</option>
                        <option value="dry">Dry Goods</option>
                        <option value="fv">Fruits and Vegetables</option>
                    </select>
                </span>

                <div id="div_price">
                    Price<br>
                    &emsp;<input type="radio" id="50" name="price" value="50">
                    <label for="50">Below 50</label><br>
                    &emsp;<input type="radio" id="50-150" name="price" value="50-150">
                    <label for="50-150">50-150</label><br>
                    &emsp;<input type="radio" id="150-300" name="price" value="150-300">
                    <label for="150-300">150-300</label><br>
                    &emsp;<input type="radio" id="300" name="price" value="300">
                    <label for="300">Over 300</label><br>
                </div>

                <button class="FilterSubmit" type="submit">Filter</button>
            </form>
        </div>
    </div>

</body>

</html>