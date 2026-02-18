<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_image = $_POST['product_image'];

$_SESSION['cart'][] = [
    "name" => $product_name,
    "price" => $product_price,
    "image" => $product_image
];


    echo "<script>alert('Added to cart successfully!');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fashionhub</title>
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

<div>
    <img src="images/cover_page.jpg" alt="coverimage" width="85%" height="550px" class="center-img">
</div>

<section class="products">
    <h2>Our Products</h2>

    <div class="product-container">

<?php
$products = [
    ["name"=>"Girl's top", "price"=>"499", "image"=>"images/kidswear.jpg"],
    ["name"=>"Women party wear saree", "price"=>"2299", "image"=>"images/saree.jpg"],
    ["name"=>"Men's solid shirt", "price"=>"999", "image"=>"images/shirt.jpg"],
    ["name"=>"kids nightwear", "price"=>"399", "image"=>"images/kidsnightwear.jpg"],
    ["name"=>"Women's Anarkali dress", "price"=>"799", "image"=>"images/women's_dress.jpg"],
    ["name"=>"Men's Printed shirt", "price"=>"599", "image"=>"images/men's_printed_shirt.jpg"]
];

foreach($products as $item){
?>

        <div class="product-card">
            <img src="<?php echo $item['image']; ?>" width="200">

            <h3><?php echo $item['name']; ?></h3>

            <p>₹<?php echo $item['price']; ?></p>

            <form method="POST">
    <input type="hidden" name="product_name" value="<?php echo $item['name']; ?>">
    <input type="hidden" name="product_price" value="<?php echo $item['price']; ?>">
    <input type="hidden" name="product_image" value="<?php echo $item['image']; ?>">
                <button type="submit" name="add_to_cart">
                    Add to Cart
                </button>
            </form>

        </div>

<?php } ?>

    </div>
</section>

<footer>
    <p>© 2026 Fashionhub | All Rights Reserved</p>
</footer>

</body>
</html>
