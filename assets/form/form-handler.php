<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstName'] ?? '';
    $lastName  = $_POST['lastName'] ?? '';
    $fullName  = $_POST['fullName'] ?? '';
    $email     = $_POST['email'] ?? '';
    $phone     = $_POST['phone'] ?? '';
    $subject   = $_POST['subject'] ?? '';
    $service   = $_POST['service'] ?? '';
    $message   = $_POST['message'] ?? '';
    $agree     = $_POST['agree'] ?? '';

    $name = !empty($fullName) ? $fullName : trim("$firstName $lastName");

    if (empty($name) || empty($email)) {
        echo "Please fill in all required fields.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    if ($agree !== 'true') {
        echo "You must agree to the privacy policy and terms.";
        exit;
    }

    if (empty($subject)) {
        $subject = !empty($service) ? $service : 'Website Form Submission';
    }

    if (empty($message)) {
        $message = 'No additional message provided.';
    }

    $to = "mical@connectifii.au";
    $subjectLine = "New Form Submission: $subject";

    $body = "
    Dear Team,

    A new contact form submission was received via the website. The visitor left the following details:

    Name: $name  
    Email: $email  
    Phone: $phone  
    Service/Subject: $subject  

    Message:
    $message

    Please reach out to them promptly.

    Best regards,  
    Website Notification System
    ";


    $headers  = "From: admin@connectifii.au\r\n";
    $headers .= "Reply-To: " . filter_var($email, FILTER_SANITIZE_EMAIL) . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subjectLine, $body, $headers)) {
        echo "Thank you for contacting us. We will get back to you shortly.";
    } else {
        echo "An error occurred while sending the message.";
    }
}
?>
