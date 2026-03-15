<?php

include "db.php";

$product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
$product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
$product_image = mysqli_real_escape_string($conn, $_POST['product_image']);

$customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$address = mysqli_real_escape_string($conn, $_POST['address']);

$sql = "INSERT INTO checkout_orders 
(product_name, product_price, product_image, customer_name, phone, address)
VALUES 
('$product_name','$product_price','$product_image','$customer_name','$phone','$address')";

if(mysqli_query($conn,$sql)){

echo "<h2>Order Placed Successfully!</h2>";
echo "<br>";
echo "<a href='index.php'>Continue Shopping</a>";

}else{

echo "Error: " . mysqli_error($conn);

}

?>