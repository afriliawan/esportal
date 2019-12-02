<?php
	
	require_once 'koneksi.php';
	
	$sql = "SELECT gathering.id,gathering.fotoGath,gathering.namaGath,gathering.deskGath,gathering.biaya,gathering.idUser,gathering.tglGath,gathering.tempatGath,user.name,user.nohp from  gathering join user on gathering.iduser=user.id where gathering.is_active='1' order by gathering.id desc";

	$result = array();
	$r = mysqli_query($con,$sql);

	while ($row = mysqli_fetch_array($r)) {
		
		array_push($result, array(
				"id" => $row['id'],
				"foto" => $row['fotoGath'],
				"nama" => $row['namaGath'],
				"desk" => $row['deskGath'],
				"iduser" => $row['idUser'],
				"namauser" => $row['name'],
				"biaya" => $row['biaya'],
				"tglgath" => $row['tglGath'],
				"tempat" => $row['tempatGath'],
				"nohp" => $row['nohp']
				
			));

	}
	
	echo json_encode(array('result' => $result));
	mysqli_close($con);

?>