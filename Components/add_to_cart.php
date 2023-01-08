<?php
if(isset($_POST['add_to_cart'])){
    if($user_id != ''){
    $id = create_unique_id();
    $product_id = $_POST['product_id'];
    $product_id = filter_var($product_id, FILTER_SANITIZE_STRING);
    
    $verify_cart = $conn->prepare("SELECT * FROM `cart` WHERE User_id = ? AND Product_id = ?");   
    $verify_cart->execute([$user_id, $product_id]);
 
 
    if($verify_cart->rowCount() > 0){
       $warning_msg[] = 'Already added to cart!';
    }else{
       $select_price = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
       $select_price->execute([$product_id]);
       $fetch_price = $select_price->fetch(PDO::FETCH_ASSOC);
 
       $insert_cart = $conn->prepare("INSERT INTO `cart`(id, User_id, Product_id, Total) VALUES(?,?,?,?)");
       $insert_cart->execute([$id, $user_id, $product_id, $fetch_price['PriceP']]);
       $success_msg[] = 'Added to cart!';
       header('location:#products');
    }
    }else{
        $warning_msg[]= 'please login first!';
}
 
 }
?>