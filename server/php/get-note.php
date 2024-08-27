<?php
session_start();
include '../database/dbcon.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$noteId = $_GET['id'];
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT title, content FROM notes WHERE id = ? AND user_id = ?");
$stmt->bind_param('ii', $noteId, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $note = $result->fetch_assoc();
    echo json_encode($note);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Note not found']);
}

$stmt->close();
$conn->close();
?>
