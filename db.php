<?php
$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "yumeneko";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Checking for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
