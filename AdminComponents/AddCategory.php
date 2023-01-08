<?php
    include '../Components/config.php';
    if(isset($_GET['addCat']))
    {
        $cat = $_GET['cat'];
        $select_Category = $conn->prepare(" SELECT * from `category` where CatName = ?");
        $select_Category->execute([$cat]);

        if($select_Category->rowCount() == 0){
            $add_Category = $conn->prepare("INSERT INTO `category`(CatName) VALUES(?)");
            $add_Category->execute([$cat]);
            header("location:AdminCategory.php");
        }
        else
        {
            $warning_msg[]= 'category exist';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add category</title>
    <link rel="stylesheet" href="../LogSign/up.css">
        <!--==Using-Font-Awesome======================-->
        <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>
<body>
<section class="update-profile-container">

<form action="" method="get" enctype="multipart/form-data">
   <div class="flex">
      <div class="inputBox">
         <span>Add New Category : </span>
         <input class="box" type="text" name="cat" />
      </div>
   </div>
   <div class="flex-btn">
   <input type="submit" name="addCat"  value="Add Cat" class="btn" />
      <a href="AdminCategory.php" class="option-btn">go back</a>
   </div>
</form>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<?php include '../Components/messages.php'; ?>
</body>
</html>