<?php  
     include 'Components/config.php';
     if(isset($_POST['input'])){
          $input=$_POST['input'];
          ?>
                  <div class="container">
                    <?php
          $select_products = $conn->query('SELECT * FROM `products` where NameP LIKE "%'.$input.'%"');
          if($select_products->rowCount() > 0){  
          while($fetch_prodcut = $select_products->fetch(PDO::FETCH_ASSOC)){  
               ?>
     <form action="" method="post">
            <div class="product">
                <div class="image">
                <img class="im" src="images/<?php echo $fetch_prodcut['ImageP']; ?>" alt="product">
                    <span class="span"><?php echo $fetch_prodcut['PriceP']; ?>$</span>
                    <input type="hidden" name="product_id" value="<?php echo $fetch_prodcut['id']; ?>">
                </div>
                <div class="productname"><?php echo $fetch_prodcut['NameP']; ?></div>
                <input type="submit" class="addbtn" value="add to cart" name="add_to_cart">
            </div>
    </form>
               <?php
               $lastid=$fetch_prodcut['id'];
          }
          ?>
          </div>
              <div id="remove">
    <button type="button" name="loadmore" data-id="<?php echo $lastid; ?>" id="loadmore" class="load_more">load more</button>
    </div>
          <?php 
          }  
     }
?>
