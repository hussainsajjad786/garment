<?php
$servername = "localhost";
$username = "root"; // Change if needed
$password = "";
$database = "jacket"; // Database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>