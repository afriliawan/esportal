<?php
	
	require_once 'koneksi.php';
	
	$sql = "SELECT * FROM tournament where is_active='1'order by idTurnamen desc";

	$result = array();
	$r = mysqli_query($con,$sql);

	while ($row = mysqli_fetch_array($r)) {
		
		array_push($result, array(
				"id" => $row['idTurnamen'],
				"status" => $row['status_event'],
				"foto" => $row['fotoTurnamen'],
				"nama" => $row['namaTurnamen'],
				"desk" => $row['deskTurnamen'],
				"jenis" => $row['jenisTurnamen'],
				"smax" => $row['slotMax'],
				"sisi" => $row['slotTerisi'],
				"idgame" => $row['idGame'],
				"panitia" => $row['namaPanitia'],
				"biaya" => $row['biayaPendaftaran'],
				"hadiah" => $row['totalHadiah'],
				"tgldaftar" => $row['batasPendaftaran'],
				"tgltm" => $row['tanggalTM'],
				"tgltour" => $row['tanggalTurnamen'],
				"tglpost" => $row['tanggalPosting'],
				"tempat" => $row['tempatTurnamen'],
				"nohp" => $row['noHP'],
				"roleid" => $row['role_id']
				
			));

	}
	
	echo json_encode(array('result' => $result));
	mysqli_close($con);

?>