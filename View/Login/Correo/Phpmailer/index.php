<?php
require "exception.php";
require "PHPMailer.php";
require "SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'entornossoluciones@gmail.com';                     // SMTP username
    $mail->Password   = 'Entornos12345';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    session_start();
    $_SESSION['username'] = $Usuario;

    //Recipients
    $mail->setFrom('entornossoluciones@gmail.com', 'Acabas de ingresar a Entornos');
    $mail->addAddress( $Usuario, 'Joe User');     // Add a recipient
    $mail->addAddress('destinatario@gmail.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //   // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Bienvenido a Entornos';
    $mail->Body    = 'Hemos detectado un ingreso';
    $mail->AltBody = 'puedes verificar si es asi';

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
