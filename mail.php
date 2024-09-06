<?php
// Include PHPMailer classes
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_mail($email, $v_code)
{
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to Gmail's server
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'servicehub36@gmail.com';                 // Your Gmail address
        $mail->Password   = 'ugnn kaxt ruym gnoc';                    // Your Gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS also supported
        $mail->Port       = 587;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom('servicehub36@gmail.com', 'Service Hub PvLtd.');         // Sender's email address and name
        $mail->addAddress("$email", "$fname"."$lname"); // Add a recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'Here is the subject';                     // Email subject
        $mail->Body    = "click on this link to verify 
                            <a href = 'http://localhost/learn/php_project/verify.php?email=$email&v_code=$v_code'>click</a>";          // Email body in HTML format
        $mail->AltBody = 'This is the plain text message body.';    // Plain text body for non-HTML email clients


        $mail->send();
        return 'verify your email';
    } catch (Exception $e) {
        return 'Something went wrong';
    }
}
