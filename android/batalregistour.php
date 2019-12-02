<?php  

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$idregis = $_POST['idregis'];

		$sql = "UPDATE tournament_regis SET is_active = '0' WHERE idRegis = '$idregis';";

		require_once('koneksi.php');

		if (mysqli_query($con,$sql)) {
			echo "Berhasil";
		}else{
			echo mysqli_error();
		}

		mysqli_close($con);
	}
?>


