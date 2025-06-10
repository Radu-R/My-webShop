<?php
include_once "../config/functions.php";

if (!isLogged()) {
    header("Location: login.php");
    die();
}
$orders = getOrdersForAdmin();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['status']) && !empty($_POST['status'])) {
        $status = $_POST['status'];
        $id = $_POST['id'];        
        saveStatus($id, $status);
        header("Location: manageOrders.php");

    } else {
        echo "No status selected.";
    }
}
 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magane orders</title>
    <link rel="stylesheet" href="../css/adminStyle.css">
    <?php include_once "menuAdmin.php" ?>
</head>

<body>

    <div class="orders-page">
        <h1 class="page-title">All Orders</h1>

        <?php foreach ($orders as $orderID => $order): ?>
            <div class="order-card">
                <div class="order-header">
                    <div>
                        <strong>Order #<?= $orderID ?></strong>
                        <div class="order-date"><?= $order['orders']['date'] ?></div>
                    </div>
                    <form action="manageOrders.php" method="post">
                        <?php $id =$order['orders']['orderID'] ; ?>
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="order-status <?= strtolower($order['orders']['status']) ?>">
                            Status : <select name="status" id="status">
                                <option value=""> <?= $order['orders']['status'] ?></option>
                                <option value="pending">Pending</option>
                                <option value="Sent">Sent</option>
                                <option value="Delivered">Delivered</option>
                            </select>                           
                            <button type="submit"> Change</button>
                        </div>
                    </form>
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

                <div class="order-user">
                    <strong>User:</strong> <?= $order['users']['email']; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>