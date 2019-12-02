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
        $hasil_8 		    = $databaganEdit->hasil8;
        $hasil_9 		    = $databaganEdit->hasil9;
        $hasil_10 		    = $databaganEdit->hasil10;
        $hasil_11 		    = $databaganEdit->hasil11;
        $hasil_12 		    = $databaganEdit->hasil12;
}else{
        $id_bagan    	    = "";
        $hasil_1  		    = "";
        $hasil_2  		    = "";
        $hasil_3  		    = "";
        $hasil_4  		    = "";
        $hasil_5  		    = "";
        $hasil_6  		    = "";
        $hasil_7  		    = "";
        $hasil_8  		    = "";
        $hasil_9  		    = "";
        $hasil_10  		    = "";
        $hasil_11  		    = "";
        $hasil_12  		    = "";
       }?>
            <!--<form action="">-->
            <?= form_open_multipart('management/updateBagan8B/'.$id); ?>
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
                        <input type="text" class="form-control" name="hasil9" value='<?= $hasil_9 ?>'>   
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
                        <input type="text" class="form-control" name="hasil10" value='<?= $hasil_10 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">3.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil5" value='<?= $hasil_5 ?>' readonly>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; VS</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil6" value='<?= $hasil_6 ?>' readonly>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; =</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil11" value='<?= $hasil_11 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">4.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil7" value='<?= $hasil_7 ?>' readonly>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; VS</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil8" value='<?= $hasil_8 ?>' readonly>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; =</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil12" value='<?= $hasil_12 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                 
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-8">
                    <a href="<?= site_url('management/scheduleML') ?>" class="btn btn-primary" >Kembali</a>
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
