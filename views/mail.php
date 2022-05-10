<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../includes/Exception.php';
require '../includes/PHPMailer.php';
require '../includes/SMTP.php';

// Instantiation and passing true enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings                    // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true; 
    $mail->SMTPSecure = 'tls';                                  // Enable SMTP authentication
    $mail->Username   = 'aymenzouaritripee@gmail.com';                     // SMTP username
    $mail->Password   = 'imed2002';                               // SMTP password
                                         // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS encouraged
    $mail->Port       = "25";                                    // TCP port to connect to, use 465 for PHPMailer::ENCRYPTION_SMTPS above

    //Recipients Email sender
    $mail->setFrom('aymenzouaritripee@gmail.com', 'Admin');
    $mail->addAddress('aymenzouaritripee@gmail.com');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Welcome to TRIPEE';
    $mail->Body    = 'you have registered successfully <br> <b> For any informations talk with our Admin Zouari Aymen <br> This is his email aymenzouaritripee@gmail.com !</b>';

    $mail->send();
    echo 'Message has been sent';
    $mail->smtpClose();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
} 
?>