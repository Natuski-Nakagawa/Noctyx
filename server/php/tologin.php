<?php
session_start();
include '../database/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    try {
        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("SELECT user_id, password FROM user WHERE username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $success = "Log in successful";
            header("Location: /client/pages/homemenu.php?success=" . urlencode($success));
            exit();
        } else {
            $error = "Invalid username or password";
            header("Location: /client/pages/login.php?error=" . urlencode($error));
            exit();
        }
    } catch (PDOException $e) {
        // Handle PDO exceptions
        $error = "Database error: " . $e->getMessage();
        header("Location: /client/pages/login.php?error=" . urlencode($error));
        exit();
    }
} else {
    $error = "Invalid request method";
    header("Location: /client/pages/login.php?error=" . urlencode($error));
    exit();
}
?>
