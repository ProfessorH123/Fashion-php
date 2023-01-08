<?php
    include '../Components/config.php';

    if(isset($_GET['place_order'])){

        $cardholder_name = $_GET['cardholder_name'];
        $cardholder_name = filter_var($cardholder_name, FILTER_SANITIZE_STRING);
  
        $card_number = $_GET['card_number'];
        $card_number = filter_var($card_number, FILTER_SANITIZE_STRING);
  
        $Adress = $_GET['Adress'];
        $Adress = filter_var($Adress, FILTER_SANITIZE_STRING);
  
        $day = $_GET['day'];
        $day = filter_var($day, FILTER_SANITIZE_STRING);
  
        $month = $_GET['month'];
        $month = filter_var($month, FILTER_SANITIZE_STRING);
     
        $x=$_GET["User_id"];
        $x = filter_var($x, FILTER_SANITIZE_STRING);
  
        $verify_cart = $conn->prepare("SELECT * FROM `cart` WHERE User_id = ?");
        $verify_cart->execute([$x]);
  
        if($verify_cart->rowCount() > 0){
     
           while($f_cart = $verify_cart->fetch(PDO::FETCH_ASSOC)){
     
              $insert_order = $conn->prepare("INSERT INTO `orders`(idO, user_id, CardName, CardNumber, Day, Month, Adress, product_id, price, Qte) VALUES(?,?,?,?,?,?,?,?,?,?)");
              $insert_order->execute([create_unique_id(), $x, $cardholder_name, $card_number, $day, $month, $Adress, $f_cart['Product_id'], $f_cart['Total'], $f_cart['Qte']]);
     
           }
     
           if($insert_order){
              $delete_cart_id = $conn->prepare("DELETE FROM `cart` WHERE User_id = ?");
              $delete_cart_id->execute([$x]);
              header("location:orders.php?iidd={$x}");
           }
     
        }else{
           $warning_msg[] = 'Your cart is empty!';
        }
     
     }
?>