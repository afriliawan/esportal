<?php
/* ===== www.dedykuncoro.com ===== */
	/* ========= KALAU PAKAI MYSQLI YANG ATAS SEMUA DI REMARK, TERUS YANG INI DI UNREMARK ======== */
	include_once "koneksi.php";

	$iduser = $_POST['iduser'];
	$idgath = $_POST['idgath'];
	$tglsimpan = date('y-m-d');

	if ((empty($iduser))) {
		echo "Id user kosong";	
	} else if ((empty($idgath))) {
		echo "Id gath tidak boleh kosong";
	}  else {if (!empty($iduser) && !empty($idgath)){
			$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM gathering_regis WHERE idUser='".$iduser."' and idGath ='".$idgath."'and not is_active='3'"));
			if ($num_rows == 0){
				$query = mysqli_query($con, "INSERT INTO gathering_regis (id,idGath,idUser,is_active,tglSimpan ) 
					VALUES(0,'".$idgath."','".$iduser."','1','".$tglsimpan."')");
				
				if ($query){
					echo "Follow Berhasil.";

				} else {
					echo "QueryError";
				}
			} else {
				echo "Event telah tersimpan";
				}
		}
	}

	mysqli_close($con);

?>