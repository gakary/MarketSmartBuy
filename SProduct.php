<html>
    <head>
        <?php session_start(); ?>
        <link rel="stylesheet" type="text/css" href="css/profile.css">
        <link href="assets/css/basic.css" rel="stylesheet" />
    </head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Post product</h1>
            </div>
        </div>
        <div style="width:90%; margin: auto;">
            <form method="POST" action="S_Product.php" enctype="multipart/form-data">
                <p>Name<br><input type="text" id="productname" name="productname" required></p>
                <p>Type<br>
                <select name="type" id="type">
                    <option value="meat">Meat</option>
                    <option value="dry">Dry</option>
                    <option value="fv">Fruits / Vegetables</option>
                </select></p>
                <p>Price<br><input type="number" step="0.1" id="price" name="price" required></p>
                <p>Qty<br><input type="number" id="qty" name="qty" required></p>
                <p>Upload image<input type="file" name="ProductImage" accept=".png"></p>
                <div id="buttons">
                    <button id="submit" name="submit" type="submit">Post</button>
                </div>
            </form>
        </div>
    </body>

</html>