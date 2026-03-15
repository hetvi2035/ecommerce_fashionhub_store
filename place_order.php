<?php
session_start();
include "db.php";

$user_id = $_SESSION['user_id'];

$product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
$product_price = mysqli_real_escape_string($conn, $_POST['product_price']);

$customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$address = mysqli_real_escape_string($conn, $_POST['address']);

$order_number = "ORD" . rand(1000,9999);
$total_amount = $product_price;
$order_status = "Placed";

$sql = "INSERT INTO orders 
(user_id, order_number, total_amount, order_status, order_date)
VALUES 
('$user_id','$order_number','$total_amount','$order_status',NOW())";

if(mysqli_query($conn,$sql)){

echo "<h2>Order Placed Successfully!</h2>";
echo "<br>";
echo "<a href='profile.php'>View My Orders</a>";

}else{

echo "Error: " . mysqli_error($conn);

}
?>
