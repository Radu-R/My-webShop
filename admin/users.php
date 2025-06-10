<?php
include_once "../config/functions.php";
goAwayIsNotAdmin("admin/index.php");

$users = getUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="../css/adminStyle.css">
    <?php include_once "menuAdmin.php" ?>

</head>

<body>
    <h1 class="user-title">Welcome to All Users</h1>
    <h2 class="admin-info">The administrator is shown with the color green</h2>

    <?php foreach ($users as $user) : ?>
        <div class="user-card <?= $user['role'] == 'admin' ? 'admin' : '' ?>">
            <p><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
            <p><strong>Address:</strong> <?= htmlspecialchars($user['address']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
            <p><strong>Role:</strong> <?= htmlspecialchars($user['role']) ?></p>

            <?php if ($user['role'] == 'admin') : ?>
                <a href="setUser.php?id=<?= $user['userID'] ?>">Set as User</a>
            <?php else : ?>
                <a href="setAdmin.php?id=<?= $user['userID'] ?>">Set as Admin</a>
            <?php endif ?>
        </div>
    <?php endforeach ?>

</body>

</html>