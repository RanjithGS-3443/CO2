<?php
session_start();
require_once "db_connection.php"; // Include your database connection

if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $industry_name = $_POST['industry_name'];
    $emission_date = $_POST['emission_date'];
    $co2_emission = $_POST['co2_emission'];
    $industry_location = $_POST['industry_location'];
    $data_entered_by = $_SESSION['username']; // Use session username

    $stmt = $pdo->prepare("INSERT INTO emissions (industry_name, emission_date, co2_emission, industry_location, data_entered_by) VALUES (?, ?, ?, ?, ?)");
    
    if ($stmt->execute([$industry_name, $emission_date, $co2_emission, $industry_location, $data_entered_by])) {
        header('Location: analysis.php');
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Emissions</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0; /* Fallback color */
            background-image: url(factories.jpg); /* Background image */
            background-size: cover; /* Cover the entire viewport */
            background-position: center; /* Center the image */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
            padding: 40px;
            width: 400px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 2em;
            text-shadow: 1px 1px 2px #aaa;
            background: linear-gradient(45deg, #87CEEB, #1E90FF);
            padding: 10px 20px;
            border-radius: 10px;
            display: inline-block;
        }

        label {
            display: block;
            text-align: left;
            margin: 10px 0 5px 0;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 15px;
            background: linear-gradient(45deg, #87CEEB, #1E90FF);
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.3s ease; /* Smooth transition */
        }

        button:hover {
            background: linear-gradient(45deg, #1E90FF, #87CEEB);
            transform: translateY(-3px);
        }

        button:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Submit CO2 Emissions</h2>
        <form action="" method="post">
            <label for="industry_name">Industry Name</label>
            <input type="text" id="industry_name" name="industry_name" placeholder="Industry Name" required>

            <label for="emission_date">Emission Date</label>
            <input type="date" id="emission_date" name="emission_date" required>

            <label for="co2_emission">CO2 Emission (tons)</label>
            <input type="number" id="co2_emission" name="co2_emission" placeholder="CO2 Emission (tons)" required>

            <label for="industry_location">Industry Location</label>
            <input type="text" id="industry_location" name="industry_location" placeholder="Industry Location" required>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
