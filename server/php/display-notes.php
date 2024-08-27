<?php
session_start();
include '../database/dbcon.php';

if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT id, title, content, ndate FROM notes WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo $row['id'] . '|' . $row['title'] . '|' . $row['content'] . '|' . $row['ndate'] . "\n";
}

$stmt->close();
$conn->close();
?>
