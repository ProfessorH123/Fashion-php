<?php
include '../Components/config.php';
/*
if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
 }else{
    setcookie('user_id', create_unique_id(), time() + 60*60*24*30);
 }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="order.css">
    <!--==Using-Font-Awesome======================-->
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body><br><br>
    <a href="../index.php" class="returnbtn" >return</a>
<section class="orders">
    <div class="box-container">
    <?php
    $xx=$_GET['iidd'];
      $select_orders = $conn->prepare("SELECT o.*,p.NameP,p.id,p.ImageP FROM `orders` o , `products` p  WHERE o.user_id = ? and o.product_id = p.id ORDER BY DateC,status DESC");
      $select_orders->execute([$xx]);
      if($select_orders->rowCount() > 0){
        while($fetch_order = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
        <div class="box">
        <?php if($fetch_order['status'] == 'in progress'){ ?>
        <a href="status.php?idO=<?= $fetch_order['idO']; ?>&idu=<?= $fetch_order['user_id']; ?>" onclick="return confirm('Cancel this order?');" >
         <p class="date"><i class="fa fa-calendar"></i><span><?= $fetch_order['DateC']; ?></span></p>
         <img src="../images/<?= $fetch_order['ImageP']; ?>" class="image" alt="">
         <h3 class="name">Product Name: <?= $fetch_order['NameP']; ?></h3>
         <p class="price">Procuct Price: $<?= $fetch_order['price']; ?> x <?= $fetch_order['Qte']; ?></p>
         <p class="price">Total: $<?= $fetch_order['price'] * $fetch_order['Qte']; ?></p>
         <p class="status" style="text-transform:capitalize;color:<?php if($fetch_order['status'] == 'out of stock'){echo 'blue';}elseif($fetch_order['status'] == 'delivered'){echo 'green';}elseif($fetch_order['status'] == 'canceled'){echo 'var(--color)';}else{echo 'orange';};  ?>"><?= $fetch_order['status']; ?></p><br>
      </a>
      <?php } else{?>
        <p class="date"><i class="fa fa-calendar"></i><span><?= $fetch_order['DateC']; ?></span></p>
         <img src="../images/<?= $fetch_order['ImageP']; ?>" class="image" alt="">
         <h3 class="name">Product Name: <?= $fetch_order['NameP']; ?></h3>
         <p class="price">Procuct Price: $<?= $fetch_order['price']; ?> x <?= $fetch_order['Qte']; ?></p>
         <p class="price">Total: $<?= $fetch_order['price'] * $fetch_order['Qte']; ?></p>
         <p class="status" style="text-transform:capitalize;color:<?php if($fetch_order['status'] == 'out of stock'){echo 'blue';}elseif($fetch_order['status'] == 'delivered'){echo 'green';}elseif($fetch_order['status'] == 'canceled'){echo 'var(--color)';}else{echo 'orange';};  ?>"><?= $fetch_order['status']; ?></p><br>
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