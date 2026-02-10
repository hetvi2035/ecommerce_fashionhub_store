<?php
session_start();
include "db.php";

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($query);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['fullname'];

        header("Location: index.php");
        exit();

    } else {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>FashionHub | Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background: linear-gradient(rgb(247, 245, 246),rgb(243, 233, 239),rgb(235, 232, 234))">
<div class="login-container">
    <div class="login-box">
        <h1 class="brand">FashionHub</h1>

        <h2>Login</h2>

        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit" name="login">Login</button>
        </form>

        <p class="signup-text">
            Don’t have an account?
            <a href="signup.php">Sign Up</a>
        </p>
    </div>
</div>

<footer>
    <p>© 2026 Fashionhub | All Rights Reserved</p>
</footer>
</body>
</html>
