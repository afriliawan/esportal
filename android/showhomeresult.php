<?php
	
	require_once 'koneksi.php';
	
	$sql = "SELECT tournament_result.idPemenang,tournament_result.idTurnamen,tournament_result.namaTurnamen,tournament_result.juaraPertama,tournament.fotoTurnamen,tournament.tanggalTurnamen,tournament.idGame from tournament_result join tournament on tournament_result.namaTurnamen = tournament.namaTurnamen order by tournament.idTurnamen DESC";

	$result = array();
	$r = mysqli_query($con,$sql);

	while ($row = mysqli_fetch_array($r)) {
		
		array_push($result, array(
				"idpemenang" => $row['idPemenang'],
				"idgame" => $row['idGame'],
				"idturnamen" => $row['idTurnamen'],
				"foto" => $row['fotoTurnamen'],
				"namatour" => $row['namaTurnamen'],
				"juara1" => $row['juaraPertama'],
				"tgltour" => $row['tanggalTurnamen']
				
			));

	}
	
	echo json_encode(array('result' => $result));
	mysqli_close($con);

?>