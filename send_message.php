<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['client-name'];
    $email = $_POST['client-email'];
    $message = $_POST['client-message'];
    
    // Set up email
    $to = 'kharelansa@gmail.com'; // Replace with your email address
    $subject = 'New Message from Contact Form';
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: $email";
    
    // Send email
    if (mail($to, $subject, $body, $headers)) {
        // Email sent successfully
        echo json_encode(array('status' => 'success', 'message' => 'Your message has been received. We will contact you soon.'));
    } else {
        // Error sending email
        echo json_encode(array('status' => 'error', 'message' => 'Sorry, there was an error sending your message.'));
    }
} else {
    // Not a POST request
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method.'));
}
?>
