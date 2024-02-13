



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .alert {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .register-button {
            margin-top: 20px;
            background-color: #3498db;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Doctor's Login</h2>
        <form method="post" action="">
            <div class="form-group">
                <input type="text" name="ssn" id="ssn" placeholder="SSN" required>
            </div>
            <button type="submit">Submit</button>
            <button class="register-button" onclick="location.href='doctor_register.php';">Register</button>
        </form>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lab-1";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if($conn->connect_error){
            die("Connection Failed" .$conn->connect_error);
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ssn = $_POST["ssn"];
    
            $prescriptionsQuery = "SELECT prescribes.name_drug, prescribes.qty, prescribes.date, patient.name AS patient_name
                           FROM prescribes
                           JOIN patient ON prescribes.ssn_patient = patient.ssn";

            $prescriptionsResult = $conn->query( $prescriptionsQuery);

            echo '<div class="table-container">';

            if ($prescriptionsResult->num_rows > 0) {
                echo '<table>';
                echo '<tr><th>Drug Name</th><th>Quantity</th><th>Date</th><th>patient_name</th></tr>';
                while ($row = $prescriptionsResult->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row["name_drug"] . '</td>';
                    echo '<td>' . $row["qty"] . '</td>';
                    echo '<td>' . $row["date"] . '</td>';
                    echo '<td>' . $row["patient_name"] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>No drug prescribed.</p>';
            }
            exit;
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
