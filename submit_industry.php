<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Industry</title>
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
            flex-direction: column; /* Stack elements vertically */
            align-items: center; /* Center horizontally */
            justify-content: center; /* Center vertically */
            height: 100vh; /* Full viewport height */
        }

        h2 {
            margin-top: 20px; /* Space from the top */
            text-align: center; /* Center the text */
            color: #fff; /* White color for the heading */
            font-size: 2.5em;
            text-shadow: 2px 2px 4px #000; /* Add shadow to the heading */
            background: linear-gradient(45deg, #87CEEB, #1E90FF); /* Gradient background */
            padding: 10px 20px;
            border-radius: 10px;
            display: inline-block;
        }

        form {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent background */
            padding: 30px;
            width: 350px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            text-align: center;
            margin-top: 20px; /* Space below the title */
        }

        label {
            display: block;
            text-align: left;
            margin: 10px 0 5px 0;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="date"] {
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
            background: linear-gradient(45deg, #87CEEB, #1E90FF); /* Gradient background for the button */
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.3s ease; /* Smooth transition */
        }

        button:hover {
            background: linear-gradient(45deg, #1E90FF, #87CEEB); /* Reverse gradient on hover */
            transform: translateY(-3px); /* Slight lift on hover */
        }

        button:active {
            transform: translateY(0); /* Return to original position on click */
        }
    </style>
</head>
<body>
    <h2>Add Industry</h2>
    <form action="process_industry.php" method="post">
        <label for="industry_name">Industry Name</label>
        <input type="text" id="industry_name" name="industry_name" placeholder="Industry Name" required>
        
        <label for="owner_name">Owner Name </label>
        <input type="text" id="owner_name" name="owner_name" placeholder="Owner Name" required>
        
        <label for="address">Industry Address</label>
        <input type="text" id="address" name="address" placeholder="Address" required>
        
        <label for="established_on">Established On</label>
        <input type="date" id="established_on" name="established_on" required>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>
