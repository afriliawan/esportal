        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  
        <div class="row">
        
            <div class="col-lg-8">
            <?php if($databaganEdit)
  	  {
        $id 			    = $databaganEdit->idBagan;
        $id_bagan     		= $databaganEdit->idBagan;
        $hasil_1 		    = $databaganEdit->hasil1;
        $hasil_2 		    = $databaganEdit->hasil2;
        $hasil_3 		    = $databaganEdit->hasil3;
        $hasil_4 		    = $databaganEdit->hasil4;
        $hasil_5 		    = $databaganEdit->hasil5;
        $hasil_6 		    = $databaganEdit->hasil6;
        $hasil_7 		    = $databaganEdit->hasil7;
}else{
        $id_bagan 	        = "";
        $hasil_1  		    = "";
        $hasil_2  		    = "";
        $hasil_3  		    = "";
        $hasil_4  		    = "";
        $hasil_5  		    = "";
        $hasil_6  		    = "";
        $hasil_7  		    = "";
       }?>
            <!--<form action="">-->
            <?= form_open_multipart('adminPUBG/updatesemiFinal/'.$id); ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">1.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil1" value='<?= $hasil_1 ?>' readonly>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; VS</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil2" value='<?= $hasil_2 ?>' readonly>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; =</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil5" value='<?= $hasil_5 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">2.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil3" value='<?= $hasil_3 ?>' readonly>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; VS</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil4" value='<?= $hasil_4 ?>' readonly>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; =</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil6" value='<?= $hasil_6 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                 
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-8">
                        <a href="<?= site_url('adminPUBG/schedule') ?>" class="btn btn-primary" >Kembali</a>
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
