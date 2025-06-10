<?php
include_once "../config/functions.php";
goAwayIsNotAdmin("admin/index.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name =  $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? 0;

    $image = $_FILES['image'];

    $price = ($price < 0) ? 0 : $price;

    if ($name and $description and $price) {
        addProduct($name, $description, $price, $image);
        header("Location: index.php");
        die();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product</title>
    <link rel="stylesheet" href="../css/adminStyle.css">
    <?php include_once "menuAdmin.php" ?>
</head>

<body>
    <form action="addProduct.php" method="post" enctype="multipart/form-data" class="product-form">
        <h1>Add New Product</h1>

        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required>

        <label for="image">Product Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <button type="submit" class="submit-btn">Add Product</button>
    </form>
</body>

</html>