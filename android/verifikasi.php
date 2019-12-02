<?php
include 'koneksi.php';
$email = $_GET['email'];
$query = mysqli_query($con, "UPDATE user SET is_active=1 where email='$email'");

if ($query === TRUE) {
	echo "verifikasi Akun Berhasil";
}

?>