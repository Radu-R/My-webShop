<?php
include_once "../config/functions.php";
goAwayIsNotAdmin("admin/index.php");

$page = $_GET['page'] ?? 0;
if (!is_numeric($page)) {
    header("Location: ../error.php");
}
$products = getProducts($page, true);

$previous = max($page - 1, 0);
$next = $page + 1;

if (count($products) == 0 and $page != 0) {
    $page = $page - 1;
    header("Location: index.php?page=$page");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../css/adminStyle.css">
    <?php include_once "menuAdmin.php" ?>
</head>

<body>

    <ul class="product-list">
        <?php foreach ($products as $product): ?>
            <li class="product-list-item">
                <div class="product-left">
                    <img src="../showImagesScript.php?id=<?= htmlspecialchars($product['productID']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="product-img">
                    <div class="product-info">
                        <strong><?= htmlspecialchars($product['name']) ?></strong><br>
                        <span class="product-price"><?= htmlspecialchars($product['price']) ?> EUR</span>
                        <?php if ($product['deleted'] == 1)
                            echo "<p style=color:red>Deleted</p>" ?>
                    </div>
                </div>
                <div class="product-actions">
                    <a href="editProduct.php?id=<?= htmlspecialchars($product['productID']) ?>" class="btn edit-btn">Edit</a>

                    <?php if ($product['deleted'] == 1): ?>
                        <form action="unDeleteProduct.php" method="post" onsubmit="return confirm('Are you sure?')">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($product['productID']) ?>">
                            <button type="submit"> Un_Deleted</button><br>
                        <?php else : ?>

                            <form action="deleteProduct.php" method="post" onsubmit="return confirm('Are you sure?')">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($product['productID']) ?>">
                                <button type="submit"> Delete</button>
                            <?php endif ?>


                            </form>

                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <span style="margin-left: 40%;">
        <a href="index.php?page=<?= $previous ?>"><button>Previous</button></a>
        <a href="index.php?page=<?= $next ?>"><button>Next</button></a>
    </span>

</body>

</html>