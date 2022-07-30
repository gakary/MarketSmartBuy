<html>
    <head>
        <?php session_start(); ?>
        <link rel="stylesheet" type="text/css" href="css/profile.css">
        <link href="assets/css/basic.css" rel="stylesheet" />
    </head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Edit product</h1>
            </div>
        </div>
        <div style="width:90%; margin: auto;">
            <form method="POST" action="S_EProduct.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>" required>
                <p>Name<br><input type="text" id="productname" name="productname" value="<?php echo $_POST['name'] ?>" required></p>
                <p>Type<br>
                <select name="type" id="type">
                    <option value="meat" <?php if($_POST['type']=="meat"){echo "selected";} ?>>Meat</option>
                    <option value="dry" <?php if($_POST['type']=="dry"){echo "selected";} ?>>Dry</option>
                    <option value="fv" <?php if($_POST['type']=="fv"){echo "selected";} ?>>Fruits / Vegetables</option>
                </select></p>
                <p>Price<br><input type="number" step="0.1" id="price" name="price" value="<?php echo $_POST['price'] ?>" required></p>
                <p>Qty<br><input type="number" id="qty" name="qty" value="<?php echo $_POST['qty'] ?>" required></p>
                <p>Upload image<input type="file" name="ProductImage" accept=".png"></p>
                <div id="buttons">
                    <button id="submit" name="submit" type="submit">Edit</button>
                </div>
            </form>
        </div>
    </body>

</html>