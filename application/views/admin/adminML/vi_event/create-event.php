        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  

        <div class="row">
        
            <div class="col-lg-8">
            
            <!--<form action="">-->
            
                <?= form_open_multipart('adminML/formcreateEvent'); ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Turnamen</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="namaTurnamen">   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->  
                        <input type="hidden" class="form-control" name="idGame" value='2'>                                 
                        <input type="hidden" class="form-control" name="tanggalPosting">                               
                        <input type="hidden" class="form-control" name="is_active" value='1'> 
                        <input type="hidden" class="form-control" name="role_id" value='3'>                                
                        <input type="hidden" class="form-control" name="status_event" value='1'>                               
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Jenis Turnamen</label>
                    <div class="class col-sm-8">
                        <select name="jenisTurnamen">
                        <?= form_error('jenisTurnamen','<small class="text-danger pl-3">','</small>');?>
                            <option value="Online">Online</option>
                            <option value="Offline">Offline</option>
                        </select>                                                      
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Deskripsi Turnamen</label>
                    <div class="class col-sm-8">
                        <textarea cols="50" class="form-control" name="deskTurnamen"></textarea>    
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
                        <input type="date" class="form-control" name="batasPendaftaran">   
                        <?= form_error('batasPendaftaran','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Total Hadiah</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="totalHadiah">   
                        <?= form_error('totalHadiah','<small class="text-danger pl-3">','</small>');?>                            
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Tanggal TM</label>
                    <div class="class col-sm-8">
                        <input type="date" class="form-control" name="tanggalTM">   
                        <?= form_error('tanggalTM','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Tanggal Turnamen</label>
                    <div class="class col-sm-8">
                        <input type="date" class="form-control" name="tanggalTurnamen">   
                        <?= form_error('tanggalTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Tempat Turnamen</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="tempatTurnamen">   
                        <?= form_error('tempatTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">No. HP</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="noHP">   
                        <?= form_error('noHP','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3">Picture</label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-11">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="fotoTurnamen" name="fotoTurnamen">
                                    <?= form_error('fotoTurnamen','<small class="text-danger pl-3">','</small>');?>
                                    <label class="custom-file-label" for="fotoTurnamen">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-8">
                        <a href="<?= site_url('adminML/event') ?>" class="btn btn-primary" >Kembali</a>
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
