<?php
include_once "../config/functions.php";
$admin = getUserName();

?>
<link rel="stylesheet" href="../css/menuAdmin.css">
<div class="menu-admin">
    <ul>
        <li> <a href="index.php">Home</a></li>
        <li><a href="addProduct.php">Add new product</a></li>
        <li> <a href="users.php">Users</a></li>
        <li> <a href="manageOrders.php">Orders</a></li>
        <?php if(isLogged()): ?>
        <li> <a href="../logout.php">Logout</a></li>
        <p style="color: green;">Welcome admin : <?= $admin ?></p>
            <?php else :?>
                <a href="../login.php">Login</a></li>
        <?php endif?>
    </ul>
</div>