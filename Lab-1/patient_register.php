<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your custom styles here -->
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: auto;
            margin-top:150px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body style="background-image: url('https://c0.wallpaperflare.com/preview/360/533/202/health-medical-healthcare-health.jpg '); background-repeat: no-repeat; background-attachment:fixed; background-size:cover;">

<div class="container">
    <h2 class="text-center mb-4">Patient Registration Form</h2>

    <?php
    // Your PHP code here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lab-1";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection Failed" . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST["name"];
        $address = $_POST["address"];
        $age = $_POST["age"];
        $ssn = $_POST["ssn"];

    // Check for duplicate entry
        $duplicateCheckQuery = "SELECT * FROM patient WHERE ssn = '$ssn'";
        $duplicateCheckResult = mysqli_query($conn, $duplicateCheckQuery);

        if (mysqli_num_rows($duplicateCheckResult) > 0) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error</strong> Patient with the provided SSN already exists.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        } else {
            $sql = "INSERT INTO patient (ssn, name, address, age) VALUES ('$ssn', '$name', '$address', '$age')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> Submitted successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>';
                header("Location: patient_login.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }

    $conn->close();
    ?>

    <form method="post" action="patient_register.php">
        <div class="form-group">
            <input type="text" class="form-control" name="ssn" id="ssn" placeholder="SSN" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="age" id="age" placeholder="Age" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- Add Bootstrap JS and jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
