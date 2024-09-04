<?php
session_start();
include '../database/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Fetch user from the database
    $stmt = $conn->prepare("SELECT user_id, password FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['user_id'] = $user['user_id'];
        $success = "Log in successful";
        header("Location: /client/pages/homemenu.php?". urlencode($success));
        echo "Login successful";
    } else {
        $error = "Invalid username or password";
        header("Location: /client/pages/login.php?error=". urlencode($error));
        echo "Invalid username or password";
    }

    } else {
        $error = "There is no such user";
        header("Location: /client/pages/login.php?error=". urlencode($error));
        echo "There is no such user";
    }
    $stmt->close();
    $conn->close();
?>
