<?php 
// Database configuration
include "../database/dbcon.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, username, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstname, $lastname, $username, $email, $hashed_password);

    // Execute statement
    $checkUserQuery = "SELECT * FROM user WHERE username='$username' OR email='$email'";
    $result = $conn->query($checkUserQuery);

    if ($result->num_rows > 0) {
        // Username or email already exists
        $error = "Username or Email already exists.";
        header("Location: /noctyx/index.php?error=" . urlencode($error));
        exit();
    } else {
        // Insert new user
        $insertUserQuery = "INSERT INTO user (firstname, lastname, username, email, password) VALUES ('$firstname', '$lastname','$username', '$email', '$hashed_password')";
        if ($conn->query($insertUserQuery) === TRUE) {
            $success = "sign_up_success";
            header("Location: /noctyx/client/pages/login.php?sign_up_success=" . urlencode($success));
            exit();
        } else {
            // Handle query error
            echo "Error: " . $conn->error;
            header("Location: /noctyx/index.php?error=" . urlencode($error));
            exit();
        }
    }
}
?>
