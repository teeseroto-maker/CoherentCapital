<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "support@coherentcapital.co.za"; 
    $subject = "New Contact Form Message from $name";

    // Always use your own domain in From:
    $headers = "From: no-reply@coherentcapital.co.za\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message\n";

    if (mail($to, $subject, $body, $headers)) {
        // Redirect back to your site with success message
        header("Location: thank-you.html");
        exit;
    } else {
        echo "Message failed to send. Please try again.";
    }
}
?>