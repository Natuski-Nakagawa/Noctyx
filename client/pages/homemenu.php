<?php
session_start();
include '/xampp/htdocs/Noctyx/server/database/dbcon.php';

if (!isset($_SESSION['user_id'])) {
    header("location: /noctyx/client/pages/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Menu</title>
    <link rel="stylesheet" href="../../server/style/homemenu.css">
    <link rel="stylesheet" href="../../server/style/del-confirm.css">
    <link rel="stylesheet" href="../../server/style/alert.css">
    <link href="../../server/style/overlay.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">
    <script src="../../server/script/script.js" defer></script> <!-- Include the script.js script -->
</head>
<body class="<?php echo isset($_COOKIE['theme']) && $_COOKIE['theme'] == 'dark' ? 'dark-mode' : ''; ?>">
    <div class="sidebar">
        <p>Noctyx</p>
        <a href="../pages/homemenu.php" style="background-color: #404D28;">
            <img src="../assets/homeicon.png" alt="Home Icon">
            Home
        </a>
        <a href="../pages/trashmenu.php">
            <img src="../assets/trashicon.png" alt="Trash Icon">
            Trash
        </a>
        <a href="../pages/settings.php">
            <img src="../assets/settingsicon.png" alt="Settings Icon">
            Settings
        </a>
        <div class="footer">
            <a href="#username" class="username-container">
                <img src="../assets/user.png" alt="Username Icon">
                Username
            </a>
        </div>
    </div>

    <div class="content">
        <div class="search-container">
            <input type="text" class="search-input" placeholder="Search your notes">
        </div>
        
                <div id="noNotes" class="no-notes">
                    <img src="../assets/no-notes.png" alt="No Notes Icon">
                    <p>No notes</p>
                </div>

        <button class="add-button" onclick="openModal()">+</button>

        <div id="noteContainer">
            <div id="noteModal">
                <div class="modal-content">
                    <input type="text" id="noteTitle" placeholder="Title">
                    <textarea id="noteContent" placeholder="Take a note..."></textarea>
                    <div class="button-container">
                    <button id="saveNote"><b>Save</b></button>
                    <button id="cancelNote">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        </div>

        <!-- Confirmation Overlay -->
        <div id="deleteConfirmationOverlay" class="deloverlay">
            <div class="del-overlay-content">
                <p>Are you sure you want to delete this note?</p>
                <button id="confirmDelete" class="btn-confirm">Yes</button>
                <button id="cancelDelete" class="btn-cancel">No</button>
            </div>
        </div>
    </div>

    <!-- Overlay for Notifications -->
    <div id="overlay" class="overlay">
    <div class="popup">
            <p id="errorMessage">Sign-up was successful! You can now log in.</p>
        </div>
    </div>

    <div id="customAlert" class="custom-alert">
        <div class="custom-alert-content">
            <span id="customAlertMessage"></span>
            <button id="customAlertClose">OK</button>
        </div>
    </div>

    <script src="../../server/script/addnote.js" defer></script>
    <script src="../../server/script/notif.js" defer></script>
    
</body>
</html>