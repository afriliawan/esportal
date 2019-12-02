<?php
	include_once "koneksi.php";
	
	class emp{}
	
	$image = $_POST['image'];
	$idregis = $_GET['idregis'];

	
	if (empty($image)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Masukkan foto struk terlebih dahulu."; 
		die(json_encode($response));
	} else {

		$random = random_word(20);
		
		$path = "images/struk/".$random.".png";


		$foto = "".$random.".png";
		
		// sesuiakan ip address laptop/pc atau URL server
		$actualpath = "http://192.168.43.95/afr-login/android/$path";
		
		$query = mysqli_query($con, "UPDATE tournament_regis SET fotoStruk='$foto',is_active='2' where idRegis='$idregis' ");
		
		if ($query){
			file_put_contents($path,base64_decode($image));
			
			$response = new emp();
			$response->success = 1;
			$response->message = "Successfully Uploaded";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error Upload image";
			die(json_encode($response)); 
		}
	}	
	
	// fungsi random string pada gambar untuk menghindari nama file yang sama
	function random_word($id = 20){
		$pool = '1234567890abcdefghijkmnpqrstuvwxyz';
		
		$word = '';
		for ($i = 0; $i < $id; $i++){
			$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
		}
		return $word; 
	}

	mysqli_close($con);
	
?>	