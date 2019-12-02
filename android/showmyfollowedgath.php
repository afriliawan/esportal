<?php
	
	require_once 'koneksi.php';
	

	$iduser = $_GET['iduser'];	
	$sql = "SELECT gathering_regis.id,gathering_regis.idGath,gathering.fotoGath,gathering.namaGath,gathering.deskGath,gathering.biaya,gathering.tglGath,gathering.tempatGath,user.name,user.nohp FROM gathering_regis join gathering join user on gathering_regis.idGath=gathering.id and gathering.idUser=user.id where gathering_regis.idUser='$iduser' order by gathering_regis.id desc" ;

	$result = array();
	$r = mysqli_query($con,$sql);

	while ($row = mysqli_fetch_array($r)) {
		
		array_push($result, array(
				"id" => $row['id'],
				"idgath" => $row['idGath'],
				"foto" => $row['fotoGath'],
				"namagath" => $row['namaGath'],
				"desk" => $row['deskGath'],
				"tglgath" => $row['tglGath'],
				"tempat" => $row['tempatGath'],
				"biaya" => $row['biaya'],
				"nick" => $row['name'],
				"nohp" => $row['nohp']
				
			));

	}
	
	echo json_encode(array('result' => $result));
	mysqli_close($con);


?> 