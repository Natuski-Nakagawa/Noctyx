<?php
session_start();
include '../database/dbcon.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit;
}

$user_id = $_SESSION['user_id'];

// Prepare and execute SQL statement to fetch notes for the user
$stmt = $conn->prepare("SELECT id, title, content FROM notes WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch notes and output them in a pipe-separated format
while ($row = $result->fetch_assoc()) {
    echo $row['id'] . '|' . $row['title'] . '|' . $row['content'] . "\n";
}

$stmt->close();
$conn->close();
?>
