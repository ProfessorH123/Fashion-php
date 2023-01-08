<?php
include '../Components/config.php';
    $x=$_GET["del"];
    
    $conn->query("DELETE FROM `products` WHERE id= '$x' ");
     header("location:list_product.php");
?>