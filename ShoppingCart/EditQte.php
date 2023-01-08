<?php
    include '../Components/config.php';
    if(isset($_GET['update_cart'])){

        $pid=$_GET["Product_id"];
        $pid = filter_var($pid, FILTER_SANITIZE_STRING);
  
        $q1= $_GET["quantity"];
        $q1 = filter_var($q1, FILTER_SANITIZE_STRING);
  
        $uid=$_GET["User_id"];
        $uid = filter_var($uid, FILTER_SANITIZE_STRING);
  
        $update_qty = $conn->prepare("UPDATE `cart` SET Qte = ? WHERE Product_id = ? and User_id = ?");
        $update_qty->execute([$q1, $pid,$uid]);
     
        $success_msg[] = 'Cart quantity updated!';
        header("location:cart.php?User_id={$uid}");
     }

     if(isset($_GET['delete_item'])){

        $pid=$_GET["Product_id"];
        $pid = filter_var($pid, FILTER_SANITIZE_STRING);

        $uid=$_GET["User_id"];
        $uid = filter_var($uid, FILTER_SANITIZE_STRING);
        
        $verify_delete_item = $conn->prepare("SELECT * FROM `cart` WHERE Product_id = ? and User_id = ?");
        $verify_delete_item->execute([$pid,$uid]);
     
        if($verify_delete_item->rowCount() > 0){
           $delete_cart_id = $conn->prepare("DELETE FROM `cart` WHERE Product_id = ? and User_id = ?");
           $delete_cart_id->execute([$pid,$uid]);
           $success_msg[] = 'Cart item deleted!';
           header("location:cart.php?User_id={$uid}");
        }else{
           $warning_msg[] = 'Cart item already deleted!';
        } 
     
     }
?>
