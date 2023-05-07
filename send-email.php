<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $cinsiyet = $_POST["cinsiyet"];

    $to = "envercan4006@gmail.com";
    $subject = "Yeni Bir Mesajınız Var: $subject";
    $body = "Ad: $name\nSoyad: $surname\nE-posta: $email\nCinsiyet: $cinsiyet\n\nMesaj:\n$message";

    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
