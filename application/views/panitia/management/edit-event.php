        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  

        <div class="row">
        
            <div class="col-lg-8">
            
            <!--<form action="">-->
            <?php if($dataeditEvent)
  	  {
        $id 			    = $dataeditEvent->idTurnamen;
        $id_turnamen 		= $dataeditEvent->idTurnamen;
        $nama_turnamen 		= $dataeditEvent->namaTurnamen;
        $id_game 		    = $dataeditEvent->idGame;
        $jenis_turnamen 	= $dataeditEvent->jenisTurnamen;
        $nama_panitia   	= $dataeditEvent->namaPanitia;
        $slot_max       	= $dataeditEvent->slotMax;
        $slot_terisi    	= $dataeditEvent->slotTerisi;
        $biaya_pendaftaran  = $dataeditEvent->biayaPendaftaran;
        $batas_pendaftaran  = $dataeditEvent->batasPendaftaran;
        $total_hadiah       = $dataeditEvent->totalHadiah;
        $tanggal_tm     	= $dataeditEvent->tanggalTM;
        $tanggal_turnamen   = $dataeditEvent->tanggalTurnamen;
        $tempat_turnamen    = $dataeditEvent->tempatTurnamen;
        $no_hp    	        = $dataeditEvent->noHP;
        $fotoTurnamen       = $dataeditEvent->fotoTurnamen;
}else{
        $id_turnamen 	    = "";
        $nama_turnamen 		= "";
        $id_game 		    = "";
        $jenis_turnamen 	= "";
        $nama_panitia       = "";
        $slot_max 	        = "";
        $slot_terisi 	    = "";
        $biaya_pendaftaran 	= "";
        $batas_pendaftaran 	= "";
        $total_hadiah    	= "";
        $tanggal_tm 	    = "";
        $tanggal_turnamen   = "";
        $tempat_turnamen 	= "";
        $no_hp 	            = "";
        $fotoTurnamen   	= "";
       }?>

                <?= form_open_multipart('management/formeditEvent/'.$id); ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Turnamen</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="namaTurnamen" value="<?= $nama_turnamen ?>" readonly>   
                        <input type="hidden" class="form-control" name="jenisTurnamen" value='Offline'>  
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Deskripsi Turnamen</label>
                    <div class="class col-sm-8">
                        <textarea class="form-control" name="deskTurnamen"></textarea>    
                        <?= form_error('deskTurnamen','<small class="text-danger pl-3">','</small>');?>                           
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Panitia</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="namaPanitia" value="<?= $nama_panitia ?>" readonly>    
                        <?= form_error('namaPanitia','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Slot Max</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="slotMax" value="<?= $slot_max ?>" readonly>   
                        <?= form_error('slotMax','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Biaya Pendaftaran</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="biayaPendaftaran" value="<?= $biaya_pendaftaran ?>" readonly>   
                        <?= form_error('biayaPendaftaran','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Batas Pendaftaran</label>
                    <div class="class col-sm-8">
                        <input type="date" class="form-control" name="batasPendaftaran" value="<?= $batas_pendaftaran ?>" readonly>   
                        <?= form_error('batasPendaftaran','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Total Hadiah</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="totalHadiah" value="<?= $total_hadiah ?>" readonly>   
                        <?= form_error('totalHadiah','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Tanggal TM</label>
                    <div class="class col-sm-8">
                        <input type="date" class="form-control" name="tanggalTM" value="<?= $tanggal_tm ?>" readonly>   
                        <?= form_error('tanggalTM','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Tanggal Turnamen</label>
                    <div class="class col-sm-8">
                        <input type="date" class="form-control" name="tanggalTurnamen" value="<?= $tanggal_turnamen ?>" readonly>   
                        <?= form_error('tanggalTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Tempat Turnamen</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="tempatTurnamen" value="<?= $tempat_turnamen ?>" readonly>   
                        
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">No. HP</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="noHP" value="<?= $no_hp ?>" readonly>   
                        
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-8">
                        <a href="<?= site_url('management/myevent') ?>" class="btn btn-primary" >Kembali</a>
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
