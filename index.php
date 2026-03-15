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

$products = [
    ["name"=>"Girl's top", "price"=>499, "image"=>"images/kidswear.jpg", "main_category"=>"Kids", "sub_category"=>"Tops"],
    ["name"=>"Women party wear saree", "price"=>2299, "image"=>"images/saree.jpg", "main_category"=>"Women", "sub_category"=>"Sarees"],
    ["name"=>"Men's solid shirt", "price"=>999, "image"=>"images/shirt.jpg", "main_category"=>"Men", "sub_category"=>"Shirts"],
    ["name"=>"Kids nightwear", "price"=>399, "image"=>"images/kidsnightwear.jpg", "main_category"=>"Kids", "sub_category"=>"Nightwear"],
    ["name"=>"Women's Anarkali dress", "price"=>799, "image"=>"images/women's_dress.jpg", "main_category"=>"Women", "sub_category"=>"Dresses"],
    ["name"=>"Men's Printed shirt", "price"=>599, "image"=>"images/men's_printed_shirt.jpg", "main_category"=>"Men", "sub_category"=>"Shirts"]
];

$filter_main = isset($_GET['main_category']) ? $_GET['main_category'] : '';
$filter_sub = isset($_GET['sub_category']) ? $_GET['sub_category'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';

$filtered_products = array_filter($products, function($item) use ($filter_main, $filter_sub) {
    $main_ok = $filter_main ? $item['main_category'] == $filter_main : true;
    $sub_ok = $filter_sub ? $item['sub_category'] == $filter_sub : true;
    return $main_ok && $sub_ok;
});

if ($sort == 'price_asc') {
    usort($filtered_products, fn($a,$b)=> $a['price'] <=> $b['price']);
} elseif ($sort == 'price_desc') {
    usort($filtered_products, fn($a,$b)=> $b['price'] <=> $a['price']);
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
        <a href="about.php">About Us</a>
        <a href="cart.php" style="color:white; text-decoration:none; font-size:18px;">🛒 Cart</a>
    </nav>
</header>

<div>
    <img src="images/cover_page.jpg" alt="coverimage" width="85%" height="550px" class="center-img">
</div>

<!-- Filter & Sort Form -->
<form method="GET" class="filter-form">
    <div class="filter-row">
        <label>Main Category:</label>
        <select name="main_category">
            <option value="">All</option>
            <option value="Men" <?php if($filter_main=='Men') echo 'selected'; ?>>Men</option>
            <option value="Women" <?php if($filter_main=='Women') echo 'selected'; ?>>Women</option>
            <option value="Kids" <?php if($filter_main=='Kids') echo 'selected'; ?>>Kids</option>
        </select>

        <label>Sub-Category:</label>
        <select name="sub_category">
            <option value="">All</option>
            <option value="Shirts" <?php if($filter_sub=='Shirts') echo 'selected'; ?>>Shirts</option>
            <option value="Dresses" <?php if($filter_sub=='Dresses') echo 'selected'; ?>>Dresses</option>
            <option value="Sarees" <?php if($filter_sub=='Sarees') echo 'selected'; ?>>Sarees</option>
            <option value="Tops" <?php if($filter_sub=='Tops') echo 'selected'; ?>>Tops</option>
            <option value="Nightwear" <?php if($filter_sub=='Nightwear') echo 'selected'; ?>>Nightwear</option>
        </select>

        <label>Sort by Price:</label>
        <select name="sort">
            <option value="">Default</option>
            <option value="price_asc" <?php if($sort=='price_asc') echo 'selected'; ?>>Low to High</option>
            <option value="price_desc" <?php if($sort=='price_desc') echo 'selected'; ?>>High to Low</option>
        </select>

        <button type="submit">Apply</button>
    </div>
</form>

<section class="products">
    <h2>Our Products</h2>
    <div class="product-container">
        <?php foreach($filtered_products as $item){ ?>
            <div class="product-card">
                <img src="<?php echo $item['image']; ?>" width="200">
                <h3><?php echo $item['name']; ?></h3>
                <p>₹<?php echo $item['price']; ?></p>
                <form method="POST">
                    <input type="hidden" name="product_name" value="<?php echo $item['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $item['price']; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $item['image']; ?>">
                    <button type="submit" name="add_to_cart">Add to Cart</button>
                </form>
            </div>
        <?php } ?>
        <?php if(count($filtered_products)==0){ echo "<p style='text-align:center;'>No products found.</p>"; } ?>
    </div>
</section>
<button id="backToTop">↑ Top</button>

<script src="backToTop.js"></script>
<footer>
    <p>© 2026 Fashionhub | All Rights Reserved</p>
    <br>
    <a href="contact.php" style="color:white">Contact Us</a>
</footer>

</body>
</html>
