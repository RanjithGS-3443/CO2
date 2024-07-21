<?php
session_start();
require_once "db_connection.php"; // Include your database connection

// Check if already logged in
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query database
    $sql = "SELECT id FROM users WHERE username = ? AND password = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();

    if($user) {
        // Set session variables
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user['id']; // Set the user_id session variable
        header("Location: home.html");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            overflow: hidden;
            background-color: #f4f4f4; /* Light gray background for the whole page */
        }

        .background-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            opacity: 0.6; /* Slightly dim the video for better text readability */
        }

        header {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: 100%;
            background-color: #004080; /* Dark blue background */
            padding: 20px 0; /* Increased padding for a balanced look */
            border-bottom: 5px solid #003366; /* Darker blue border for emphasis */
            color: #ffffff; /* White text color */
            z-index: 1;
        }

        header img {
            width: 80px; /* Adjust as needed */
            height: auto;
            vertical-align: middle;
            margin-right: 15px; /* Space between image and text */
        }

        header h1 {
            display: inline;
            margin: 0;
            font-size: 26px;
            font-weight: bold;
            text-transform: uppercase;
            vertical-align: middle;
        }

        .header-image {
            display: block;
            margin: 20px auto;
            width: 120px; /* Adjust as needed */
            height: auto;
            border: 2px solid #004080; /* Dark blue border around the image */
            border-radius: 8px; /* Rounded corners for a polished look */
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.95); /* Slightly more opaque background for better readability */
            padding: 30px;
            width: 360px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); /* Stronger shadow for emphasis */
            text-align: center;
            border: 2px solid #004080; /* Dark blue border */
            position: relative;
            z-index: 1;
        }

        h2 {
            margin-bottom: 20px;
            color: #004080;
            font-size: 22px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .note {
            margin: 20px 0;
            font-size: 16px;
            color: #d32f2f; /* Red color */
            font-weight: bold;
            border: 1px solid #d32f2f; /* Red border */
            padding: 10px;
            border-radius: 5px; /* Rounded corners for a polished look */
            background-color: #fce4e4; /* Light red background */
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #003366;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #fafafa; /* Light gray background for inputs */
            box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1); /* Inner shadow for depth */
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #004080; /* Dark blue color */
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 18px;
            text-transform: uppercase;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Button shadow for depth */
        }

        button:hover {
            background-color: #002f6c; /* Even darker blue color */
        }

        p {
            margin-top: 20px;
            font-size: 14px;
        }

        p a {
            color: #004080;
            text-decoration: none;
            font-weight: bold;
        }

        p a:hover {
            text-decoration: underline;
        }

        footer {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: 100%;
            background-color: #003366;
            color: #ffffff;
            padding: 10px 0;
            border-top: 5px solid #004080;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header>
        <img src="govt.png" alt="Government Logo">
        <h1>INDUSTRY CO2 EMISSION ANALYSIS PLATFORM LOGIN</h1>
    </header><br></br><br></br>
    <video class="background-video" autoplay muted loop>
        <source src="smoke2.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="login-container">
        <h2>Login</h2>
        <div class="note">
            NOTE: Only Authorized Users allocated from Government of India can Login
        </div>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
    <footer>
        &copy; 2024 Industry CO2 Emission Analysis Platform. All rights reserved.
    </footer>
</body>
</html>
