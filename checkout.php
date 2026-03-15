<?php
session_start();

$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>
<link rel="stylesheet" href="style.css">
</head>

<body style="background: linear-gradient(rgb(247, 245, 246),rgb(243, 233, 239),rgb(235, 232, 234))">
<header class="navbar">
    <div>
        <img src="images/fashionhub.jpg" alt="logo" height="90px" width="170px">
    </div>

    <nav>
        <a href="index.php">Home</a>
        <a href="men.php">Men</a>
        <a href="women.php">Women</a>
        <a href="kids.php">Kids</a>
        <a href="profile.php">Profile</a>
        <a href="cart.php" style="color:white; text-decoration:none; font-size:18px;">🛒 Cart</a>
    </nav>
</header>
<h2 style="text-align:center;">Checkout</h2>

<div style="text-align:center">

<img src="<?php echo $image; ?>" width="200">

<h3><?php echo $name; ?></h3>

<p>Price: ₹<?php echo $price; ?></p>

<form action="place_order.php" method="POST">

<input type="hidden" name="product_name" value="<?php echo $name; ?>">
<input type="hidden" name="product_price" value="<?php echo $price; ?>">
<input type="hidden" name="product_image" value="<?php echo $image; ?>">

<br>

<input type="text" name="customer_name" placeholder="Enter Name" required>

<br><br>

<input type="text" name="phone" placeholder="Phone Number" required>

<br><br>

<textarea name="address" placeholder="Enter Address" required></textarea>

<br><br>

<button type="submit">Place Order</button>

</form>

</div>
<br>
<br>
<br>
<footer>
    <p>© 2026 Fashionhub | All Rights Reserved</p>
</footer>
</body>
</html>