<?php
include '../database/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the necessary fields are present
    if (!isset($_POST['title']) || !isset($_POST['content']) || !isset($_POST['user_id'])) {
        echo "Missing required fields.";
        exit;
    }

    // Retrieve and sanitize input
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $user_id = intval($_POST['user_id']); // Ensure user_id is an integer

    // Check if the request is for updating an existing note
    if (isset($_POST['editIndex'])) {
        $editIndex = intval($_POST['editIndex']);

        // Prepare the SQL statement for updating
        $stmt = $conn->prepare("UPDATE notes SET title = ?, content = ? WHERE id = ? AND user_id = ?");
        if ($stmt === false) {
            echo "Error preparing statement: " . $conn->error;
            exit;
        }
        $stmt->bind_param("ssii", $title, $content, $editIndex, $user_id);
    } else {
        // Prepare the SQL statement for inserting
        $stmt = $conn->prepare("INSERT INTO notes (title, content, user_id) VALUES (?, ?, ?)");
        if ($stmt === false) {
            echo "Error preparing statement: " . $conn->error;
            exit;
        }
        $stmt->bind_param("ssi", $title, $content, $user_id);
    }

    // Execute the statement and handle errors
    if ($stmt->execute()) {
        echo "Note saved successfully";
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    // Clean up
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
