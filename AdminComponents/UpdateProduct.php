<?php
    include '../Components/config.php';

    $x=$_GET["up"];
    $select_product=$conn->query("SELECT * FROM `products` WHERE id = '$x'");
    $row=$select_product->fetch(PDO::FETCH_ASSOC);
        $name=$row['NameP'];
        $Price=$row['PriceP'];
        $image=$row['ImageP'];
        $cat=$row['CatName'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="../LogSign/up.css">
        <!--==Using-Font-Awesome======================-->
        <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>
<body>
<section class="update-profile-container">

<form action="UpdatedProduct.php" method="get" enctype="multipart/form-data">
   <div class="flex">
      <div class="inputBox">
         <span>Product ID : </span>
         <input class="box" type="text" name="num" readonly value="<?php echo $x;?>" />
         <span>Product Name : </span>
         <input class="box" type="text" name="name" value="<?php echo $name;?>" />
         <span>Product Price : </span>
         <input class="box" type="number" name="price" value="<?php echo $Price;?>" />
         <span>Product Category : </span>
         <select class="box" name="cat">
         <option selected value="<?php echo $cat;?>"><?php echo $cat?></option>
         <?php 
      $select_products = $conn->prepare("SELECT * FROM `category` where CatName <> '$cat' ");
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
   <input type="submit" value="Update Product" class="btn" />
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