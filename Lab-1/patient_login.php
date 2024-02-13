<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient | Log In</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: auto;
            margin-top:200px;
            padding: 20px;
            text-align: center;
        }

        .table-container {
            max-width: 600px; /* Adjust the maximum width as needed */
            margin: 0 auto;
            text-align: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; /* Add margin for better visibility */
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        h2 {
            color: #333;
        }

        p {
            margin-bottom: 8px;
            color: #555;
        }

        .register-button {
            margin-top: 20px;
            background-color: #3498db;
        }
    </style>
</head>
<body style="background-image: url('https://c4.wallpaperflare.com/wallpaper/1008/211/698/abstract-abstraction-biology-chemistry-wallpaper-preview.jpg'); background-repeat: no-repeat; background-attachment:fixed; background-size:cover;">

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lab-1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection Failed" . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ssn = $_POST["ssn"];

        $sql = "SELECT * FROM doctor";
        $result = $conn->query($sql);

        echo '<div class="table-container">';

        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>Name</th><th>Specialty</th><th>Years of Experience</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["name"] . '</td>';
                echo '<td>' . $row["specialty"] . '</td>';
                echo '<td>' . $row["years_exp"] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No available doctors at the moment.</p>';
        }

        exit;
    }

    $conn->close();
    ?>

    <form method="post" action="">
        <label for="ssn">Patient Login Form:</label>
        <input type="text" name="ssn" id="ssn" placeholder="Enter your SSN" required>
        <br>
        <button type="submit">Submit</button>
        <button class="register-button" onclick="location.href='patient_register.php';">Register</button>
    </form>

    

</body>
</html>
