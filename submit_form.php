<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Your email address where the message will be sent
    $to = "sp0865387@gmail.com"; 

    // Subject of the email
    $subject = "New Message from Contact Form";

    // The email content
    $email_content = "
    <html>
    <head>
        <title>Contact Form Submission</title>
    </head>
    <body>
        <h2>New Message from Website</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Message:</strong> $message</p>
    </body>
    </html>
    ";

    // Headers for the email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "<script>alert('Message sent successfully!'); window.location.href='contact.html';</script>";
    } else {
        echo "<script>alert('Message sending failed. Please try again later.'); window.location.href='contact.html';</script>";
    }
}
?>
