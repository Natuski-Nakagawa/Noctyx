<?php
session_start();
include '../database/dbcon.php';

if (!isset($_SESSION['user_id'])) {
    echo 'You need to log in first.';
    exit;
}

$user_id = $_SESSION['user_id'];
$title = $_POST['title'];
$content = $_POST['content'];
$editIndex = isset($_POST['editIndex']) ? $_POST['editIndex'] : null;

if ($editIndex) {
    // Update existing note
    $stmt = $conn->prepare("UPDATE notes SET title = ?, content = ?, ndate = NOW() WHERE id = ? AND user_id = ?");
    $stmt->bind_param('ssii', $title, $content, $editIndex, $user_id);
} else {
    // Insert new note
    $stmt = $conn->prepare("INSERT INTO notes (user_id, title, content, ndate) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param('iss', $user_id, $title, $content);
}

if ($stmt->execute()) {
    echo 'Note saved successfully';
} else {
    echo 'Failed to save note';
}

$stmt->close();
$conn->close();
?>
