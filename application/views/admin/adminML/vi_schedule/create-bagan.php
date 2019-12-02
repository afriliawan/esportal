        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  

        <div class="row">
        
            <div class="col-lg-8">
            
            <!--<form action="">-->
            
                <?= form_open_multipart('adminML/insertChampion'); ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Turnamen</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="namaTurnamen">   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->  
                        <input type="hidden" class="form-control" name="idGame" value='2'>                                 
                        <input type="hidden" class="form-control" name="is_active" value='1'>
                        <input type="hidden" class="form-control" name="role_id" value='3'>                                 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Juara  Pertama</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="juaraPertama">   
                        <?= form_error('juaraPertama'); ?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Juara Kedua</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="juaraKedua">   
                        <?= form_error('juaraKedua'); ?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Juara Ketiga</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="juaraKetiga">   
                        <?= form_error('juaraKetiga'); ?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-8">
                        <a href="<?= site_url('adminML/champion') ?>" class="btn btn-primary" >Kembali</a>
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
