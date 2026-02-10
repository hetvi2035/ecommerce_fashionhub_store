<?php
session_start();
include "db.php";

if (isset($_POST['signup'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('Email already exists');</script>";
    } else {
        mysqli_query($conn, "INSERT INTO users (fullname, email, password)
                              VALUES ('$fullname','$email','$password')");
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>FashionHub | Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background: linear-gradient(rgb(247,245,246),rgb(243,233,239),rgb(235,232,234))">

<div class="login-container">
    <div class="login-box">

        <h1 class="brand">FashionHub</h1>
        <h2>Create Account</h2>

        <form method="POST">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit" name="signup">Sign Up</button>
        </form>

        <p class="signup-text">
            Already have an account?
            <a href="login.php">Login</a>
        </p>

    </div>
</div>

</body>
</html>
