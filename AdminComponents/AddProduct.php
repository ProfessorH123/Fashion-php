<?php
    include '../Components/config.php';
    if(isset($_GET['addP']))
    {
        $id = create_unique_id();
        $name = $_GET['name'];
        $price = $_GET['price'];
        $cat = $_GET['cat'];
        $im = $_GET['image'];

        $add_product = $conn->prepare("INSERT INTO `products`(id, NameP, PriceP, ImageP,CatName) VALUES(?,?,?,?,?)");
        $add_product->execute([$id, $name, $price, $im,$cat]);
        header("location:list_product.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add Product</title>
    <link rel="stylesheet" href="../LogSign/up.css">
        <!--==Using-Font-Awesome======================-->
        <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>
<body>
<section class="update-profile-container">

<form action="" method="get" enctype="multipart/form-data">
   <div class="flex">
      <div class="inputBox">
         <span>Product Name : </span>
         <input class="box" type="text" name="name" />
         <span>Product Price : </span>
         <input class="box" type="number" name="price" />
         <span>Product Category : </span>
         <select class="box" name="cat">
         <?php 
      $select_products = $conn->prepare("SELECT * FROM `category` ");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){
        ?>
            <option value="<?php echo $fetch_prodcut['CatName'];?>"><?php echo $fetch_prodcut['CatName'];?></option>
        <?php }} ?>
        </select>
         <span>Upload Photo : </span>
         <button type = "button" class = "box btn-Photo">
              <i class = "fa fa-upload"></i>
              <input type="file" id="f1" name="image">
        </button>
      </div>
      <div class="inputBox" style="margin-top:120PX;margin-left:10PX">
      <p id="demo"></p>
      </div>
   </div>
   <div class="flex-btn">
   <input type="submit" name="addP"  value="Add Product" class="btn" />
      <a href="list_product.php" class="option-btn">go back</a>
   </div>
</form>

</section>
<script>
    function maFonction(){
        var r = new FileReader();
        var f1=document.getElementById('f1').files[0];
        r.readAsDataURL(f1);r.onload=function()
        {document.getElementById("demo").innerHTML ='<img width="100px"  src="'+r.result+'"/>';}
    }
    document.getElementById("f1").addEventListener("change", maFonction);
</script>
</body>
</html>