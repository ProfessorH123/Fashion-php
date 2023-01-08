<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin.css">
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
<div class="my">
<?php
include '../Components/config.php';
    $select_cont=$conn->query("SELECT * FROM contact");
    if($select_cont->rowcount() >0){
        while($fetch_cont = $select_cont->fetch(PDO::FETCH_ASSOC)){
?>
                    <div class="mydiv">
                    <div class='hhh'>
                    <h1>Name: <?php echo $fetch_cont['cont_user']; ?></h1><br>
                    <h1>Mail: <?php echo $fetch_cont['cont_email']; ?></h1><br>
                    <h1>Phone: <?php echo $fetch_cont['cont_tel']; ?></h1><br>
                    <h1>Message:</h1> <div style='font-size: 23px;'><?php echo $fetch_cont['cont_TEXT']; ?></div>
                    <a href="delete_Msg.php?id=<?= $fetch_cont['id']; ?>"><i style='float:right;margin-top:7px;font-size:20px;color:black' class='fa fas fa-trash'></i></a>
                    </div>
                    </div>
<?php }} ?>
</div>
</body>
</html>