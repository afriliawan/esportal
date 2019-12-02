        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  
        
        <div class="row">
                    <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
            <div class="col-lg-8">
            
            <!--<form action="">-->
            
                <?= form_open_multipart('management/formcreateEvent'); ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Turnamen</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="namaTurnamen">   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->  
                        <input type="hidden" class="form-control" name="is_active" value='2'>                                 
                        <input type="hidden" class="form-control" name="role_id" value='4'>                                 
                        <input type="hidden" class="form-control" name="status_event" value='1'>                            
                        <input type="hidden" class="form-control" name="jenisTurnamen" value='Offline'>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Game</label>
                    <div class="class col-sm-8">
                        <select name="idGame">
                            <option value="1">PUBG</option>
                            <option value="2">Mobile Legend</option>
                        </select>                                                      
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
                        <input type="text" class="form-control" name="namaPanitia" value="<?= $user['name']; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Slot Max</label>
                    <div class="class col-sm-8">
                        <select name="slotMax">
                        <?= form_error('slotMax','<small class="text-danger pl-3">','</small>');?>
                            <option value="8">8 Slot (ML)</option>
                            <option value="16">16 Slot (ML)</option>
                            <option value="16">25 Slot (PUBG)</option>
                            <option value="16">50 Slot (PUBG)</option>
                        </select>                                                      
                    </div>
                </div>
                <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Biaya Pendaftaran</label>
                <div class="class col-sm-8">
                    <div class="dropdown">
                        <select button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="biayaPendaftaran">
                                <div class="controls">
                                    <?php                                
                                        foreach ($biaya_pendaftaran as $row) {  
                                        echo "<option value='".$row->biayaPendaftaran."'> Rp. ".$row->biayaPendaftaran."</option>";
                                        }
                                        echo"
                                        </select>"
                                    ?>
                                </div>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Batas Pendaftaran</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" id="datepicker" name="batasPendaftaran">   
                        <?= form_error('batasPendaftaran','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Total Hadiah</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="totalHadiah">   
                        <?= form_error('totalHadiah','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Tanggal TM</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" id="datepicker2" name="tanggalTM">   
                        <?= form_error('tanggalTM','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Tanggal Turnamen</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" id="datepicker3" name="tanggalTurnamen">   
                        <?= form_error('tanggalTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Tempat Turnamen</label>
                <div class="class col-sm-8">
                    <div class="dropdown">
                        <select button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="tempatTurnamen">
                                <div class="controls">
                                    <?php                                
                                        foreach ($lokasi_turnamen as $row) {  
                                        echo "<option value='".$row->namaTempat."'>".$row->namaTempat."</option>";
                                        }
                                        echo"
                                        </select>"
                                    ?>
                                </div>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">No. HP</label>
                    <div class="class col-sm-8">
                        <input type="number" class="form-control" id="max_nohp" name="noHP" min="12" max"13">   
                        <?= form_error('noHP','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3">Picture</label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-11">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="image/*" id="fotoTurnamen" name="fotoTurnamen">
                                    <?= form_error('fotoTurnamen','<small class="text-danger pl-3">','</small>');?>
                                    <label class="custom-file-label" for="fotoTurnamen">Choose file</label>
                                </div>
                            </div>
                        </div>
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


