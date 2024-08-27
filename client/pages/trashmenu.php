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
    <title>Trash Menu</title>
    <link rel="stylesheet" href="../../server/style/trashmenu.css" >
    <link href="https://fonts.googleapis.com/css2?family=Jomhuria&display=swap" rel="stylesheet">
    <script src="../../server/script/script.js" defer></script> <!-- Include the script.js script -->
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

            <a href="../pages/trashmenu.php" style="background-color: #404D28;">
                <img src="../assets/trashicon.png" alt="Trash Icon">
                <span>Trash</span>
            </a>

            <a href="../pages/settings.php">
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
        <div class="trash-icon">
            <img src="../assets/notrashicon.png" alt="Trash Icon">
        </div>
        <p>No notes in Trash</p>
    </div>
</body>
</html>