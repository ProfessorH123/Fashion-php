<?php
    if(isset($_GET["num"]) && !empty($_GET["num"]))
    {
        $p1= $_GET["num"];
        $test1=true;
    }
    else
        $test1=false;
    if(isset($_GET["image"]) && !empty($_GET["image"]))
    {
        $p2= $_GET["image"];
        $test2=true;
    }
    else
        $test2=false;
    if(isset($_GET["name"]) && !empty($_GET["name"]))
    {
        $p3= $_GET["name"];
        $test3=true;
    }
    else
        $test3=false;
    if(isset($_GET["price"]) && !empty($_GET["price"]))
    {
        $p4= $_GET["price"];
        $test4=true;
    }
    else
        $test4=false;
        if(isset($_GET["cat"]) && !empty($_GET["cat"]))
        {
            $p5= $_GET["cat"];
            $test5=true;
        }
        else
            $test5=false;
    if($test1 && $test3 && $test4 && $test5)
    {
        include '../Components/config.php';
            $conn->query("UPDATE `products` SET ImageP ='$p2' ,NameP='$p3',PriceP=$p4, CatName='$p5' WHERE id='$p1'");
            header("location:list_product.php");
    }
    else{
        echo "something wrong";
    }
    
?>