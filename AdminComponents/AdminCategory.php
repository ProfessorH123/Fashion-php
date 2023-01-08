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
    <td>Category</td>
    </tr>
    </thead>

    <?php
        include '../Components/config.php';
              $select_category = $conn->prepare("SELECT * FROM `category`");
              $select_category->execute();
              if($select_category->rowCount() > 0){
                 while($fetch_category = $select_category->fetch(PDO::FETCH_ASSOC)){
           ?>
           <tbody>
    <tr>
    <td><?php echo $fetch_category['CatName']; ?></td>
    <td>
    <span class="action_btn">
            <a href="deleteCategory.php?del=<?= $fetch_category['CatName']; ?>">Remove</a>
    </span>
    </td>
    </tr>
    </tbody>
    <?php }
    } ?>
</table>
</div>
<a href="AddCategory.php" class="add">add Category</a>
</body>
</html>