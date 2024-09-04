<?php
$servername = "db"; // or your database server address
$username = "root"; // your database username
$password = "comfac123"; // your database password
$dbname = "noctyx"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>