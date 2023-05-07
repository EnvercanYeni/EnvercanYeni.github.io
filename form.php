<?php

// Veritabanı bilgilerini ayarla
$host = "localhost";
$username = "root";
$password = "";
$database = "portfolyo";

// Veritabanına bağlan
$conn = mysqli_connect($host, $username, $password, $database);

// Hata kontrolü yap
if (!$conn) {
    die("Veritabanı bağlantı hatası: " . mysqli_connect_error());
}

// Form verilerini al
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$cinsiyet = $_POST['cinsiyet'];
$message = $_POST['message'];

// SQL sorgusu oluştur
$sql = "INSERT INTO mesaj (ad, soyad, email, konu, cinsiyet, mesaj) VALUES ('$name', '$surname', '$email', '$subject', '$cinsiyet', '$message')";

// Sorguyu çalıştır ve sonucu kontrol et
if (mysqli_query($conn, $sql)) {
    echo "Mesajınız başarıyla gönderildi!";
} else {
    echo "Hata: " . $sql . "<br>" . mysqli_error($conn);
}

// Veritabanı bağlantısını kapat
mysqli_close($conn);

?>
