<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "noctyx";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start(); // Start session for user session management

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    echo "Entered Password: " . $input_password . "<br>";

    // Prepare a SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT user_id, username, password FROM user WHERE username = ?");
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $stmt->store_result();

    // Check if username exists in the database
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $username, $hashed_password);
        $stmt->fetch();

        echo "Stored Hashed Password: " . $hashed_password . "<br>";

        // Verify password
        if (password_verify($input_password, $hashed_password)) {
            // Password is correct, start a session
            $_SESSION['username'] = $username;
            $stmt->close();
            $conn->close();
            // Redirect to the welcome page or dashboard
            header("Location: /noctyx/client/pages/home.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }

    $stmt->close();
}

$conn->close();
?>
