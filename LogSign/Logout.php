<?php
include '../Components/config.php';
if(setcookie('user_id', '', time() - 1, '/'))
{
    header('location:../index.php');
}
?>