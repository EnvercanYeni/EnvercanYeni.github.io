<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

require 'vendor/autoload.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $cinsiyet = $_POST['cinsiyet'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Configure the SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'envercan4006@gmail.com';
        $mail->Password = 'Enver4006.';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Set the sender and recipient email addresses
        $mail->setFrom($email, $name . ' ' . $surname);
        $mail->addAddress('envercan4006@gmail.com');

        // Set the email subject and body
        $mail->Subject = $subject;
        $mail->Body = "Ad: $name\nSoyad: $surname\nCinsiyet: $cinsiyet\n\n$message";

        // Send the email
        $mail->send();

        // Output a success message
        echo 'Mesajınız başarıyla gönderildi. Teşekkürler!';

    } catch (Exception $e) {
        // Output an error message
        echo 'Mesaj gönderilirken bir hata oluştu: ' . $mail->ErrorInfo;
    }
}
?>
