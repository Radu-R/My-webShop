<?php

include_once "config/functions.php";

$id = $_GET['id'] ?? false;

if($id){
    addToCart($id);
}

header("Location: showCart.php");

?>