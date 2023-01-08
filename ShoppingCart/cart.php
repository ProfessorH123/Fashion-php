<?php
    include '../Components/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
    <!--==Using-Css-File======================-->
    <link rel="stylesheet" href="style.css">
    <!--==Using-Font-Awesome======================-->
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script></head>

<body>

  <main class="container">

    <h1 class="heading">
      <i class="fas fa-shopping-cart"></i> Shopping Cart
    </h1>

    <div class="item-flex">

      <section class="checkout">

        <h2 class="section-heading">Payment Details</h2>

        <div class="payment-form">

          <div class="payment-method">

            <button class="method selected">
              <i class="fas fa-credit-card"></i>
              <span>Credit Card</span>
            </button>
          </div>

          <form metod="get" action="order.php">

            <div class="cardholder-name">
              <label for="cardholder-name" class="label-default">Cardholder name</label>
              <input type="text" required name="cardholder_name" id="cardholder-name" class="input-default">
            </div>

            <div class="card-number">
              <label for="card-number" class="label-default">Card number</label>
              <input type="number" required name="card_number" id="card-number" class="input-default">
            </div>

            <div class="input-flex">

              <div class="expire-date">
                <label for="expire-date" required class="label-default">Expiration date</label>

                <div class="input-flex">

                  <input type="number" required name="day" id="expire-date" placeholder="31" min="1" max="31" class="input-default">
                  /
                  <input type="number" required name="month" id="expire-date" placeholder="12" min="1" max="12" class="input-default">

                </div>
                
              </div>

              
            </div>

            <div class="Adress" style="margin-top: 20px;">
              <label for="Adress" class="label-default">User Adress</label>
              <input type="text" required name="Adress" id="Adress" class="input-default">
              <input type="hidden" name="User_id" value="<?php echo $_GET["User_id"] ;?>">
            </div>

            <button style="margin-top: 20px;" type="submit" name="place_order" class="btn btn-primary">
          <b>Pay</b> $ <span id="payAmount">
          <?php
                  $x=$_GET["User_id"];
                  $select_cart=$conn->query("SELECT * FROM `cart` WHERE User_id = '$x' ");
                  $tot=0;
                  if($select_cart->rowCount() > 0){
                    while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
                      $tot+= $fetch_cart['Total']*$fetch_cart['Qte'];
                    }
                  }
                  echo $tot;
              ?>
          </span>
        </button>
        <a href="../index.php" class="btn btn-primary" style="margin-top: 20px;" >Return</a>
          </form>

        </div>

      </section>


      <!--- cart section-->
      <section class="cart">

        <div class="cart-item-box">

          <h2 class="section-heading">Your Orders</h2>
          <?php

    $x=$_GET["User_id"];
    $select_cart=$conn->query("SELECT c.*,p.ImageP,p.NameP FROM `cart` c, `products` p  WHERE User_id = '$x' and p.id = Product_id");
    if($select_cart->rowCount() > 0){
      while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
?>
          <div class="product-card">

            <div class="card">

              <div class="img-box">
                <img src="../images/<?php echo $fetch_cart['ImageP']; ?>"  width="80px" class="product-img">
              </div>

              <div class="detail">

                <h4 class="product-name"><?php echo $fetch_cart['NameP']; ?></h4>

                <form action="EditQte.php" method="get" class="wrapper">
                  <input type="hidden" value="<?php echo $fetch_cart["Product_id"]; ?>" name="Product_id">
                  <input type="hidden" value="<?php echo $fetch_cart["User_id"]; ?>" name="User_id">
                  <div class="product-qty">
                    <input type="number" min="1" value="<?php echo $fetch_cart['Qte']; ?>" name="quantity">
                  </div>

                  <div class="price">
                    $ <span id="price"><?php echo $fetch_cart['Total']; ?></span>
                  </div>

                  <div class="ww" style="margin-left: 100px; cursor: pointer;">
                  <button type="submit" name="update_cart" class='fas fa-edit'></button>
                  <button type="submit" name="delete_item" class='fas fa-times'></button>
                  </div>

                  </form>

              </div>

              <button class="product-close-btn">
              </button>

            </div>

          </div>
<?php }} ?>
        </div>

        <div class="wrapper">

          <div class="discount-token">

            <div class="wrapper-flex">
              <a href="clear.php?uid=<?= $x; ?>">
                <button class="btn btn-outline" style="width:100%">Clear</button>
              </a>
            </div>

          </div>
          <div class="amount">
            <div class="total">
              <span>Total</span> <span>$ <span id="total">
              <?php
                  $x=$_GET["User_id"];
                  $select_cart=$conn->query("SELECT * FROM `cart` WHERE User_id = '$x' ");
                  $tot=0;
                  if($select_cart->rowCount() > 0){
                    while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
                      $tot+= $fetch_cart['Total']*$fetch_cart['Qte'];
                    }
                  }
                  echo $tot;
              ?>
              </span></span>
            </div>

          </div>

        </div>

      </section>

    </div>

  </main>


</body>

</html>