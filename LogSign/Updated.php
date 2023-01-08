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
    if(isset($_GET["email"]) && !empty($_GET["email"]))
    {
        $p4= $_GET["email"];
        $test4=true;
    }
    else
        $test4=false;
    
    
    if(isset($_GET["lastPass"]) && !empty($_GET["lastPass"]))
    {
        $p5= $_GET["lastPass"];
        $test5=true;
    }
    else
        $test5=false;
    if(isset($_GET["newPass"]) && !empty($_GET["newPass"]))
    {
        $p6= $_GET["newPass"];
        $test6=true;
    }
    else
        $test6=false;
    if(isset($_GET["last_Pass"]) && !empty($_GET["last_Pass"]))
    {
        $p7= $_GET["last_Pass"];
        $test7=true;
    }
    else
        $test6=false;
    if($test1 && $test3 && $test4 && $test5 && $test6 && $test7)
    {
        include '../Components/config.php';
        if($p5 != $p7)
        {
            echo "non les mots de passes sont incompatibles";
        }
        else
        {
            $conn->query("UPDATE `users` SET Image ='$p2' ,Name='$p3',Email='$p4',Password='$p6' WHERE id='$p1'");
            header("location:../index.php");
        }
    }
    else{
        echo "something wrong";
    }
    
?>