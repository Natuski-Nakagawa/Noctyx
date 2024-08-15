<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings Menu</title>
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../server/style/settings.css">
</head>
<body class="<?php echo isset($_COOKIE['theme']) && $_COOKIE['theme'] == 'dark' ? 'dark-mode' : ''; ?>">
    <div class="sidebar">
        <p>Noctyx</p>
        <a href="../pages/homepage.php">
            <img src="../assets/homeicon.png" alt="Home Icon"> <!-- Home icon -->
            Home
        </a>
        <a href="../pages/trashpage.php">
            <img src="../assets/trashicon.png" alt="Trash Icon"> <!-- Trash icon -->
            Trash
        </a>
        <a href="#settings" style="background-color: #404D28;">
            <img src="../assets/settingsicon.png" alt="Settings Icon"> <!-- Settings icon -->
            Settings
        </a>
        <div class="footer">
            <a href="#username" class="username-container">
                <img src="../assets/user.png" alt="Username Icon"> <!-- Username icon -->
                Username
            </a>
        </div>
    </div>

    <div class="content">
        <h2>Settings</h2><br>
        <div class="settings-group">
            <h3>Notes and List</h3>
            <div class="settings-item">
                <label for="new-items">Add new items to the bottom</label>
                <input type="checkbox" id="new-items" checked>
            </div>
            <div class="settings-item">
                <label for="move-items">Move ticked items to bottom</label>
                <input type="checkbox" id="move-items" checked>
            </div>
            <div class="settings-item">
                <label for="rich-previews">Display rich Link previews</label>
                <input type="checkbox" id="rich-previews" checked>
            </div>
            <div class="settings-item">
                <label for="dark-theme">Enable dark theme</label>
                <input type="checkbox" id="dark-theme">
            </div>
        </div>
        <div class="settings-group">
            <h3>Sharing</h3>
            <div class="settings-item">
                <label for="enable-sharing">Enable Sharing</label>
                <input type="checkbox" id="enable-sharing" checked>
            </div>
        </div>

        <div class="logout">
            <a href="../pages/login.php">Log out</a>
        </div>
    </div>

    <!-- Include the JavaScript file -->
    <script src="../../server/script/script.js" defer></script>
</body>
</html>
