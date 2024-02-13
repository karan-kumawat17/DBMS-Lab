<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab-1";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection Failed" .$conn->connect_error);
}
else{
    echo "Connection was successful.";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST["name"];
    $specialty = $_POST["specialty"];
    $years_exp = $_POST["years_exp"];
    $ssn = $_POST["ssn"];
    
    $duplicateCheckQuery = "SELECT * FROM doctor WHERE ssn = '$ssn'";
    $duplicateCheckResult = mysqli_query($conn, $duplicateCheckQuery);

    if (mysqli_num_rows($duplicateCheckResult) > 0) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error</strong> Doctor with the provided SSN already exists.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    } else {
        $sql = "INSERT INTO doctor (ssn, name, specialty, years_exp) VALUES ('$ssn', '$name', '$specialty', '$years_exp')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> Submitted successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            header("Location: /Lab-1/login.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

$conn->close();
?>

<form method="post" action="doctor.php">
    <label for="ssn">ssn:</label>
    <input type="text" name="ssn" id="ssn" required>
    <br>
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    <br>
    <label for="specialty">Specialty:</label>
    <input type="text" name="specialty" id="specialty" required>
    <br>
    <label for="years_exp">Years of Experience:</label>
    <input type="text" name="years_exp" id="years_exp" required>
    <br>
    <button type="submit">Submit</button>
</form>
