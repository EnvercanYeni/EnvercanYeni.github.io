<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $gender = $_POST['cinsiyet'];
    $message = $_POST['message'];

    // Construct email message
    $body = "Name: $name\nSurname: $surname\nEmail: $email\nGender: $gender\nSubject: $subject\n\nMessage:\n$message";

    // Set email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    // Send email
    $to = 'envercan4006@gmail.com'; // Change this to your email address
    $subject = 'New message from contact form';
    $sent = mail($to, $subject, $body, $headers);

    // Output success or error message
    if ($sent) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>