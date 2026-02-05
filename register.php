<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = $username . "|" . password_hash($password, PASSWORD_DEFAULT) . "\n";
    file_put_contents("users.txt", $data, FILE_APPEND);

    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register | Fashionhub</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2 align="center">Register</h2>

<form method="post" class="form-box">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
    <p>Already have an account? <a href="login.php">Login</a></p>
</form>

</body>
</html>
