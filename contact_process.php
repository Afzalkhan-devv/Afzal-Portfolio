<?php

    $to = "afzalkhan.devv@gmail.com";
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $subject = $_REQUEST['subject'];
    $number = isset($_REQUEST['number']) ? $_REQUEST['number'] : 'Not Provided';
    $cmessage = $_REQUEST['message'];

    // Prepare email headers
    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: " . $from . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    // Email subject
    $emailSubject = "You have a new message from your website";

    // Path to logo (if not needed, you can remove these lines)
    $logo = 'img/logo.png';
    $link = '#';

    // Prepare email body
    $body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
    $body .= "<table style='width: 100%;'>";
    $body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
    $body .= "<a href='{$link}'><img src='{$logo}' alt='Logo' width='100'></a><br><br>";
    $body .= "</td></tr></thead><tbody>";
    $body .= "<tr><td style='border:none;'><strong>Name:</strong> {$name}</td></tr>";
    $body .= "<tr><td style='border:none;'><strong>Email:</strong> {$from}</td></tr>";
    $body .= "<tr><td style='border:none;'><strong>Phone Number:</strong> {$number}</td></tr>";
    $body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
    $body .= "<tr><td style='border:none;'><strong>Message:</strong><br>{$cmessage}</td></tr>";
    $body .= "</tbody></table>";
    $body .= "</body></html>";

    // Send the email
    $send = mail($to, $emailSubject, $body, $headers);

    // Check if mail was sent successfully
    if($send) {
        echo "Mail Sent Successfully!";
    } else {
        echo "Mail Sending Failed.";
    }

?>
