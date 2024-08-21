<?php
session_start();
include '../database/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['title']) || !isset($_POST['content'])) {
        echo "Missing required fields.";
        exit;
    }

    if (!isset($_SESSION['user_id'])) {
        echo "User not logged in.";
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if (isset($_POST['editIndex'])) {
        $note_id = intval($_POST['editIndex']);
        $stmt = $conn->prepare("UPDATE notes SET title = ?, content = ?, ndate = NOW() WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ssii", $title, $content, $note_id, $user_id);
    } else {
        $stmt = $conn->prepare("INSERT INTO notes (title, content, user_id, ndate) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("ssi", $title, $content, $user_id);
    }

    if ($stmt->execute()) {
        echo "Note saved successfully";
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
