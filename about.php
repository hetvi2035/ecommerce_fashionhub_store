<?php
session_start();
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>About Us | FashionHub</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .about-container {
            width: 70%;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px #ccc;
            text-align: center;
        }

        .about-container h2 {
            color: #FF4081;
            margin-bottom: 20px;
        }

        .about-container p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
            color: #333;
        }

        .about-container img {
            width: 300px;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
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
        <a href="about.php">About Us</a>
        <a href="cart.php">🛒 Cart</a>
    </nav>
</header>

<div class="about-container">
    <h2>About FashionHub</h2>
    <p>Welcome to FashionHub! We are committed to bringing you the latest fashion trends for men, women, and kids at unbeatable prices.</p>
    <p>Our mission is to provide a seamless shopping experience, high-quality products, and excellent customer service.</p>
    <p>FashionHub was founded in 2026 with a vision to make fashion accessible, enjoyable, and sustainable for everyone.</p>
    <img src="images/about_us.jpg" alt="FashionHub Team">
</div>

<footer>
    <p>© 2026 FashionHub | All Rights Reserved</p>
    <br>
    <a href="contact.php" style="color:white">Contact Us</a>
</footer>

</body>
</html>