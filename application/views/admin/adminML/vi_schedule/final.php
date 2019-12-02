        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  
        <?php if($databaganEdit)
  	  {
        $id 			    = $databaganEdit->idBagan;
        $id_bagan     		= $databaganEdit->idBagan;
        $hasil_13 		    = $databaganEdit->hasil13;
        $hasil_14 		    = $databaganEdit->hasil14;
        $hasil_15 		    = $databaganEdit->hasil15;
}else{
        $id_bagan 	    = "";
        $hasil_13  		    = "";
        $hasil_14  		    = "";
        $hasil_15  		    = "";
       }?>
        <div class="row">
        
            <div class="col-lg-8">
            
            <?= form_open_multipart('adminML/updateFinal/'.$id); ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">1.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil13" value='<?= $hasil_13 ?>' readonly>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; VS</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil14" value='<?= $hasil_14 ?>'readonly>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; =</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil15" value='<?= $hasil_15 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                 
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-8">
                        <a href="<?= site_url('adminML/schedule') ?>" class="btn btn-primary" >Kembali</a>
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
