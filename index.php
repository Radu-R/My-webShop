<?php
include_once 'config/functions.php';

$page = $_GET['page'] ?? 0;
if (!is_numeric($page)) {
  header("Location: error.php");
}
$products = getProducts($page, false);

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
  <title>Home</title>
  <link rel="stylesheet" href="css/style.css">
  <?php include_once "menu.php" ?>
</head>

<body>

  <div class="product-container">
    <?php foreach ($products as $product): ?>
      <a href="showOne.php?id=<?= htmlspecialchars($product['productID']) ?>" class="product-card">
        <img src="showImagesScript.php?id=<?= htmlspecialchars($product['productID']) ?>" alt="<?= $product['name'] ?>" class="product-img">
        <div class="product-name"><?= htmlspecialchars($product['name']) ?> <br>
          <?= $product['price'] ?> EUR
        </div>

      </a>
    <?php endforeach; ?>
  </div>

  <div class="button-container">
    <a href="index.php?page=<?= $previous ?>">
      <button class="previous">Previous</button>
    </a>
    <a href="index.php?page=<?= $next ?>">
      <button class="next">Next</button>
    </a>
  </div>
  <br>

  <div class="information">
    <p>
      Lorum Ipsum
      Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
      Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
      Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.

    </p>
  </div>
  <br>


</body>
<?php include_once "footer.php" ?>

</html>