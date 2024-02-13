<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "Lab-1";

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("Connection Failed" .$conn->connect_error);
}

echo "Connection Successful";



$conn->close();
?>