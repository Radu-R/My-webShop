<?php
include_once 'config/functions.php';
$className = "hidden";

$redirect = $_GET['redirect'] ?? 'index.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $redirect = $_POST['redirect'] ?? 'index.php';

    $result = login($email, $password);
    if($result) {
        header("Location: $redirect");
        exit;
    } else {
        $className = "visible";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <?php include_once "menu.php" ?>

  <div class="login-container">
    <div class="login-card">
      <h1>🔐 Login</h1>

      <?php if (!empty($className)): ?>
        <div class="<?= $className ?>">⚠️ Wrong email or password.Try again.</div>
      <?php endif; ?>

      <form action="login.php" method="post">
        <input type="hidden" name="redirect" value="<?=$redirect?>">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" class="btn-primary">Login</button>
        <button type="button" class="btn-secondary" onclick="window.location.href='register.php'">Register</button>
      </form>
    </div>
  </div>

  <?php include_once "footer.php" ?>

</body>

</html>
