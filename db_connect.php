<?php
$servername = "localhost";
$username = "root"; // Default username
$password = "";     // Default password (leave empty)
$dbname = "beast_and_beauty"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
