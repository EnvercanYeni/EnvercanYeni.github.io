<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gönderilen verileri alın
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $cinsiyet = $_POST['cinsiyet'];

    // Mail gönderme işlemini başlat
    $mail = new PHPMailer(true);

    try {
        //SMTP bağlantısı ayarla
        $mail->isSMTP();
        $mail->Host = 'mail.gmail.com'; // SMTP sunucusu adresi
        $mail->SMTPAuth = true;
        $mail->Username = 'yenitv4006@gmail.com'; // SMTP sunucusuna bağlanırken kullanılacak mail adresi
        $mail->Password = 'Envercan4006'; // SMTP sunucusuna bağlanırken kullanılacak mail adresinin şifresi
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Alıcı, gönderici ve konu bilgilerini ayarla
        $mail->setFrom('yenitv4006@gmail.com', 'My Website');
        $mail->addAddress('yenitv4006@gmail.com');
        $mail->addReplyTo($email, $name.' '.$surname);
        $mail->isHTML(true);
        $mail->Subject = $subject;

        // Mailin içeriğini ayarla
        $mail->Body = "<p><b>Ad:</b> $name</p><p><b>Soyad:</b> $surname</p><p><b>Cinsiyet:</b> $cinsiyet</p><p><b>Email:</b> $email</p><p><b>Konu:</b> $subject</p><p><b>Mesaj:</b> $message</p>";

        // Maili gönder
        $mail->send();
        $response = ['status' => 'success', 'message' => 'Mesajınız başarıyla gönderildi.'];
    } catch (Exception $e) {
        $response = ['status' => 'error', 'message' => 'Mesajınız gönderilirken bir hata oluştu. Lütfen daha sonra tekrar deneyin. Hata mesajı: '.$mail->ErrorInfo];
    }

    // JSON formatında cevap döndür
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>
<script>
$(document).ready(function(){
  // Form submit edildiğinde çalışacak kod
  $('.contactform').submit(function(event){
    event.preventDefault(); // Sayfanın yenilenmesini önle
    var formdata = $(this).serialize(); // Form verilerini al
    $.ajax({
      type: 'POST',
      url: 'form.php,
data: formdata, // Gönderilecek veriler
dataType: 'json', // Gelen verinin tipi
success: function(response){
// Başarılı bir şekilde cevap geldiğinde yapılacak işlemler
if(response.status == 'success'){
$('.success-message').text(response.message);
$('.error-message').text('');
$('.contactform')[0].reset(); // Formu temizle
}
// Hata mesajı geldiğinde yapılacak işlemler
else if(response.status == 'error'){
$('.error-message').text(response.message);
$('.success-message').text('');
}
}
});
});
});
</script>
