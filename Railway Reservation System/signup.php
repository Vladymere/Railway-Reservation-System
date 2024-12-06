<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biyahe_rail";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $signup_username = $_POST['signup-username'];
    $signup_email = $_POST['signup-email'];
    $signup_password = $_POST['signup-password'];
    $confirm_password = $_POST['confirm-password'];

    // Check if passwords match
    if ($signup_password !== $confirm_password) {
        echo "Passwords do not match.";
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($signup_password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $signup_username, $signup_email, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to sign-in form
        header("Location: index.html?signup=success");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>