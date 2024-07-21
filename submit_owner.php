<?php
session_start();
require_once "db_connection.php"; // Include your database connection

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: success2.html");
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO owner_details (name, phone_number, email, address, gender) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$name, $phone_number, $email, $address, $gender])) {
        echo "Owner details submitted successfully!";
        header("Location: success2.html"); // Redirect to emissions submission page
        exit;
    } else {
        echo "Error submitting owner details.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Owner Details</title>
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
            padding: 30px;
            width: 600px;
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
        textarea,
        select {
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
        <h2>Submit Owner Details</h2>
        <form action="" method="post">
            <label for="name">Owner Name</label>
            <input type="text" id="name" name="name" placeholder="Owner Name" required>
            
            <label for="phone_number">Phone Number</label>
            <input type="text" id="phone_number" name="phone_number" placeholder="Phone Number" required>
            
            <label for="email">Email</label>
            <textarea id="email" name="email" placeholder="Email" required></textarea>
            
            <label for="address">Owner Address</label>
            <textarea id="address" name="address" placeholder="Address" required></textarea>
            
            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
