<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (empty($_SESSION['cart'])) {
    echo "<h2 style='text-align:center;'>Cart is empty</h2>";
    echo "<a href='index.php'>Back to Shop</a>";
    exit();
}

$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout | FashionHub</title>
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
        <a href="about.php">About Us</a>
        <a href="cart.php" style="color:white; text-decoration:none; font-size:18px;">🛒 Cart</a>
    </nav>
</header>

<div class="checkout-container" style="width:60%; margin:auto; background:white; padding:30px; border-radius:8px; box-shadow:0 0 15px #ccc;">
    <h2 style="text-align:center;">Checkout</h2>

    <h3>Order Summary</h3>
    <table style="width:100%; text-align:left; margin-bottom:20px; border-collapse: collapse;">
        <tr>
            <th>Product</th>
            <th>Price (₹)</th>
        </tr>
        <?php foreach ($_SESSION['cart'] as $item): ?>
        <tr>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['price']; ?></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td><strong>Total</strong></td>
            <td><strong>₹<?php echo $total; ?></strong></td>
        </tr>
    </table>

    <h3>Customer Details</h3>
    <form action="place_order.php" method="POST">
        <input type="text" name="customer_name" placeholder="Your Name" required><br><br>
        <input type="text" name="phone" placeholder="Phone Number" required><br><br>
        <textarea name="address" placeholder="Enter Address" required></textarea><br><br>

        <input type="hidden" name="cart_data" value='<?php echo json_encode($_SESSION['cart']); ?>'>
        <input type="hidden" name="total_amount" value="<?php echo $total; ?>">

        <button type="submit">Place Order</button>
    </form>
</div>

<footer>
    <p style="text-align:center;">© 2026 FashionHub | All Rights Reserved</p>
    <br>
    <a href="contact.php" style="color:white">Contact Us</a>
</footer>

</body>
</html>