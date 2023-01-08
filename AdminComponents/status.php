<?php
    include '../Components/config.php';
    
    $ido = $_GET['idO'];
    $idu = $_GET['idu'];
    $conn->query("UPDATE `orders` SET status = 'delivered' where idO = '$ido'");
    header("location:AdminOrders.php?iidd={$idu}");
?>