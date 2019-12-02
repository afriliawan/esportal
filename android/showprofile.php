<?php
	
	require_once 'koneksi.php';
	

	$id = $_GET['id'];	
	$query = mysqli_query($con,"SELECT * FROM user WHERE id= '$id'") ;


	$row = mysqli_fetch_assoc($query);		
	echo json_encode($row);	
	mysqli_close($con);
?>

