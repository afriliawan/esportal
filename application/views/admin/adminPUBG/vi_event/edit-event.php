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
        $jenis_turnamen 	= $dataeditEvent->jenisTurnamen;
        $desk_turnamen   	= $dataeditEvent->deskTurnamen;
        $nama_panitia   	= $dataeditEvent->namaPanitia;
        $slot_max       	= $dataeditEvent->slotMax;
        $biaya_pendaftaran  = $dataeditEvent->biayaPendaftaran;
        $batas_pendaftaran  = $dataeditEvent->batasPendaftaran;
        $total_hadiah       = $dataeditEvent->totalHadiah;
        $tanggal_tm     	= $dataeditEvent->tanggalTM;
        $tanggal_turnamen   = $dataeditEvent->tanggalTurnamen;
        $tempat_turnamen    = $dataeditEvent->tempatTurnamen;
        $no_hp    	        = $dataeditEvent->noHP;
        $tanggal_posting    = $dataeditEvent->tanggalPosting;
}else{
        $id_turnamen 	    = "";
        $nama_turnamen 		= "";
        $jenis_turnamen 	= "";
        $desk_turnamen      = "";
        $nama_panitia       = "";
        $slot_max 	        = "";
        $biaya_pendaftaran 	= "";
        $batas_pendaftaran 	= "";
        $total_hadiah 	= "";
        $tanggal_tm 	    = "";
        $tanggal_turnamen   = "";
        $tempat_turnamen 	= "";
        $no_hp 	            = "";
        $tanggal_posting 	= "";
       }?>

                <?= form_open_multipart('adminPUBG/formeditEvent/'.$id); ?>
                <div class="row">
                    <div class="col-lg-8">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Turnamen</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="namaTurnamen" value="<?= $nama_turnamen ?>">
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>   
                        <!--BELUM DI SETTING-->                              
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Jenis Turnamen</label>
                    <div class="class col-sm-8">
                        <select name="jenisTurnamen">
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                        </select>                                                      
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Deskripsi Turnamen</label>
                    <div class="class col-sm-8">
                        <textarea cols="50" class="form-control" name="deskTurnamen" value="<?= $desk_turnamen ?>"></textarea>                         
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Panitia</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="namaPanitia" value="<?= $nama_panitia ?>" readonly>                                 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Slot Max</label>
                    <div class="class col-sm-8">
                        <select name="slotMax">
                        <?= form_error('slotMax','<small class="text-danger pl-3">','</small>');?>
                            <option value="8">8 Slot</option>
                            <option value="16">16 Slot</option>
                        </select>                                                      
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Biaya Pendaftaran</label>
                    <?= form_error('biayaPendaftaran','<small class="text-danger pl-3">','</small>');?>
                    <div class="class col-sm-8">
                        <select name="biayaPendaftaran">
                        <?= form_error('biayaPendaftaran','<small class="text-danger pl-3">','</small>');?>
                            <option value="10000">Rp. 10.000</option>
                            <option value="20000">Rp. 20.000</option>
                            <option value="30000">Rp. 30.000</option>
                            <option value="40000">Rp. 40.000</option>
                            <option value="50000">Rp. 50.000</option>
                        </select>                                                      
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Batas Pendaftaran</label>
                    <div class="class col-sm-8">
                        <input type="date" class="form-control" name="batasPendaftaran" value="<?= $batas_pendaftaran ?>">   
                        <?= form_error('batasPendaftaran','<small class="text-danger pl-3">','</small>');?>                            
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Total Hadiah</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="totalHadiah" value="<?= $total_hadiah ?>">   
                        <?= form_error('totalHadiah','<small class="text-danger pl-3">','</small>');?>                            
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Tanggal TM</label>
                    <div class="class col-sm-8">
                        <input type="date" class="form-control" name="tanggalTM" value="<?= $tanggal_tm ?>">  
                    <?= form_error('tanggalTM','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Tanggal Turnamen</label>
                    <div class="class col-sm-8">
                        <input type="date" class="form-control" name="tanggalTurnamen" value="<?= $tanggal_turnamen ?>">   
                        <?= form_error('tanggalTM','<small class="text-danger pl-3">','</small>');?>                                
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Tempat Turnamen</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="tempatTurnamen" value="<?= $tempat_turnamen ?>">  
                    <?= form_error('tempatTurnamen','<small class="text-danger pl-3">','</small>');?>           
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">No. HP</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="noHP" value="<?= $no_hp ?>"> 
                    <?= form_error('noHP','<small class="text-danger pl-3">','</small>');?>                          
                    </div>
                </div>
                
                <div class="form-group row justify-content-end">
                    <div class="col-sm-8">
                        <a href="<?= site_url('adminPUBG/event') ?>" class="btn btn-primary" >Kembali</a>
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
