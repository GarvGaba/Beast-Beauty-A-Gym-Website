<?php
// Start session
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beast_and_beauty";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch appointments details from the database
$sql = "SELECT username, dob, needTrainer, activities FROM appointments";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-image: url("img/gallery/log1.jpg"); /* Replace with the path to your image */
            background-size: cover;
            background-position: center;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Admin panel container */
        #adminPanel {
            background: rgba(0, 0, 0, 0.6); /* Semi-transparent black background */
            color: neon green;
            border-radius: 10px;
            padding: 30px;
            width: 80%;
            max-width: 900px;
            text-align: center;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.7);
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: neon green;
        }

        button {
            padding: 10px 20px;
            background-color: #00ff00; /* Neon green */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: black;
            font-weight: bold;
            font-size: 1rem;
        }

        button:hover {
            background-color: #00cc00; /* Slightly darker green for hover effect */
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: rgba(0, 255, 0, 0.3); /* Transparent neon green */
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #00ff00; /* Neon green border */
        }

        th {
            background-color: rgba(0, 255, 0, 0.5);
            color: black;
            font-weight: bold;
        }

        td {
            background-color: rgba(0, 255, 0, 0.2);
        }
    </style>
</head>
<body>
    <div id="adminPanel">
        <h2>Welcome to Admin Panel</h2>
        <a href="index.php"><button>Go Back to Home Page</button></a> <!-- Button to redirect to home page -->

        <h3>Appointments:</h3>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Appointment Date</th>
                    <th>Need Trainer</th>
                    <th>Activities</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display appointment data
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['dob'] . "</td>";
                        echo "<td>" . $row['needTrainer'] . "</td>";
                        echo "<td>" . $row['activities'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No appointments found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
// Close the database connection
$conn->close();
?>
