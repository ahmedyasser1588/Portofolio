<?php

// Check if the form was submitted using the GET method
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // Get the form data securely from the $_GET array
    $name = htmlspecialchars($_GET['name']);
    $email = htmlspecialchars($_GET['email']);
    $message = htmlspecialchars($_GET['message']);

    // Recipient email address - Change this to your email
    $to = 'ahmed.yasser200622@gmail.com';

    // Email subject
    $subject = "New Contact Form Submission from: " . $name;

    // Email message body
    $email_body = "You have received a new message from your portfolio website.\n\n";
    $email_body .= "Name: " . $name . "\n";
    $email_body .= "Email: " . $email . "\n";
    $email_body .= "Message:\n" . $message . "\n";

    // Set email headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $email_body, $headers)) {
        // Success: Show a thank you message and a link to go back
        echo "<h1>Thank you! Your message has been sent successfully.</h1>";
        echo "<p><a href='index.html'>Go back to the homepage</a></p>";
    } else {
        // Error: Show an error message
        echo "<h1>Sorry, there was an error sending your message. Please try again later.</h1>";
        echo "<p><a href='index.html'>Go back to the homepage</a></p>";
    }

} else {
    // If someone tries to access this page directly, redirect them to the home page
    header("Location: index.html");
    exit();
}

?>