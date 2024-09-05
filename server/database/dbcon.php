<?php
// Connection details
$host = "dpg-crck5dbv2p9s73chab70-a";
$port = "5432";
$dbname = "myappdb_uaco";
$user = "myappuser";
$password = "ZDfgGV5CIf4o2jf9xqYu3s11yWq7iUHE";

// Create connection
$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";
$conn = pg_connect($conn_string);

// Check connection
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
?>
