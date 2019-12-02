<?php
/* ===== www.dedykuncoro.com ===== */
	/* ========= KALAU PAKAI MYSQLI YANG ATAS SEMUA DI REMARK, TERUS YANG INI DI UNREMARK ======== */
	include_once "koneksi.php";

	$idtour = $_POST['idtour'];
	$namatour = $_POST['namatour'];
	$panitia = $_POST['panitia'];
	$idgame = $_POST['idgame'];
	$namatim = $_POST['namatim'];
	$usrketua = $_POST['usrketua'];
	$noketua = $_POST['noketua'];
	$ignketua = $_POST['ignketua'];
	$usrang1 = $_POST['usrang1'];
	$ignang1 = $_POST['ignang1'];
	$usrang2 = $_POST['usrang2'];
	$ignang2 = $_POST['ignang2'];
	$usrang3 = $_POST['usrang3'];
	$ignang3 = $_POST['ignang3'];
	$usrang4 = $_POST['usrang4'];
	$ignang4 = $_POST['ignang4'];
	$roleid = $_POST['roleid'];
	$date_created = date('y-m-d');

	// $queryusr = mysqli_query($con,"SELECT * FROM user WHERE role_id= '5'") ;

	// $rowusr = mysqli_fetch_array($querypw);
			
	// 		if (!empty($row)){
	// 			$usr = $rowusr['username'];

	
	if ((empty($idtour))) {
		echo "Id Tour kosong";	
	} else if ((empty($namatour))) {
		echo "Nama Turnamen tidak boleh kosong";
	}  else if ((empty($namatim))) {
		echo "Nama Tim tidak boleh kosong";
	}  else if ((empty($usrketua))) {
		echo "Username Ketua tidak boleh kosong";	
	} else if ((empty($noketua))) {
		echo "No hp Ketua tidak boleh kosong";
	} else if ((empty($ignketua))) {
		echo "IGN ketua tidak boleh kosong";
	} else if ((!empty($usrang1))) {
		$quser1 = mysqli_num_rows(mysqli_query($con,"SELECT * FROM user WHERE username='$usrang1' and role_id= '5'"));
		if ($quser1==1) {
			if ((empty($ignang1))) {
				echo "IGN Anggota 1 tidak boleh kosong";
			} else if ((!empty($usrang2))) {
				$quser2 = mysqli_num_rows(mysqli_query($con,"SELECT * FROM user WHERE username='$usrang2' and role_id= '5'"));
				if ($quser2==1) {
					if ((empty($ignang2))) {
						echo "IGN Anggota 2 tidak boleh kosong";
					} else if ((!empty($usrang3))) {
						$quser3 = mysqli_num_rows(mysqli_query($con,"SELECT * FROM user WHERE username='$usrang3' and role_id= '5'"));
						if ($quser3==1) {
							if ((empty($ignang3))) {
								echo "IGN Anggota 3 tidak boleh kosong";
							} else  if((!empty($usrang4))) {
								$quser4 = mysqli_num_rows(mysqli_query($con,"SELECT * FROM user WHERE username='$usrang4' and role_id= '5'"));
										if ($quser4==1) {
											if((empty($ignang4))) {
												echo "IGN Anggota 4 tidak boleh kosong";
											} else if((empty($roleid))) {
												echo "roleid tidak boleh kosong";
											} else {
												if (!empty($usrketua) && !empty($idtour) &&  $namatim == $namatim){
													$num_rows = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tournament_regis WHERE (usrKetua= '".$usrketua."'or usrAng1 ='".$usrketua."' or usrAng2 ='".$usrketua."' or usrAng3 ='".$usrketua."' or usrAng4 ='".$usrketua."') and namaTurnamen ='".$namatour."'and not is_active='0'"));
													if ($num_rows == 0){
														$query = mysqli_query($con, "INSERT INTO tournament_regis (idRegis,idTurnamen,idGame, namaTurnamen, namaTim, usrKetua, noKetua, ignKetua, usrAng1,ignAng1,usrAng2, ignAng2, usrAng3, ignAng3, usrAng4, ignAng4,role_id,is_active,date_created,namaPanitia ) 
															VALUES(0,'".$idtour."','".$idgame."','".$namatour."','".$namatim."','".$usrketua."','".$noketua."','".$ignketua."','".$usrang1."','".$ignang1."','".$usrang2."','".$ignang2."','".$usrang3."','".$ignang3."','".$usrang4."','".$ignang4."','".$roleid."','3','".$date_created."','".$panitia."')");
														
														if ($query){
															
															echo "Registrasi berhasil.";

														} else {
															echo "QueryError";
														}
													} else {

														echo "Username telah terdaftar";
														}
												}
											}
														
										}else{
											echo "Username 4 Tidak Terdaftar";
										}

								
							} else {
							  echo "Username Anggota 4 tidak boleh kosong";	
							}
							
						}else{
							echo "Username 3 Tidak Terdaftar";
						}
				
						
					}else{
						echo "Username 3 Tidak Boleh Kosong";	
					} 				

				}else{
					echo "Username 2 Tidak Terdaftar";
				}
			} else{
				echo "Username Anggota 2 tidak Boleh Kosong";
			}
		} else{
			echo "Username 1 Tidak Terdaftar";
		}
	} else{
		echo "Username Anggota 1 tidak boleh kosong";
	}

	 

	mysqli_close($con);

?>