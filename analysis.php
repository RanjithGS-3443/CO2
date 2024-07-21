<?php
session_start();
require_once "db_connection.php"; // Include your database connection

if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CO2 Emissions Analysis</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            background-image: url(factories.jpg); /* Background image */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            width: 80%;
            max-width: 1200px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        h1 {
            margin: 0;
            font-size: 2.5em;
            color: #333;
            text-shadow: 1px 1px 2px #aaa;
        }

        .logout-button {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        .logout-button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
                width: 100%;
            }

            h1 {
                font-size: 2em;
            }

            th, td {
                padding: 10px;
            }

            .logout-button {
                padding: 8px 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>CO2 Emissions Analysis</h1>
            <a href="logout.php" class="logout-button">Logout</a>
        </div>
        <table>
            <tr>
                <th>Industry Name</th>
                <th>Emission Date</th>
                <th>CO2 Emission (tons)</th>
                <th>Industry Location</th>
                <th>Data Entered By</th>
            </tr>
            <?php
            $stmt = $pdo->prepare("
                SELECT emissions.industry_name, emissions.emission_date, emissions.co2_emission, emissions.industry_location, users.username, users.id 
                FROM emissions 
                JOIN users ON emissions.data_entered_by = users.username 
                WHERE emissions.data_entered_by = ?
            ");
            $stmt->execute([$_SESSION['username']]);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                    <td>{$row['industry_name']}</td>
                    <td>{$row['emission_date']}</td>
                    <td>{$row['co2_emission']}</td>
                    <td>{$row['industry_location']}</td>
                    <td>{$row['username']} ({$row['id']})</td>
                </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
