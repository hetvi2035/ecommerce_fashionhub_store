<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
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

        <a href="cart.php" style="color:white; text-decoration:none; font-size:18px;">
            🛒 Cart (<?php echo count($_SESSION['cart']); ?>)
        </a>
    </nav>
</header>

<h2 style="text-align: center;">Your Cart</h2>

    <section class="products">
    <div class="product-container">

<?php
$total = 0;

if (!empty($_SESSION['cart'])) {

    foreach ($_SESSION['cart'] as $item) {
?>
        <div class="product-card">
            <img src="<?php echo $item['image']; ?>" alt="">
            <h3><?php echo $item['name']; ?></h3>
            <p>₹<?php echo $item['price']; ?></p>

            <button>Remove</button>
            <button>Buy Now</button>
        </div>

<?php
        $total += $item['price'];
    }

    echo "<h2 style='width:100%; text-align:center;'>Total: ₹$total</h2>";

} else {
    echo "<p style='text-align:center;'>Cart is Empty</p>";
}
?>
    </div>
</section>


<br>
<a href="index.php">Continue Shopping</a>

<footer>
    <p>© 2026 Fashionhub | All Rights Reserved</p>
</footer>

</body>
</html>
