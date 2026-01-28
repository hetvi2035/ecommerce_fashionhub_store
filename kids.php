<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fashionhub</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background: linear-gradient(rgb(247, 245, 246),rgb(243, 233, 239),rgb(235, 232, 234))">

<header class="navbar">
    <div class="logo"><img src="images/fashionhub.jpg" alt="logo" height="90px" width="170Spx"></div>
    <nav>
        <a href="index.php">Home</a>
        <a href="men.php">Men</a>
        <a href="women.php">Women</a>
        <a href="kids.php">Kids</a>
        <a href="profile.php">Profile</a>
    </nav>
</header>
<section class="products">
    <h2>Trending Products</h2>

    <div class="product-container">

        <?php
        $products = [
            ["name"=>"Girl's top", "price"=>"₹499", "image"=>"images/kidswear.jpg"],
            ["name"=>"kids nightwear", "price"=>"₹399", "image"=>"images/kidsnightwear.jpg"]
        ];

        foreach($products as $item){
        ?>
        <div class="product-card">
            <img src="<?php echo $item['image']; ?>">
            <h3><?php echo $item['name']; ?></h3>
            <p><?php echo $item['price']; ?></p>
            <button>Add to Cart</button>
        </div>
        <?php } ?>

    </div>
</section>

<footer>
    <p>© 2026 Fashionista | All Rights Reserved</p>
</footer>

</body>
</html>