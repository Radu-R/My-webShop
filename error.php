<?php
include_once 'config/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <link rel="stylesheet" href="css/style.css">
    <?php include_once "menu.php" ?>
</head>
<body class="page-404">
    <div class="error-container">
        <div class="error-box">
            <h1 class="error-code">404</h1>
            <h2 class="error-title">Page Not Found</h2>
            <p class="error-message">
                Sorry, the page you are looking for doesn’t exist, has been moved, or is temporarily unavailable.
            </p>
            <a href="index.php" class="btn-home">Go Back Home</a>
        </div>
    </div>
    <?php include_once "footer.php" ?>
</body>
</html>
