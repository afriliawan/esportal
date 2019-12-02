<?php
/* ===== www.dedykuncoro.com ===== */
	/* ========= KALAU PAKAI MYSQLI YANG ATAS SEMUA DI REMARK, TERUS YANG INI DI UNREMARK ======== */
	include_once "koneksi.php";


	$username = $_POST["username"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];
	$nama = $_POST["nama"];	
	$email = $_POST["email"];
	$nohp = $_POST["nohp"];

	$encrypted_password = hash("sha256",$password);// encrypted 
	
	
	if ((empty($username))) {
		echo "Username tidak boleh kosong";
		// die(json_encode($response));
	} else if ((empty($password))) {
		echo "Password tidak boleh kosong";
		// die(json_encode($response));
	} else if ((empty($confirm_password)) || $password != $confirm_password) {
		echo "Konfirmasi password tidak sama";
		// die(json_encode($response));
	} else if ((empty($nama))) {
		echo "Nama tidak boleh kosong";
		// die(json_encode($response));
	} else if ((empty($email))) {
		echo "Email tidak boleh kosong";
		// die(json_encode($response));
	} else if ((empty($nohp))) {
		echo "Nomor Hp tidak boleh kosong";
		// die(json_encode($response));
	}else {
		if (!empty($username) && !empty($email) && $password == $confirm_password){
			$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM user WHERE username='".$username."' or email='".$email."'"));

			if ($num_rows == 0){
				// $query = mysqli_query($con, "INSERT INTO user (id, username, password, name, email, nohp, role_id) VALUES(0,'".$username."','".$encrypted_password."','".$nama."','".$email."','".$nohp."','5')");

				// if ($query){

				require 'PHPMailer/PHPMailerAutoload.php';
				$mail = new PHPMailer;

// Konfigurasi SMTP
				$mail->isSMTP();
				$mail->Host = 'smtp.gmail.com';
				$mail->SMTPAuth = true;
				$mail->Username = 'noreply.esport@gmail.com';
				$mail->Password = 'smagawi333';
				$mail->SMTPSecure = 'ssl';
				$mail->Port = 465;

				$mail->setFrom('verif@esport.com', 'Esportal');
				$mail->addReplyTo('verif@esport.com', 'Esportal');

// Menambahkan penerima
				$mail->addAddress($email);

// Subjek email
				$mail->Subject = 'Verifikasi Akun Esportal';

// Mengatur format email ke HTML
				$mail->isHTML(true);

// Konten/isi email
				$mailContent = "<h1>Verifikasi Akun</h1>
				<p>Untuk verifikasi akun silhkan klik link di bawah</p><br/>
				<a href='http://192.168.43.42/afr-login/android/verifikasi.php?email=".$email."'>verifikasi</a>";


				$mail->Body = $mailContent;

// Kirim email
				if(!$mail->send()){
							echo 'Masukkan email dengan benar.';
							// echo 'Mailer Error: ' . $mail->ErrorInfo;
				}else{

				$query = mysqli_query($con, "INSERT INTO user (id, username, password, name, email, nohp, role_id) VALUES(0,'".$username."','".$encrypted_password."','".$nama."','".$email."','".$nohp."','5')");

				if ($query){

					echo "Register berhasil, silahkan verifikasi.";
					}

				}
				
				// die(json_encode($response));
				

				} else {
					echo "query error";
					// die(json_encode($response));
				}
			} else {

				echo "Username atau email sudah terdaftar";
				// die(json_encode($response));
			}
		
	}

	mysqli_close($con);

?>	