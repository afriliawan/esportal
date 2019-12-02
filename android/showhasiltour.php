<?php
	
	require_once 'koneksi.php';
	

	$idtour = $_GET['id'];	
	$query = mysqli_query($con,"SELECT * FROM tournament_result WHERE idTurnamen= '$idtour'") ;


	$row = mysqli_fetch_assoc($query);		
	echo json_encode($row);	
	mysqli_close($con);
?>

