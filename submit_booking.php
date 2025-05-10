<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect form data
    $name     = htmlspecialchars($_POST["name"]);
    $email    = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $phone    = htmlspecialchars($_POST["phone"]);
    $service  = htmlspecialchars($_POST["service"]);
    $date     = htmlspecialchars($_POST["date"]);
    $message  = htmlspecialchars($_POST["message"]);

    // Recipient email
    $to = "your-email@example.com";  // Your email address

    // Subject and body of the email
    $subject = "New Booking Request from $name";
    $body = "You have received a new booking request:\n\n"
          . "Name: $name\n"
          . "Email: $email\n"
          . "Phone: $phone\n"
          . "Service: $service\n"
          . "Preferred Date: $date\n"
          . "Message:\n$message\n";

    // Additional headers
    $headers = "From: $email" . "\r\n" . 
               "Reply-To: $email" . "\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you, $name. Your booking request has been sent!";
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
} else {
    // Redirect to form if accessed directly
    header("Location: /pages/booking.html");
    exit();
}
?>