<?php
	/* ===== www.dedykuncoro.com ===== */

	// =================== KALAU PAKAI MYSQLI YANG ATAS SEMUA DI REMARK, TERUS YANG INI RI UNREMARK ========
	include_once "koneksi.php";

	class usr{}
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	$encrypted_password = hash("sha256",$password);// encrypted 
	
	
	if ((empty($username)) || (empty($password))) { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Kolom tidak boleh kosong"; 
		die(json_encode($response));
	}
	
	$query = mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password='$encrypted_password' and is_active='1'");
	
	$row = mysqli_fetch_array($query);
	
	if (!empty($row)){
		$response = new usr();
		$response->success = 1;
		$response->message = "Selamat datang ".$row['username'];
		$response->id = $row['id'];
		$response->username = $row['username'];
		$response->name = $row['name'];
		$response->email = $row['email'];
		$response->nohp = $row['nohp'];
		$response->point = $row['userPoint'];
		$response->password = $row['password'];
		
		die(json_encode($response));
		
	} else { 
		$response = new usr();
		$response->success = 0;
		$response->message = "Username atau password salah";
		die(json_encode($response));
	}
	
	mysqli_close($con);

?>