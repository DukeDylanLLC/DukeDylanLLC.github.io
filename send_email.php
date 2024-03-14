<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Construct email message
    $to = 'estimate@dukedylan.org';
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $msg = "<html><body>";
    $msg .= "<h2>$subject</h2>";
    $msg .= "<p>$message</p>";
    $msg .= "</body></html>";

    // Send email
    if (mail($to, $subject, $msg, $headers)) {
        http_response_code(200);
        echo "Email sent successfully!";
    } else {
        http_response_code(500);
        echo "Failed to send email. Please try again later.";
    }
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}
?>