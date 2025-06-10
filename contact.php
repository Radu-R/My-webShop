<?php
// contact.php
include_once 'config/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to      = "rosca.radu93@gmail.com";
    $subject = "New message from $name";
    $body    = "Name: $name\nEmail: $email\nMessage:\n$message";

    mail($to, $subject, $body);

    $success = "Thank you for contacting us, $name. We’ll get back to you soon!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - My Webshop</title>
    <link rel="stylesheet" href="css/style.css">
    <?php include_once "menu.php" ?>
</head>
<body class="contact-page">

<div class="contact-container">
    <h2>Contact Us</h2>

    <?php if (!empty($success)) echo "<div class='contact-success'>$success</div>"; ?>

    <form method="post" action="contact.php" class="contact-form">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Your Email</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Your Message</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <input type="submit" value="Send Message">
    </form>

    <div class="contact-info">
        <h3>Our Contact Details</h3>
        <p><strong>Email:</strong> support@yourwebshop.com</p>
        <p><strong>Phone:</strong> +1 234 567 8900</p>
        <p><strong>Address:</strong> 123 Webshop Lane, Ecommerce City</p>
    </div>
</div>

</body>
<?php include_once "footer.php" ?>
</html>

