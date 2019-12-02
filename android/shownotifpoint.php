<?php
	
	require_once 'koneksi.php';
	
	$iduser = $_GET['iduser'];	

	$sql = "SELECT * FROM reward_history WHERE id= '$iduser' order by idPoint desc limit 10" ;

	$result = array();
	$r = mysqli_query($con,$sql);
	$no=1;
	while ($row = mysqli_fetch_array($r)) {
		
		array_push($result, array(
				"tglupdate" => $row['tanggalUpdate'],
				"point" => $row['reward']
				
			));

	}
	
	echo json_encode(array('result' => $result));
	mysqli_close($con);


?> 