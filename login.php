<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = file("users.txt");

    foreach ($users as $user) {
        list($storedUser, $storedPass) = explode("|", trim($user));

        if ($username == $storedUser && password_verify($password, $storedPass)) {
            $_SESSION['user'] = $username;
            header("Location: index.php");
            exit();
        }
    }

    $error = "Invalid username or password";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login | Fashionhub</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2 align="center">Login</h2>

<form method="post" class="form-box">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>

    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <p>New user? <a href="register.php">Register</a></p>
</form>

</body>
</html>
