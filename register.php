<?php
include_once "config/functions.php";

$name = '';
$email = '';
$password =  '';
$address =  '';

$className = 'hidden';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $address = $_POST['address'] ?? '';

    if ($name and $email and $password and $address) {
        $result = adduser($name, $email, $password, $address);
        if ($result) {
            header("Location: index.php");
            die();
        } else {
            $className = 'visible';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <?php include_once "menu.php" ?>

  <div class="register-container">
    <div class="register-card">
      <h1>📝 Create Account</h1>

      <?php if (!empty($className)): ?>
        <div class="<?= $className ?>">⚠️ This email already exists in our system.</div>
      <?php endif; ?>

      <form action="register.php" method="POST">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" required value="<?= $name ?>">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required value="<?= $email ?>">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="address">Address</label>
        <input type="text" id="address" name="address" required>

        <button type="submit" class="btn-primary">Register</button>
        <button type="button" class="btn-secondary" onclick="window.location.href='login.php'">Back to Login</button>
      </form>
    </div>
  </div>

</body>

  <?php include_once "footer.php" ?>
</html>
