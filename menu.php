<?php
$cartSize = getCartSize();
$logged = isLogged();
$userName = getUserName();
$isAdmin = isAdmin();

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="css/menu.css">
<div class="menu" id="myMenu">
    <a href="index.php" class="active">Home</a>

    <a href="showCart.php" class="cart-link">
        <i class="fas fa-shopping-cart"></i>
        <span class="cart-count"><?= $cartSize ?></span>
    </a>
     <a href="contact.php" >Contact</a>
    <?php if ($logged) : ?>
        <?php if ($isAdmin == 'admin'): ?>
            <a href="admin/index.php">Admin Page</a>
        <?php endif ?>
        <a href="logout.php">Logout</a>
        <a href="showOrders.php">My Profile</a>
        <a>User: <?= $userName ?></a>
    <?php else : ?>
        <a href="login.php">Login</a>

    <?php endif ?>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
    <script>
        function myFunction() {
            var x = document.getElementById("myMenu");
            x.classList.toggle("responsive");
        }
    </script>
</div>