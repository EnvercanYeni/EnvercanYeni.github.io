<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $cinsiyet = $_POST["cinsiyet"];
    $message = $_POST["message"];

    $to = "envercan4006@gmail.com";
    $subject = "New message from contact form";
    $body = "Name: $name\nSurname: $surname\nEmail: $email\nSubject: $subject\nCinsiyet: $cinsiyet\nMessage:\n$message";

    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
