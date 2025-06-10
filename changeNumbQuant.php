<?php 
include_once "config/functions.php";
$by = $_GET['by'];
$key = $_GET['key'];

$cart = $_SESSION['cart'] ?? [];

$cart[$key] = $cart[$key] + $by;
if($cart[$key] <= 0){
    unset($cart[$key]);
}
$_SESSION['cart'] = $cart;
header ("Location: showCart.php");

?>