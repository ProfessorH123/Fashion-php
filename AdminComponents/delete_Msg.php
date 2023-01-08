<?php

include '../Components/config.php';

    $x=$_GET["id"];    
    $conn->query("DELETE FROM `contact` WHERE id= '$x' ");
     header("location:AdminContact.php");
?>