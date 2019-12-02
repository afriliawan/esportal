<?php 

require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'ahmadzakyammardany7@gmail.com';
$mail->Password = '@@@AAA000DANY';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('varif@evcamp.com', 'Evcamp');
$mail->addReplyTo('verif@evcamp.com', 'Evcamp');

// Menambahkan penerima
$mail->addAddress('ahmadzakyammardany7@gmail.com');

// Subjek email
$mail->Subject = 'Verifikasi Akun Evcamp';

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = "<h1>Verifikasi Akun</h1>
<p>Untuk verifikasi akun silhkan klik link di bawah</p><br/>
<a href='https://192.168.43.95/afr-login/android/verifikasi.php?email=".$email."'>verifikasi</a>";


$mail->Body = $mailContent;

// Kirim email
if(!$mail->send()){
	echo 'Pesan tidak dapat dikirim.';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
	echo 'Pesan telah terkirim';
}

?>