        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  

        <div class="row">
        
            <div class="col-lg-8">
            
            <!--<form action="">-->
            <?php if($datateamEdit)
  	  {
  	  		$id 			= $datateamEdit->idRegis;
  	  		$id_regis 		= $datateamEdit->idRegis;
            $nama_turnamen  = $datateamEdit->namaTurnamen;
            $nama_tim 	    = $datateamEdit->namaTim;
            $user_ketua     = $datateamEdit->usrKetua;
  	  		$no_ketua 		= $datateamEdit->noKetua;
  	  		$ign_ketua 	    = $datateamEdit->ignKetua;
  	  		$ign_ang1 	    = $datateamEdit->ignAng1;
  	  		$ign_ang2 	    = $datateamEdit->ignAng2;
  	  		$ign_ang3 	    = $datateamEdit->ignAng3;
  	  		$ign_ang4 	    = $datateamEdit->ignAng4;
  	  }else{
  	  		$id_regis 	    = "";
            $nama_tim 	    = "";
            $nama_turnamen  = "";
            $user_ketua     = "";
  	  		$no_ketua		= "";
            $ign_ketua   	= "";
            $ign_ang1       = "";
            $ign_ang2       = "";
            $ign_ang3       = "";
            $ign_ang4       = "";
            $foto_struk     = "";
  	  	   }?>

                <?= form_open_multipart('adminPUBG/formeditTeam/'.$id); ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Turnamen</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="namaTurnamen" value="<?= $nama_turnamen ?>" readonly>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Tim</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="namaTim" value="<?= $nama_tim ?>">   
                        <?= form_error('namaTim','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Username Ketua</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="usrKetua" value="<?= $user_ketua ?>">    
                        <?= form_error('usrKetua','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">No HP Ketua</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="noKetua" value="<?= $no_ketua ?>">
                        <?= form_error('noKetua','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nickname Ketua</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="ignKetua" value="<?= $ign_ketua ?>">   
                        <?= form_error('ignKetua','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nickname Anggota 1</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="ignAng1" value="<?= $ign_ang1 ?>">   
                        <?= form_error('ignAng1','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nickname Anggota 2 </label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="ignAng2" value="<?= $ign_ang2 ?>">   
                        <?= form_error('ignAng2','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nickname Anggota 3</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="ignAng3" value="<?= $ign_ang3 ?>">   
                        <?= form_error('ignAng3','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nickname Anggota 4</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="ignAng4" value="<?= $ign_ang4 ?>">   
                        <?= form_error('ignAng4','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-8">
                        <a href="<?= site_url('adminPUBG/teamdata') ?>" class="btn btn-primary" >Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>

            </form>
            
            </div>
        
        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
