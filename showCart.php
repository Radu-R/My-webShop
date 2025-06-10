<?php
include_once "config/functions.php";

$cart = getCart();
$totalSomme = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="css/cart.css">
</head>

<body>
    <?php include_once "menu.php" ?>
    <h1>Shop Cart</h1>
    <div class="cart-container">

        <?php foreach ($cart as $id => $amount):
            $product = getOneProduct($id);
            $priceByAmountOfProdutc =  $product['price'] * $amount;
            $totalSomme += $priceByAmountOfProdutc;
        ?>
            <div class="cart-item">
                <div class="cart-item-name"><?= htmlspecialchars($product['name']) ?></div>

                <a href="changeNumbQuant.php?by=-1&key=<?= $id ?>"> <img src="images/diferents/minus.png" width="15px"> </a>
                <div class="cart-item-qty"><?= htmlspecialchars($amount) ?></div>
                <a href="changeNumbQuant.php?by=1&key=<?= $id ?>"> <img src="images/diferents/plus.png" width="15px"> </a>

                <div class="cart-item-price"><?= number_format($product['price'], 2) ?> EUR</div>



            </div>
        <?php endforeach; ?>

         <p class="cart-item-total">Total:  <?= number_format($totalSomme, 2) ?> EUR </p> 
   
 
        <a class="checkout" href="confirm.php">Proceed to Checkout</a>
    </div>
    
</body>
<br>
<?php include_once "footer.php" ?>
</html>