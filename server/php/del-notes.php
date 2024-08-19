<?php
session_start();
include '../database/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id'])) {
        echo "Missing required fields.";
        exit;
    }

    // Retrieve user_id from session
    if (!isset($_SESSION['user_id'])) {
        echo "User not logged in.";
        exit;
    }
    $user_id = $_SESSION['user_id'];

    $id = intval($_POST['id']);  // Ensure the ID is an integer

    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM notes WHERE id = ? AND user_id = ?");
    if ($stmt === false) {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }
    $stmt->bind_param("ii", $id, $user_id);  // Bind the ID and user ID

    if ($stmt->execute()) {
        echo "Note deleted successfully";  // Return success message
    } else {
        echo "Error executing statement: " . $stmt->error;  // Handle errors
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";  // Handle invalid request method
}
?>
