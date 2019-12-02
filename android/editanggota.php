<?php
	include_once "koneksi.php";

	class usr{}

	$usrang1 = $_POST['usrang1'];
	$ignang1 = $_POST['ignang1'];
	$usrang2 = $_POST['usrang2'];
	$ignang2 = $_POST['ignang2'];
	$usrang3 = $_POST['usrang3'];
	$ignang3 = $_POST['ignang3'];
	$usrang4 = $_POST['usrang4'];
	$ignang4 = $_POST['ignang4'];
	$idregis = $_POST['idregis'];

			$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE username='".$username."'"));

			if ($num_rows == 0){
				$query = mysqli_query($con, "UPDATE tournament_regis SET usrAng4='$foto',is_active='2' where idRegis='$idregis'");

				if ($query){
					$response = new usr();
					$response->success = 1;
					$response->message = "Register berhasil, silahkan login.";
					die(json_encode($response));

				} else {
					$response = new usr();
					$response->success = 0;
					$response->message = "Username sudah ada";
					die(json_encode($response));
				}
			} else {
				$response = new usr();
				$response->success = 0;
				$response->message = "Username sudah ada";
				die(json_encode($response));
			}
		

	mysqli_close($con);

?>	