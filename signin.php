<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "beast_and_beauty"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['username']);
    $email = trim($_POST['mail']);
    $password = trim($_POST['password']);
    
    // Check if user already exists
    $check_query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email already registered! Please use a different email.');</script>";
    } else {
        // Insert new user into database
        $insert_query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_query);

        // Check if preparation is successful
        if (!$stmt) {
            die("Preparation failed: " . $conn->error);
        }

        $stmt->bind_param("sss", $name, $email, $password);

        // Check if execution is successful
        if ($stmt->execute()) {
            echo "<script>alert('Registration successful! Redirecting to home page....');</script>";
            header("Location: index.php");
            exit; 
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    $stmt->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-image: url("img/gallery/log1.jpg");
    color: #ffffff;
    margin: 0;
    padding: 0;
    position: relative; 
}

.container {
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-form {
    width: 300px;
    padding: 30px;
    background-color: rgb(0, 255, 38,0.3);
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.login-form input[type="text"],
.login-form input[type="password"],
.login-form input[type="email"]
{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
}

.login-form button {
    width: 100%;
    padding: 14px;
    background-color: #00ff15;
    color:black;
    border: 1px solid #53cb27;
    border-radius: 5px;
    cursor: pointer;
}

.login-form button:hover {
    background-color: #000000;
    color:#ffffff;
}

.logo {
    position: absolute;
    top: 20px; 
    left: 20px;
    height: 100px;
    width: 100px; 
}
</style>
</head>
<body>
<div class="container">
    <img class="logo" src="./img/logo.png" alt="Logo"> 
    <form class="login-form" method="POST" action="signin.php">
    <label for="username">Enter Your Name</label>
        <input type="text" id="username" name="username" required>
        <label for="mail">Enter Your Email</label>
        <input type="email" id="mail" name="mail" required>
        <label for="mail">Create Your Password</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Sign in</button></br></br>
        <a href="index.php">
    <button type="button">Go Back to Home Page</button>
</a>    
</div>
</body>
</html>
