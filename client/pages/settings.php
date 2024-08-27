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
    <title>Settings Menu</title>
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../server/style/settings.css">
</head>
<body class="<?php echo isset($_COOKIE['theme']) && $_COOKIE['theme'] == 'dark' ? 'dark-mode' : ''; ?>">
<div class="sidebar">
        
        <div class="sidetop">
            <img src ="../assets/icon.png">
            <p>Noctyx</p>
        </div>
            
        <div class="sidemid">
            <a href="../pages/homemenu.php">
                <img src="../assets/homeicon.png" alt="Home Icon">
                <span>Home</span>
            </a>

            <a href="../pages/trashmenu.php">
                <img src="../assets/trashicon.png" alt="Trash Icon">
                <span>Trash</span>
            </a>

            <a href="../pages/settings.php" style="background-color: #404D28;">
                <img src="../assets/settingsicon.png" alt="Settings Icon">
                <span>Settings</span>
            </a>
                <div class="footer">
                    <a href="#username" class="username-container">
                        <img src="../assets/user.png" alt="Username Icon">
                        <span>Username</span>
                    </a>
                </div>
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
        <form action="../../server/php/logout.php">
            <div class="logout">
                <button type="submit">Log out</button>
            </div>
        </form>
    </div>

    <!-- Include the JavaScript file -->
    <script src="../../server/script/script.js" defer></script>
</body>
</html>