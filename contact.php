<?php
session_start();
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us | FashionHub</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background: linear-gradient(rgb(247,245,246), rgb(243,233,239), rgb(235,232,234))">

<header class="navbar">
    <div><img src="images/fashionhub.jpg" alt="logo" height="90px" width="170px"></div>
    <nav>
        <a href="index.php">Home</a>
        <a href="men.php">Men</a>
        <a href="women.php">Women</a>
        <a href="kids.php">Kids</a>
        <a href="profile.php">Profile</a>
        <a href="cart.php">🛒 Cart</a>
    </nav>
</header>

<div class="contact-container">
    <h2>Contact Us</h2>
    <p>Have questions? Send us a message and we'll get back to you soon!</p>

    <form action="submit_contact.php" method="POST" class="contact-form">
        <input type="text" name="name" placeholder="Your Name" required><br><br>
        <input type="email" name="email" placeholder="Your Email" required><br><br>
        <input type="text" name="subject" placeholder="Subject"><br><br>
        <textarea name="message" placeholder="Your Message" required></textarea><br><br>
        <button type="submit">Send Message</button>
    </form>
</div>
<br>
<br>

<footer>
    <p>© 2026 FashionHub | All Rights Reserved</p>
</footer>

</body>
</html>