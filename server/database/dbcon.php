<?php
// Connection details
$host = "dpg-crck5dbv2p9s73chab70-a";
$port = "5432";
$dbname = "myappdb_uaco";
$user = "myappuser";
$password = "ZDfgGV5CIf4o2jf9xqYu3s11yWq7iUHE";

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
