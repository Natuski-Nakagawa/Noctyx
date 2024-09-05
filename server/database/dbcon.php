<?php
// Connection details
$host = "dpg-crck5dbv2p9s73chab70-a";
$port = "5432";
$dbname = "myappdb_uaco";
$user = "myappuser";
$password = "ZDfgGV5CIf4o2jf9xqYu3s11yWq7iUHE";

// Create connection
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
try {
    $conn = new PDO($dsn, $user, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
