<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

// Function to validate an email address

$email = $_GET['email'];


    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.office365.com'; // Outlook SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'Kirantu9972@outlook.co.id'; // Your Outlook email address
        $mail->Password   = 'Kiran@2002'; // Your Outlook email password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Sender and recipient settings
        $mail->setFrom('Kirantu9972@outlook.co.id', 'Your Name');
        $mail->addAddress($email, 'Recipient Name');
        $mail->addCC('Kirantu8618@gmail.com', 'CC User');
        

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Subject Here';
        $mail->Body    = 'Email body here';

        // Send the email
        $mail->send();
        echo '<script type="text/javascript">
        alert("Mail has been sent");window.location.href="./s.php"</script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  
?>
