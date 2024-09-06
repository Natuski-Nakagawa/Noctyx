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
    $content = htmlspecialchars_decode($row['content'], ENT_QUOTES);
    $content = str_replace(['&lt;br /&gt;', '&lt;br&gt;'], "\n", $content); // Replace HTML entities for <br> tags with new lines
    echo $row['id'] . '|' . $row['title'] . '|' . $content . '|' . $row['ndate'] . "\n";
}

$stmt->close();
$conn->close();
?>