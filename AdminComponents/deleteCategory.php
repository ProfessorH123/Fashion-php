<?php
include '../Components/config.php';
    $x=$_GET["del"];
    
    $conn->query("DELETE FROM `category` WHERE CatName= '$x' ");
     header("location:AdminCategory.php");
?>