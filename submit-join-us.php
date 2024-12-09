<?php
// Error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $address = htmlspecialchars(trim($_POST['address']));
    $interest = htmlspecialchars(trim($_POST['interest']));
    $message = htmlspecialchars(trim($_POST['message']));
    $subscribe = isset($_POST['subscribe']) ? 'Yes' : 'No';

    // Basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Email details
    $to = "kenyanzap08@gmail.com"; // Replace with your email address
    $subject = "New Member Registration";
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-type: text/html\r\n";

    // Message content
    $email_content = "
    <html>
    <head>
        <title>$subject</title>
    </head>
    <body>
        <h2>New Member Registration</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Address:</strong> $address</p>
        <p><strong>Area of Interest:</strong> $interest</p>
        <p><strong>Message:</strong></p>
        <p>$message</p>
        <p><strong>Subscribe to Newsletter:</strong> $subscribe</p>
    </body>
    </html>
    ";

    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Thank you for joining us!";
    } else {
        echo "Sorry, there was an error sending your registration. Please try again later.";
    }
}
