<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$user_query = mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'");
$user = mysqli_fetch_assoc($user_query);

$order_query = mysqli_query($conn, "SELECT * FROM orders WHERE user_id='$user_id' ORDER BY order_date DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>FashionHub | Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background: linear-gradient(rgb(247, 245, 246),rgb(243, 233, 239),rgb(235, 232, 234))">
<header class="navbar">
    <div><img src="images/fashionhub.jpg" alt="logo" height="90px" width="170Spx"></div>
    <nav>
        <a href="index.php">Home</a>
        <a href="men.php">Men</a>
        <a href="women.php">Women</a>
        <a href="kids.php">Kids</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<div class="profile-container">

    <h1 class="brand">FashionHub</h1>
    <h2>My Profile</h2>

    <div class="profile-card">
        <h3>Account Details</h3>
        <p><strong>Name:</strong> <?php echo $user['fullname']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>Password:</strong> ********</p>
    </div>

    <div class="profile-stats">
        <div class="stat-box">
            <h3><?php echo mysqli_num_rows($order_query); ?></h3>
            <p>Total Orders</p>
        </div>
        <div class="stat-box">
            <h3>₹<?php
                $sum = 0;
                mysqli_data_seek($order_query, 0);
                while ($o = mysqli_fetch_assoc($order_query)) {
                    $sum += $o['total_amount'];
                }
                echo $sum;
            ?></h3>
            <p>Total Spent</p>
        </div>
    </div>

    <div class="profile-card">
        <h3>My Orders</h3>

        <?php if (mysqli_num_rows($order_query) > 0) { ?>
            <table class="order-table">
                <tr>
                    <th>Order ID</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>

                <?php
                mysqli_data_seek($order_query, 0);
                while ($order = mysqli_fetch_assoc($order_query)) {
                ?>
                <tr>
                    <td><?php echo $order['order_number']; ?></td>
                    <td>₹<?php echo $order['total_amount']; ?></td>
                    <td><?php echo $order['order_status']; ?></td>
                    <td><?php echo date("d M Y", strtotime($order['order_date'])); ?></td>
                </tr>
                <?php } ?>

            </table>
        <?php } else { ?>
            <p>No orders yet.</p>
        <?php } ?>
    </div>

    <div class="profile-actions">
        <a href="index.php" class="btn">Back to Shop</a>
        <a href="logout.php" class="btn danger">Logout</a>
    </div>

</div>
<footer>
    <p>© 2026 Fashionhub | All Rights Reserved</p>
</footer>
</body>
</html>
