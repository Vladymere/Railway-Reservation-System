<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['forgot-email'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Generate a unique reset token
    $token = bin2hex(random_bytes(50));

    // Save the token and email in the database (pseudo code)
    // saveToken($email, $token);

    // Send the reset link via email
    $resetLink = "http://yourwebsite.com/reset_password.php?token=" . $token;
    $subject = "Password Reset Request";
    $message = "Click the following link to reset your password: " . $resetLink;
    $headers = "From: no-reply@yourwebsite.com";

    if (mail($email, $subject, $message, $headers)) {
        echo "A reset link has been sent to your email address.";
    } else {
        echo "Failed to send reset link.";
    }
}
?>