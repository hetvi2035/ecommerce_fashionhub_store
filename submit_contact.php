<?php
session_start();
include "db.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contacts (name, email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";

    if(mysqli_query($conn, $sql)){
        echo "<h2>Thank you! Your message has been sent successfully.</h2>";
        echo "<a href='index.php'>Back to Home</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    header("Location: contact.php");
    exit();
}
?>