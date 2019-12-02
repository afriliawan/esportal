<?php
	
	require_once 'koneksi.php';
	

	$username = $_GET['username'];	
	$sql = "SELECT tournament.fotoTurnamen,tournament.idTurnamen, tournament.jenisTurnamen,tournament.tanggalTurnamen, tournament.batasPendaftaran, tournament.tanggalTM,  tournament.namaTurnamen, tournament.biayaPendaftaran, tournament_regis.idRegis, tournament_regis.is_active, tournament_regis.namaTim, tournament_regis.usrKetua, tournament_regis.usrAng1, tournament_regis.usrAng2, tournament_regis.usrAng3, tournament_regis.usrAng4, tournament_regis.ignKetua, tournament_regis.ignAng1, tournament_regis.ignAng2, tournament_regis.ignAng3, tournament_regis.ignAng4, tournament_regis.accAng1, tournament_regis.accAng2, tournament_regis.accAng3, tournament_regis.accAng4 FROM tournament JOIN tournament_regis on tournament_regis.idTurnamen=tournament.idTurnamen WHERE (tournament_regis.usrAng1 ='$username' or tournament_regis.usrAng2 ='$username' or tournament_regis.usrAng3 ='$username' or tournament_regis.usrAng4 ='$username')AND (tournament_regis.is_active='2' OR tournament_regis.is_active='3')order by tournament_regis.idRegis desc" ;

	$result = array();
	$r = mysqli_query($con,$sql);

	while ($row = mysqli_fetch_array($r)) {
		
		array_push($result, array(
				"id" => $row['idRegis'],
				"idtour" => $row['idTurnamen'],
				"status" => $row['is_active'],
				"foto" => $row['fotoTurnamen'],
				"namatour" => $row['namaTurnamen'],
				"jenis" => $row['jenisTurnamen'],
				"tgldaftar" => $row['batasPendaftaran'],
				"tgltour" => $row['tanggalTurnamen'],
				"tgltm" => $row['tanggalTM'],
				"biaya" => $row['biayaPendaftaran'],
				"namatim" => $row['namaTim'],
				"usrketua" => $row['usrKetua'],
				"usrang1" => $row['usrAng1'],
				"usrang2" => $row['usrAng2'],
				"usrang3" => $row['usrAng3'],
				"usrang4" => $row['usrAng4'],
				"ignketua" => $row['ignKetua'],
				"ignang1" => $row['ignAng1'],
				"ignang2" => $row['ignAng2'],
				"ignang3" => $row['ignAng3'],
				"ignang4" => $row['ignAng4'],
				"accang1" => $row['accAng1'],
				"accang2" => $row['accAng2'],
				"accang3" => $row['accAng3'],
				"accang4" => $row['accAng4']
				
			));

	}
	
	echo json_encode(array('result' => $result));
	mysqli_close($con);


?> 