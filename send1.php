<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'Exception.php';
    require 'PHPMailer.php';
    require 'SMTP.php';

    // Create an instance of PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kirantu9972@gmail.com';
        $mail->Password = 'vakulptvawfjfqox';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Recipients
        $mail->setFrom('kirantu9972@gmail.com', 'Mailer');
        $mail->addAddress('darshan.b.n4@gmail.com', 'Recipient Name');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Here is the subject';
        $mail->Body = 'This is the HTML message body <b>in bold!</b>';

        // Send the email
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
