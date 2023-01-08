<?php
include '../Components/config.php';
$x = $_GET['uid'];
$conn->query("DELETE FROM `cart` where User_id = '$x'");
header("location:cart.php?User_id=$x")
?>