<?php
include_once "config/functions.php";

if (!isLogged()) {
  $where = urldecode("showCart.php");
  header("Location: login.php?redirect=$where");
  die();
}

saveOrder();
//header("Location: confirm.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thank You!</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <?php include_once "menu.php" ?>

  <div class="thank-you-container">
    <div class="thank-you-card">
      <h1>Thank You for Your Purchase!</h1>
      <p>Your order has been placed successfully. We truly appreciate your business and hope you enjoy your product!</p>
      <a href="index.php" class="back-home-btn">Continue Shopping</a>
    </div>
  </div>

  <?php include_once "footer.php" ?>

</body>

</html>