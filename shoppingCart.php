<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Shopping Cart</title>
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
  <link rel="stylesheet" type="text/css" href="css/shopCart.css">
</head>
</body>
    <?php 
        session_start(); 
        include 'navbar.php';
    ?>
    <?php
        $TTprice = 0;
        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){ //if SESSION cart isset and not empty (it will be empty when user added a product and remove it)
    ?>
    <table class="ShopCart">
    <tr>
        <th class="image"></th>
        <th class="ID">ID</th>
        <th class="Name">Name</th>
        <th class="Qty">Qty</th>
        <th class="Price">Price</th>
        <th class="delete"></th>
    </tr>
    <?php
            include 'sql_conn.php';
            $conn = conn();
            foreach($_SESSION['cart'] as $cart){ //for each record in SESSION cart, show one row with details of the product in table
              echo '<tr class="content">';
              echo '<td class="image"><img src="img/goods/'.$cart['GoodsID'].'.png"></td>';
              echo '<td class="ID">'.$cart['GoodsID'].'</td>';
              echo '<td class="Name">'.$cart['GoodsName'].'</td>';
              echo '<td class="Qty">'.$cart['qty'].'</td>';
              echo '<td class="Price">';
              $sql = 'SELECT Discount FROM coupon c WHERE c.GoodsID = '.$cart['GoodsID'].' AND c.cID = '.$_SESSION['ID'].' AND "'.date('Y-m-d').'" <= c.Expirytion;';
              $rs = mysqli_query($conn, $sql);
              if(mysqli_num_rows($rs)!=0){
                $rc = mysqli_fetch_assoc($rs);
                echo "<s>".($cart['Price']*$cart['qty'])."</s>";
                echo '<span style="font-size: 30px; color: red;">  '.(($cart['Price']*$cart['qty'])*$rc['Discount']).'</span>';
                $TTprice += ($cart['Price']*$cart['qty'])*$rc['Discount'];
              }else{
                echo ($cart['Price']*$cart['qty']);
                $TTprice += $cart['Price']*$cart['qty'];
              }
              echo '</td>';
              echo '<td><form method="POST" action="RemoveSC.php"><input type="hidden" name="RMkey" value="'.$cart['GoodsID'].'"><button type="submit" class="Remove">Remove</button></form></td>';
              echo "</tr>";
            }
          ?>
  </table>
  <div class="Result"> <!--Display the result to user (total price, shipping price, final price)-->
    <form class="totals">
      <div class="totals-item">
        <label>Total Price</label>
        <div class="totals-value" id="totalPrice"><?php echo $TTprice; ?></div>
      </div>
      <div class="totals-item">
        <label>Final Price</label>
        <div class="totals-value" id="finalPrice"><?php echo ($TTprice);?></div>
      </div>
    </form>
    <div style="float:right; scale: 2; margin-right: 150px; margin-top: 50px;"><div id="paypal-payment-button"></div></div>
  </div>
  <?php
          }
          else{ //if SESSION cart isn't set yet or empty
          ?>
  <div class="Empty">
    <p>Your shop cart is empty</p>
    <img src="img/empty.png">
  </div>
  <?php
          }
  ?>

  <script src="https://www.paypal.com/sdk/js?client-id=ATqJoT8uledW83BN2RvdA4o9tptMnGw4EUVlV1na6YHhKgqXEHcJXE8t0EZLGsDr4mybfMJ5nXxL10vQ&disable-funding=credit,card"></script>
  <script src="index.js"></script>
  
</body>

</html>