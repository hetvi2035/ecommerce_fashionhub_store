<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['cart_data'])) {

    $cart = json_decode($_POST['cart_data'], true);
    $total_amount = mysqli_real_escape_string($conn, $_POST['total_amount']);
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $order_number = "ORD".rand(1000,9999);
    $order_status = "Placed";

    $sql = "INSERT INTO orders (user_id, order_number, total_amount, order_status, order_date)
            VALUES ('$user_id','$order_number','$total_amount','$order_status',NOW())";

    if(mysqli_query($conn,$sql)){
        unset($_SESSION['cart']);

        echo "<h2 style='text-align:center;'>Order Placed Successfully!</h2>";
        echo "<p style='text-align:center;'>Your Order Number: <strong>$order_number</strong></p>";
        echo "<p style='text-align:center;'>Total Amount: ₹$total_amount</p>";
        echo "<div style='text-align:center; margin-top:20px;'><a href='index.php'>Continue Shopping</a></div>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    header("Location: cart.php");
    exit();
}
?>