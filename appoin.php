
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<style>
body {
    font-family: Arial, sans-serif;
    /*background-image: url("img/gallery/log.png");*/
    background-color: #000000;
    color: #ffffff;
    background-size: cover;
    background-position:auto;
    background-repeat:no-repeat;
    margin: 0;
    padding: 0;
    display: flex;
    height: 100vh; 
    position: relative; 
}



.container {
    
    width: 90%;
    max-width: 900px;
    position: absolute;
    margin: 20px;
    top: 60%;
    right: 0;
    transform: translate(0, -50%); 
}



.login-form {
    display: flex; 
    flex-direction: column;
    align-items: center;
    background-color: rgba(2, 248, 6, 0.1); 
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 100px;
    margin-bottom: 20px;
}

.login-form input[type="text"],
.login-form input[type="password"],
.login-form input[type="tel"],
.login-form input[type="number"],
.login-form input[type="date"],
.login-form select {
    width: calc(100% - 40px); 
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
    background-color: rgba(255, 255, 255, 0.1);
    color: #ffffff;
}

.login-form select {
    appearance: none; 
    -webkit-appearance: none; 
    -moz-appearance: none; 
    background-image: url('data:image/svg+xml;utf8,<svg fill="%23ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7 10l5 5 5-5z"/></svg>'); /* Custom arrow icon */
    background-repeat: no-repeat;
    background-position: right 10px top 50%;
    background-size: 20px 20px;
}

.login-form select option {
    color: #000; 
}

.login-form input[type="text"]:focus,
.login-form input[type="password"]:focus,
.login-form input[type="tel"]:focus,
.login-form input[type="number"]:focus,
.login-form input[type="date"]:focus,
.login-form select:focus {
    background-color: rgb(133, 133, 133);
}

.login-form fieldset {
    border: 2px solid #ccc; 
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px; 
}

#submit{
    width: calc(50% - 5px); /* Set width to 50% of the container minus some margin */
    background-color: #01ff0e;
    color: #000000;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    height: 25px;

}

/* Adjusted styles for "Generate Captcha" button */
#captchab{
    width: calc(50% - 5px); /* Set width to 50% of the container minus some margin */
    background-color: #01ff0e;
    color: #000000;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    height: 25px;
}
#activities{
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
}
.login-form label {
    margin-bottom: 5px;
    margin-top: 10px;
}
.mar{
    background:#01ff0e;
    margin-top: 30px;
    max-height:20px;
    color: #000000;
    /* padding-bottom: 50px; */
}
.logo-container {
    position: absolute;
    left: 20px; /* Adjust as needed */
    top: 50%;
    transform: translateY(-50%); /* Vertically center */
    
}
#submit-home {
    margin-left: 180px;
    background-color: #01ff0e;
    color: #000000;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    height: 25px;
}
.text-container {
    text-align: center;
    margin-top: 20px; /* Adjust as needed */
}

/* Responsive adjustments */
@media screen and (max-width: 600px) {
    .container {
        width: 90%;
    }
}
</style>


</head>
<body>
    <marquee class="mar" >Unleash Your Inner Beast, Embrace Your Inner Beauty at Beast and Beauty Gym!</marquee>
    <div class="logo-container">
        <img class="logo" src="./img/logo.png" alt="Logo">
        
    
        <pre>
        <h3>“I hated every minute of training, but I said, ‘Don’t quit.
        Suffer now and live the rest of your life as a champion.”
                                                 –: Muhammad Ali</h3>
        
        </pre>

       <a href="index.php">      <button id="submit-home">Go Back to Home Page</button></a>
        
    </div>

<div class="container">
<form class="login-form" action="" method="POST">
<fieldset>
            <legend>Fill the Form</legend>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>


        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required><br>
        <label for="phone">Email</label>
        <input type="tel" id="phone" name="email" required><br>

        <label for="dob">Appointment Date </label>
        <input type="date" id="dob" name="dob" required>

        <label for="weight">Body Weight (kg)</label>
        <input type="number" id="weight" name="weight" min="1" required>

        <label for="height">Height (cm)</label>
        <input type="number" id="height" name="height" min="1" required>
        <label for="needTrainer">Need Trainer</label>
<select id="needTrainer" name="needTrainer">
    <option value="yes">Yes</option>
    <option value="no">No</option>
</select>

        <label for="activities">Other Activities</label>
        <div id="activities">
            <input type="checkbox" id="activity1" name="activities[]" value="Zumba Classes">
            <label for="activity1">Zumba Classes</label><br>
            <input type="checkbox" id="activity2" name="activities[]" value="Dance Classes">
            <label for="activity2">Dance Classes</label><br>
            <input type="checkbox" id="activity3" name="activities[]" value="Yoga">
            <label for="activity3">Yoga</label><br>
        </div><br>
        <!-- Captcha -->
        <label for="captcha">Captcha</label>
        <input type="text" id="captcha" name="captcha" readonly>
        <button type="button" id="captchab" onclick="generateCaptcha()">Generate Captcha</button>

        <button type="submit" id="submit">Book Appointment</button>
        </fieldset>
    </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Database connection
    $servername = "localhost";
    $usernameDB = "root";
    $passwordDB = "";
    $dbname = "beast_and_beauty";

    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Validate username
    $username = trim($_POST['username']);
    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    // Validate password
    $password = $_POST['password'];
    if (strlen($password) < 8 || 
        !preg_match('/[A-Z]/', $password) || 
        !preg_match('/[a-z]/', $password) || 
        !preg_match('/[0-9]/', $password) || 
        !preg_match('/[\W_]/', $password)) {
        $errors[] = "Password must be at least 8 characters long, include uppercase, lowercase, a number, and a special character.";
    }

    // Validate phone number
    $phone = $_POST['phone'];
    if (!preg_match('/^[0-9]{10}$/', $phone)) {
        $errors[] = "Invalid phone number format.";
    }

    // Validate email
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    // Validate date of birth
    $dob = $_POST['dob'];
    if (empty($dob)) {
        $errors[] = "Date of Birth is required.";
    }

    // Validate weight
    $weight = $_POST['weight'];
    if ($weight < 1) {
        $errors[] = "Weight must be a positive number.";
    }

    // Validate height
    $height = $_POST['height'];
    if ($height < 1) {
        $errors[] = "Height must be a positive number.";
    }

    // Validate trainer need
    $needTrainer = $_POST['needTrainer'];

    // Validate activities
    $activities = isset($_POST['activities']) ? implode(", ", $_POST['activities']) : "";

    // Check if there are errors
    if (!empty($errors)) {
        echo "<div style='color: red;'><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul></div>";
    } else {
        // Insert data into database
        $stmt = $conn->prepare("INSERT INTO appointments (username, password, phone, email, dob, weight, height, needTrainer, activities) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssdiss", $username, $password, $phone, $email, $dob, $weight, $height, $needTrainer, $activities);

        if ($stmt->execute()) {
            echo "<div style='color: green;'>Form submitted and data stored successfully!</div>";
        } else {
            echo "<div style='color: red;'>Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<script>
function generateCaptcha(length = 6) {
    const charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    let captcha = '';
    for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * charset.length);
        captcha += charset[randomIndex];
    }
    document.getElementById('captcha').value = captcha;
}
</script>


</body>
</html>
