<?php
/* ===== www.dedykuncoro.com ===== */
	/* ========= KALAU PAKAI MYSQLI YANG ATAS SEMUA DI REMARK, TERUS YANG INI DI UNREMARK ======== */
	include_once "koneksi.php";

	$id = $_POST['id'];
	$password = $_POST['password'];
	$newpass = $_POST['newpass'];
	$confnewpass = $_POST['confnewpass'];


	$encrypted_password = hash("sha256",$password);// encrypted 
	$encrypted_newpassword = hash("sha256",$newpass);// encrypted 
	


	if ((empty($password))) {
		echo "Masukkan Password";	
	}else if ((empty($newpass))) {
		echo "Masukkan Password Baru";	
	}else if ((empty($confnewpass))) {
		echo "Masukkan confirm Password Baru";	
	}else {if ($newpass==$confnewpass) {

				$querypw = mysqli_query($con, "SELECT * FROM user WHERE id='$id'");
	
				$row = mysqli_fetch_array($querypw);
				
				if (!empty($row)){
					$pw = $row['password'];

					if($encrypted_password==$pw){
					
						$query = mysqli_query($con, "UPDATE user SET password='$encrypted_newpassword' WHERE id = '$id'");
					
						if ($query){
							echo "Password berhasil diganti";

						} else {
							echo "QueryError";
						}

					}else{
						echo "Password salah";
					}

					
				} else { 
					echo "Password salah";
				}
			}else { 
					echo "Confirm Password tidak sama";
				}
		}


	mysqli_close($con);

?>