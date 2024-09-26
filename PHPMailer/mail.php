<?php
// Include PHPMailer classes
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mailConfig = require '../env/mail_config.php'; // Load config file

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_mail($email, $v_code, $fname, $lname)
{
    global $mailConfig;
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to Gmail's server
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $mailConfig['username'];                 // Your Gmail address
        $mail->Password   = $mailConfig['password'];                    // Your Gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS also supported
        $mail->Port       = 587;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom($mailConfig['username'], 'Service Hub PvLtd.');         // Sender's email address and name
        $mail->addAddress("$email", "$fname" . "$lname");                       // Add a recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'Here is the subject';                     // Email subject
        $mail->Body    = "click on this link to verify 
                            <a href = 'http://127.0.0.1/service_hub/PHPMailer/verify.php?email=$email&v_code=$v_code'>click</a>";          // Email body in HTML format
        $mail->AltBody = 'This is the plain text message body.';    // Plain text body for non-HTML email clients


        $mail->send();
        return 'verify your email';
    } catch (Exception $e) {
        return 'Something went wrong';
    }
}
