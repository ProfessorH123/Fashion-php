<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="../ShoppingCart/order.css">
    <!--==Using-Font-Awesome======================-->
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<header>
      <div class="xx">
      <a style="text-decoration:none;" href="../admin.php">Home</a>
      <a style="text-decoration:none;" href="list_product.php">Products</a>
      <a style="text-decoration:none;" href="AdminOrders.php">orders</a>
      <a style="text-decoration:none;" href="AdminCategory.php">Category</a>
      <a style="text-decoration:none;" href="AdminContact.php">Contact</a>
      </div>
</header>


<section class="orders">
    <div class="box-container">
    <?php
        include '../Components/config.php';
      $select_orders = $conn->prepare("SELECT o.*,p.NameP,p.id,p.ImageP FROM `orders` o , `products` p  WHERE o.product_id = p.id and status <> 'canceled' ORDER BY DateC DESC");
      $select_orders->execute();
      if($select_orders->rowCount() > 0){
        while($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
        <div class="box">
        <?php if($fetch_order['status'] == 'in progress'){ ?>
        <a href="repture.php?idO=<?= $fetch_order['idO']; ?>&idu=<?= $fetch_order['user_id']; ?>"  onclick="return confirm('Out of stock?');" >
        <p class="date" style="float:right;"><i class="fas fa-arrow-left"></i></p>
        </a>
        <a href="status.php?idO=<?= $fetch_order['idO']; ?>&idu=<?= $fetch_order['user_id']; ?>" onclick="return confirm('Approuve this order?');">
         <p class="date"><i class="fa fa-calendar"></i><span><?= $fetch_order['DateC']; ?></span></p>
         <img src="../images/<?= $fetch_order['ImageP']; ?>" class="image" alt="">
         <h3 class="name">Product Name: <?= $fetch_order['NameP']; ?></h3>
         <p class="price">Procuct Price: $<?= $fetch_order['price']; ?> x <?= $fetch_order['Qte']; ?></p>
         <p class="price">Total: $<?= $fetch_order['price'] * $fetch_order['Qte']; ?></p>
         <p class="status" style="text-transform:capitalize;color:<?php if($fetch_order['status'] == 'out of stock'){echo 'blue';}elseif($fetch_order['status'] == 'delivered'){echo 'green';}elseif($fetch_order['status'] == 'canceled'){echo 'var(--color)';}else{echo 'orange';};  ?>"><?= $fetch_order['status']; ?></p><br>
         <h3 style="float:left; margin-left:20px" class="name">Order id: <?= $fetch_order['idO']; ?></h3><br><br>
         <h3 style="float:left; margin-left:20px" class="name">To : <?= $fetch_order['CardName']; ?></h3><br><br>
         <h3 style="float:left; margin-left:20px" class="name">Address : <?= $fetch_order['Adress']; ?></h3>
      </a>
      <?php } elseif($fetch_order['status'] != 'in progress') {?>
        <p class="date"><i class="fa fa-calendar"></i><span><?= $fetch_order['DateC']; ?></span></p>
         <img src="../images/<?= $fetch_order['ImageP']; ?>" class="image" alt="">
         <h3 class="name">Product Name: <?= $fetch_order['NameP']; ?></h3>
         <p class="price">Procuct Price: $<?= $fetch_order['price']; ?> x <?= $fetch_order['Qte']; ?></p>
         <p class="price">Total: $<?= $fetch_order['price'] * $fetch_order['Qte']; ?></p>
         <p class="status" style="text-transform:capitalize;color:<?php if($fetch_order['status'] == 'out of stock'){echo 'blue';}elseif($fetch_order['status'] == 'delivered'){echo 'green';}elseif($fetch_order['status'] == 'canceled'){echo 'var(--color)';}else{echo 'orange';};  ?>"><?= $fetch_order['status']; ?></p><br>
         <h3 style="float:left; margin-left:20px" class="name">Order id: <?= $fetch_order['idO']; ?></h3><br><br>
         <h3 style="float:left; margin-left:20px" class="name">To : <?= $fetch_order['CardName']; ?></h3><br><br>
         <h3 style="float:left; margin-left:20px" class="name">Address : <?= $fetch_order['Adress']; ?></h3>
         <?php }?>
        </div>
        <?php
            }
         }
else{
      echo '<p class="empty">no orders found!</p>';
   }
   ?>
    </div>
</section>


</body>
</html>