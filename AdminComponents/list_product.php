<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin.css">
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
<div class="table_responsive">
<table border="2">
    <thead>
            <tr>
    <td>id</td>
    <td>name</td>
    <td>price</td>
    <td>category</td>
    <td>image</td>
    </tr>
    </thead>

    <?php
        include '../Components/config.php';
              $select_products = $conn->prepare("SELECT * FROM `products`");
              $select_products->execute();
              if($select_products->rowCount() > 0){
                 while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){
           ?>
           <tbody>
                <tr>
    <td><?php echo $fetch_prodcut['id']; ?></td>
    <td><?php echo $fetch_prodcut['NameP']; ?></td>
    <td><?php echo $fetch_prodcut['PriceP']; ?></td>
    <td><?php echo $fetch_prodcut['CatName']; ?></td>
    <td><img src="../images/<?php echo $fetch_prodcut['ImageP']; ?>" alt=""></td>
    <td>
    <span class="action_btn">
            <a href="UpdateProduct.php?up=<?= $fetch_prodcut['id']; ?>">Edit</a>
            <a href="deleteProduct.php?del=<?= $fetch_prodcut['id']; ?>">Remove</a>
    </span>
    </td>
    </tr>
    </tbody>
    <?php }
    } ?>
</table>
</div>
<a href="AddProduct.php" class="add">add product</a>
</body>
</html>