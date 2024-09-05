<?php 
// Database configuration
include "../database/dbcon.php"; // Ensure this file initializes $conn as a PDO instance

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Check if username or email already exists
        $checkUserQuery = "SELECT * FROM user WHERE username = :username OR email = :email";
        $checkStmt = $conn->prepare($checkUserQuery);
        $checkStmt->bindParam(':username', $username);
        $checkStmt->bindParam(':email', $email);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            // Username or email already exists
            $error = "Username or Email already exists.";
            header("Location: /noctyx/index.php?error=" . urlencode($error));
            exit();
        } else {
            // Insert new user
            $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, username, email, password) VALUES (:firstname, :lastname, :username, :email, :password)");

            // Bind parameters
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);

            // Execute statement
            if ($stmt->execute()) {
                $success = "sign_up_success";
                header("Location: /noctyx/client/pages/login.php?sign_up_success=" . urlencode($success));
                exit();
            } else {
                // Handle query error
                $error = "Error: " . $stmt->errorInfo()[2];
                header("Location: /noctyx/index.php?error=" . urlencode($error));
                exit();
            }
        }
    } catch (PDOException $e) {
        // Handle PDO exceptions
        $error = "Error: " . $e->getMessage();
        header("Location: /noctyx/index.php?error=" . urlencode($error));
        exit();
    }
}
?>
