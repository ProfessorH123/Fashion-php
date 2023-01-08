<?php

include 'Components/config.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   //header('location:index.php');
}

$select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$select_profile->execute([$user_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
</head>
<body>

<header>
      <div class="xx">
      <a style="text-decoration:none;" href="../admin.php">Home</a>
      <a style="text-decoration:none;" href="AdminComponents/list_product.php">Products</a>
      <a style="text-decoration:none;" href="AdminComponents/AdminOrders.php">orders</a>
      <a style="text-decoration:none;" href="AdminComponents/AdminCategory.php">Category</a>
      <a style="text-decoration:none;" href="AdminComponents/AdminContact.php">Contact</a>
      </div>
</header>

<div class="mydiv" style="transform: translate(126% , 80%);">
        <div class="hh">
            <h1>
                Welcome admin <?php echo '<span>'.$fetch_profile['Name'].'</span>';?><br>
                <a style="color:black;font-size:20px" onclick="return confirm('logout from the website?');" href="LogSign/Logout.php">Logout</a>
            </h1>
        </div>
</div></body>
</html>