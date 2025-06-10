<?php
include_once "config/functions.php";

$id = $_GET['id'] ?? false;

if (!$id) {
  header("Location: error.php");
  die();
}

$product = getOneProduct($id);

if (!$product) {
  header("Location: error.php");
  die();
}
$logged = isLogged();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $product['name'] ?> | Product Details</title>
  <link rel="stylesheet" href="css/style.css">
   <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
</head>

<body>
  <?php include_once "menu.php" ?>

  <div class="product-detail-card">
    <div class="detail-image">
      <img src="showImagesScript.php?id=<?= htmlspecialchars($product['productID']) ?>" alt="<?= $product['name'] ?>">
    </div>

    <div class="detail-info">
      <h1><?= htmlspecialchars($product['name']) ?></h1>
      <p class="detail-description" id="detail-description"><?= $product['description'] ?></p>  

      <p class="detail-price"><strong><?= htmlspecialchars($product['price']) ?> EUR</strong></p>
      <?php if ($logged) : ?>
        <a href="buy.php?id=<?= htmlspecialchars($product['productID']) ?>" class="buy-now-btn">Buy Now</a>
      <?php else : ?>
        <div class="auth-warning">
          <h2>You are not logged in.</h2>
          <p>Please <a href="login.php" class="login-link">Login</a> to continu the shopping.</p>
        </div>
      <?php endif ?>
    </div>
  </div>

</body>
<?php include_once "footer.php" ?>

</html>