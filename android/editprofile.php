<?php
/* ===== www.dedykuncoro.com ===== */
	/* ========= KALAU PAKAI MYSQLI YANG ATAS SEMUA DI REMARK, TERUS YANG INI DI UNREMARK ======== */
	include_once "koneksi.php";

	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$password = $_POST['password'];
	$nohp = $_POST['nohp'];

	$encrypted_password = hash("sha256",$password);// encrypted 
	


	if ((empty($id))) {
		echo "Id  kosong";	
	}else {$querypw = mysqli_query($con, "SELECT * FROM user WHERE id='$id'");
	
			$row = mysqli_fetch_array($querypw);
			
			if (!empty($row)){
				$pw = $row['password'];

				if($encrypted_password==$pw){
				
					$query = mysqli_query($con, "UPDATE user SET name = '$nama',nohp='$nohp' WHERE id = '$id'");
				
					if ($query){
						echo "Edit Profile berhasil.";

					} else {
						echo "QueryError";
					}

				}else{
					echo "Password salah";
				}

				
			} else { 
				echo "mysql_error";
			}
		}


	mysqli_close($con);

?>