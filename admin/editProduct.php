<?php
include_once "../config/functions.php";
goAwayIsNotAdmin("admin/index.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'] ?? 0;
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? 0;
    $image = $_FILES['image']['size'] ? $_FILES['image'] : false;

     
    editProduct($id, $name, $description, $price, $image);
    header('Location: index.php');
    die();
} else {
    $id = $_GET['id'] ?? null;
    if (!$id) {
        header('Location: http://police.lu');
    }
    $item = getOneProduct($id);
    if (!$item) {
        header('Location: http://police.lu');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="../css/adminStyle.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <?php include_once "menuAdmin.php" ?>
</head>

<body>

<form action="" method="post" enctype="multipart/form-data" class="product-form">
    <h1>Edit Product</h1>

    <input type="hidden" name="id" value="<?= $item['productID'] ?>">

    <label for="name">Name of product</label>
    <input type="text" id="name" name="name" value="<?= $item['name'] ?>" required>


    <label for="description">Description</label>
   <!-- <textarea name="description" id="description"><?php // $item['description'] ?></textarea> -->

<textarea name="description" id="description">
        <?= $item['description'] ?>
    </textarea>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

    <label for="price">Price</label>
    <input type="number" id="price" name="price" value="<?= $item['price'] ?>" step="0.01" required>

    <label>Current Image</label>
    <img src="../showImagesScript.php?id=<?= $id ?>" alt="Product image" class="product-image">

    <label for="image">Upload New Image</label>
    <input type="file" id="image" name="image" accept="image/*">

    <button type="submit" class="submit-btn">Edit Product</button>
</form>

</body>

</html>