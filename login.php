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

// Handle user login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['admin_password'])) {
    $email = trim($_POST['username']); // Assuming 'username' field holds email
    $password = trim($_POST['password']);

    // Check if user exists
    $check_query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch user record
        $user = $result->fetch_assoc();

        // Verify the password (hash or plain text)
        if (password_verify($password, $user['password'])) {
            echo "<script>alert('Login successful! Redirecting to home page...');</script>";
            header("Location: index.php"); // Redirect to home page or dashboard
            exit;
        } elseif ($password === $user['password']) {
            echo "<script>alert('Warning: Password is stored as plain text. Please hash it for security.');</script>";
            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('Invalid password. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('No user found with this email.');</script>";
    }

    $stmt->close();
}

// Handle admin password verification
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['admin_password'])) {
    $admin_password = trim($_POST['admin_password']);

    // Verify the admin password
    $admin_check_query = "SELECT password FROM admin WHERE username = 'garvgaba.gg@gmail.com'"; // Replace with correct admin username
    $stmt = $conn->prepare($admin_check_query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        $hashed_password = $admin['password'];

        if (password_verify($admin_password, $hashed_password)) {
            // Admin password verified, redirect to admin panel
            header("Location: admin.php"); // Change to the correct admin panel URL
            exit;
        } elseif ($admin_password === $hashed_password) {
            echo "<script>alert('Warning: Password is stored as plain text. Please hash it for security.');</script>";
            header("Location: admin.php");
            exit;
        } else {
            echo "<script>alert('Incorrect admin password.');</script>";
        }
    } else {
        echo "<script>alert('Admin not found.');</script>";
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
    background-color: rgba(0, 255, 38, 0.3);
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.login-form input[type="text"],
.login-form input[type="password"] {
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
    color: black;
    border: 1px solid #53cb27;
    border-radius: 5px;
    cursor: pointer;
}

.login-form button:hover {
    background-color: #000000;
    color: #ffffff;
}

.logo {
    position: absolute;
    top: 20px; 
    left: 20px;
    height: 100px;
    width: 100px; 
}

/* Password dialog box styles */
#passwordDialog {
    display: none;
    position: fixed;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    background: #fff;
    border: 1px solid #ccc;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1000;
}

.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: none;
    z-index: 999;
}
</style>
</head>
<body>
<div class="container">
    <img class="logo" src="./img/logo.png" alt="Logo"> 
    <form class="login-form" method="POST" action="">
        <label for="username">Email</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button></br></br>
        <a href="index.php">
            <button type="button">Go Back to Home Page</button>
        </a>

        <a href="signin.php">Don't have an account?</a><br>

        <a href="#" onclick="openAdminDialog()">Login to Admin Panel?</a>
    </form>
</div>

<!-- Password dialog box for Admin -->
<div class="overlay" id="overlay"></div>
<div id="passwordDialog">
    <h3>Enter Admin Password</h3>
    <form id="adminPasswordForm" method="POST" action="">
        <input type="password" name="admin_password" required>
        <button type="submit">Submit</button>
    </form>
    <button onclick="closeDialog()">Close</button>
</div>

<script>
// Function to open the admin password dialog
function openAdminDialog() {
    document.getElementById('passwordDialog').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

// Function to close the password dialog
function closeDialog() {
    document.getElementById('passwordDialog').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}
</script>
</body>
</html>
