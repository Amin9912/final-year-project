<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Replace the following with your email address
    $to = "nshippuden21@gmail.com";

    $subject = "New Contact Form Submission from $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    $mail_sent = mail($to, $subject, $message, $headers);

    if ($mail_sent) {
        // Email sent successfully
        echo '<script>alert("Your message has been sent successfully! We will get back to you shortly.");</script>';
    } else {
        // Email sending failed
        echo '<script>alert("Oops! Something went wrong. Please try again later.");</script>';
    }
}
?>
