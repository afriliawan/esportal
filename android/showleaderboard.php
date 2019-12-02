<?php
	
	require_once 'koneksi.php';
	

	$sql = "SELECT name,userPoint FROM user WHERE role_id= '5' and is_active='1' order by userPoint desc limit 20" ;

	$result = array();
	$r = mysqli_query($con,$sql);
	$no=1;
	while ($row = mysqli_fetch_array($r)) {
		
		array_push($result, array(
				"rank" => $no++,
				"nama" => $row['name'],
				"point" => $row['userPoint']
				
			));

	}
	
	echo json_encode(array('result' => $result));
	mysqli_close($con);


?> 