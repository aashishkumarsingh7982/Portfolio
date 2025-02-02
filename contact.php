<?php
// Enable error reporting to debug issues
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the form was submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Basic form validation (optional)
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required!";
        exit;
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

    // Specify the recipient email (replace with your email)
    $to = "aashishkumarsingh00@gmail.com"; // Replace with your email address
    $subject = "Contact Form Submission from $name";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";
    
    // Set additional email headers (optional)
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Send the email and check for success or failure
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting us, $name! We will get back to you shortly.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
} else {
    // If the form was not submitted via POST, show a 405 error
    echo "Method Not Allowed: Only POST requests are accepted.";
    http_response_code(405); // Set the HTTP response code to 405 (Method Not Allowed)
}
?>
