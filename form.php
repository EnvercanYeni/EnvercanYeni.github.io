<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $cinsiyet = $_POST["cinsiyet"];

    // E-posta gövdesi oluştur
    $email_body = "Ad: $name\n"
                . "Soyad: $surname\n"
                . "E-posta: $email\n"
                . "Konu: $subject\n"
                . "Cinsiyet: $cinsiyet\n\n"
                . "Mesaj:\n$message";

    // E-posta gönderme işlemi
    mail("envercan4006@gmail.com", "Form Mesajı", $email_body);

    // Başarılı mesajı göster
    echo "Mesajınız başarıyla gönderildi.";
}
?>
