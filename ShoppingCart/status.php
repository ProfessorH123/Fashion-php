<?php
    include '../Components/config.php';
    
    $ido = $_GET['idO'];
    $idu = $_GET['idu'];
    $conn->query("UPDATE `orders` SET status = 'canceled' where idO = '$ido'");
    header("location:orders.php?iidd={$idu}");
?>