<?php
    include '../Components/config.php';
    
    $ido = $_GET['idO'];
    $idu = $_GET['idu'];
    $conn->query("UPDATE `orders` SET status = 'out of stock' where idO = '$ido'");
    header("location:AdminOrders.php?iidd={$idu}");
?>