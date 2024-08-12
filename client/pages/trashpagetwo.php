<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Interface</title>
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            background-color: #66723b;
            width: 160.5px;
            padding: 20px;
            display: flex;
            height: 100%;
            flex-direction: column;
            align-items: center;
        }

        .top-bar {
            display: flex;
            align-items: center;
            width: 100%;
            margin-bottom: 20px;
        }

        .menu-button {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            margin-right: 10px;
        }

        .search-bar {
            padding: 10px;
            font-size: 12px;
            border: none;
            border-radius: 4px;
            flex-grow: 1;
            width: 20px;
        }

        .note-list {
            width: 100%;
            margin-top: 20px;
        }

        .note-item {
            background-color: white;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .note-text {
            color: #66723b;
            font-size: 14px;
        }

        .note-actions {
            display: flex;
            gap: 5px;
        }

        .note-icon {
            cursor: pointer;
            width: 20px;
            height: 20px;
        }

        .content {
            flex-grow: 1;
            background-color: #f5f5f5;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .content-title {
            font-size: 24px;
            color: #66723b;
            margin-bottom: 10px;
        }

        .content-text {
            font-size: 16px;
            color: #99a482;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="top-bar">
            <button class="menu-button">☰</button>
            <input type="text" placeholder="Search your notes" class="search-bar">
        </div>
        <div class="note-list">
            <div class="note-item">
                <div class="note-text">Title</div>
                <div class="note-actions">
                    <img src="../assets/redoicon.png" alt="Redo Icon" class="note-icon">
                    <img src="../assets/trashthree.png" alt="Delete Icon" class="note-icon">
                </div>
            </div>
            <!-- Add more notes here -->
        </div>
    </div>
    <div class="content">
        <div class="content-title">Title</div>
        <div class="content-text">Text here</div>
    </div>
</body>
</html>
