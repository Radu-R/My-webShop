<?php
include_once "config/functions.php";

if (!isLogged()) {
    $where = urldecode("showOrders.php");
    header("Location: login.php?redirect=$where");
    die();
}
$orders = getOrders();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your oders</title>
    <link rel="stylesheet" href="css/style.css">
    <?php include_once "menu.php" ?>
</head>

<body>
   <div class="orders-page">
    <h1 class="page-title">Your Orders</h1>

    <?php foreach ($orders as $orderID => $order): ?>
        <div class="order-card">
            <div class="order-header">
                <div><strong>Order #<?= $orderID ?></strong></div>
                <div class="order-date"><?= $order['orders']['date'] ?></div>
            </div>

            <div class="order-status <?= strtolower($order['orders']['status']) ?>">
               Status : <?= $order['orders']['status'] ?>
            </div>

            <div class="order-details">
                <div class="order-details-header">
                    <span>Name</span>
                    <span>Quantity</span>
                    <span>Price</span>
                </div>

                <?php foreach ($order['order_details'] as $detail): ?>
                    <div class="order-item">
                        <span><?= $detail['name'] ?></span>
                        <span><?= $detail['amount'] ?></span>
                        <span><?= $detail['price'] ?> EUR</span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>


</body>
<?php include_once "footer.php" ?>

</html>