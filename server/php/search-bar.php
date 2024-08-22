<?php
session_start();
include '../database/dbcon.php';

if (!isset($_SESSION['user_id'])) {
    echo 'You need to log in first.';
    exit;
}

$user_id = $_SESSION['user_id'];
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Prepare and execute the SQL query to search for notes by title
$sql = "SELECT * FROM notes WHERE user_id = ? AND title LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = '%' . $query . '%';
$stmt->bind_param('is', $user_id, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

// Display the results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Format the date
        $date = new DateTime($row['ndate']);
        $formattedDate = $date->format('n/j/Y, g:i:s A');

        echo '<div class="note" data-id="' . htmlspecialchars($row['id']) . '">';
        echo '<div class="note-content">';
        echo '<strong>' . htmlspecialchars($row['title']) . '</strong><br>';
        echo htmlspecialchars($row['content']);
        echo '</div>';
        echo '<div class="note-timestamp">';
        echo 'Last update: ' . htmlspecialchars($formattedDate);
        echo '</div>';
        echo '<div class="note-icons">';
        echo '<img src="../assets/edit-icon.png" alt="Edit" class="edit-icon">';
        echo '<img src="../assets/delete-icon.png" alt="Delete" class="delete-icon">';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<div class="no-notes">No notes found</div>';
}

$stmt->close();
$conn->close();
?>

<div id="noteModal" class="modal">
    <div class="modal-content">
        <input type="text" id="noteTitle" placeholder="Title">
        <textarea id="noteContent" placeholder="Take a note..."></textarea>
        <button id="saveNote"><b>Save</b></button>
    </div>
</div>

    <script src="../../server/script/addnote.js" defer></script>
    <script src="../../server/script/notif.js" defer></script>
    <script src="../../server/script/search.js" defer></script>
    <script src="../../server/script/script.js" defer></script> 
