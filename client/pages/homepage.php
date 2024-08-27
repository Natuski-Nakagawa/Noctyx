<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../../server/style/homepage.css" >
    <script src="../../server/script/script.js" defer></script> <!-- Include the script.js script -->
</head>
<body class="<?php echo isset($_COOKIE['theme']) && $_COOKIE['theme'] == 'dark' ? 'dark-mode' : ''; ?>">
<div class="sidebar">
    <div class="search-container">
        <a href="../pages/homemenu.php" class="menu-link">
            <div class="menu-icon">
                <div></div>
            </div>
        </a>
        <input type="text" class="search-input" placeholder="Search your notes">
    </div>
</div>

<div class="footer">
    <a href="#username" class="username-container">
        <img src="../assets/user.png" alt="Username Icon">
            Username
    </a>
</div>

<div class="content">
    <img src="../assets/notes.png" alt="Trash Icon" class="trash-icon">
        <p>No notes</p>
        <button class="add-button">+</button>
</div>

</body>
</html>
