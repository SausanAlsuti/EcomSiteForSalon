<?php
$to = "your-email@example.com";
$subject = "Test Email from XAMPP";
$message = "This is a test email sent from PHP using mail() in XAMPP.";
$headers = "From: your-email@example.com";

if (mail($to, $subject, $message, $headers)) {
    echo "Test email sent successfully!";
} else {
    echo "Test email failed.";
}
?>
