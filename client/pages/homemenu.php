<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Menu</title>
    <link rel="stylesheet" href="../../server/style/homemenu.css">
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
                <button id="saveNote"><b>Save</b></button>
                </div>
            </div>
        </div>
    </div>

    <script src="../../server/script/addnote.js"></script>
</body>
</html>
