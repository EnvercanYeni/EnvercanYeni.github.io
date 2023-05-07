<?php

// Veritabanı bağlantı bilgileri
$host = "localhost";
$dbname = "portfolyo";
$username = "root";
$password = "";

// PDO kullanarak veritabanı bağlantısı kurma
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Veritabanı bağlantısı başarısız: " . $e->getMessage());
}

// Form verilerini alma
$isim = $_POST["name"];
$soyisim = $_POST["surname"];
$mail = $_POST["mail"];
$cinsiyet = $_POST["cinsiyet"];
$konu = $_POST["subject"];
$mesaj = $_POST["message"];

// SQL sorgusunu hazırlama
$stmt = $pdo->prepare("INSERT INTO mesaj (isim, soyisim, mail, cinsiyet, konu, mesaj) VALUES (:isim, :soyisim, :mail, :cinsiyet, :konu, :mesaj)");

// Parametreleri bağlama ve sorguyu çalıştırma
$stmt->bindParam(":isim", $isim);
$stmt->bindParam(":soyisim", $soyisim);
$stmt->bindParam(":mail", $mail);
$stmt->bindParam(":cinsiyet", $cinsiyet);
$stmt->bindParam(":konu", $konu);
$stmt->bindParam(":mesaj", $mesaj);

if ($stmt->execute()) {
    echo "Mesaj veritabanına eklendi.";
} else {
    echo "Mesaj veritabanına eklenirken hata oluştu.";
}

// Veritabanı bağlantısını kapatma
$pdo = null;

?>
