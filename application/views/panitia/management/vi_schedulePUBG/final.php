        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  
        <?php if($PUBGdatabaganEdit)
  	  {
        $id 			    = $PUBGdatabaganEdit->idBagan;
        $id_bagan     		= $PUBGdatabaganEdit->idBagan;
        $team1   		    = $PUBGdatabaganEdit->team1;
        $team2   		    = $PUBGdatabaganEdit->team2;
        $team3   		    = $PUBGdatabaganEdit->team3;
        $team4   		    = $PUBGdatabaganEdit->team4;
        $team5   		    = $PUBGdatabaganEdit->team5;
        $team6   		    = $PUBGdatabaganEdit->team6;
        $team7   		    = $PUBGdatabaganEdit->team7;
        $team8   		    = $PUBGdatabaganEdit->team8;
        $team9   		    = $PUBGdatabaganEdit->team9;
        $team10   		    = $PUBGdatabaganEdit->team10;
        $team11   		    = $PUBGdatabaganEdit->team11;
        $team12   		    = $PUBGdatabaganEdit->team12;
        $team13   		    = $PUBGdatabaganEdit->team13;
        $team14   		    = $PUBGdatabaganEdit->team14;
        $team15   		    = $PUBGdatabaganEdit->team15;
        $team16   		    = $PUBGdatabaganEdit->team16;
        $team17   		    = $PUBGdatabaganEdit->team17;
        $team18  		    = $PUBGdatabaganEdit->team18;
        $team19   		    = $PUBGdatabaganEdit->team19;
        $team20   		    = $PUBGdatabaganEdit->team20;
        $team21   		    = $PUBGdatabaganEdit->team21;
        $team22   		    = $PUBGdatabaganEdit->team22;
        $team23   		    = $PUBGdatabaganEdit->team23;
        $team24   		    = $PUBGdatabaganEdit->team24;
        $team25   		    = $PUBGdatabaganEdit->team25;
}else{
        $id_bagan 	    = "";
        $team1  		    = "";
        $team2  		    = "";
        $team3  		    = "";
        $team4  		    = "";
        $team5  		    = "";
        $team6  		    = "";
        $team7  		    = "";
        $team8  		    = "";
        $team9  		    = "";
        $team10  		    = "";
        $team11  		    = "";
        $team12  		    = "";
        $team13  		    = "";
        $team14  		    = "";
        $team15  		    = "";
        $team16  		    = "";
        $team17  		    = "";
        $team18  		    = "";
        $team19  		    = "";
        $team20  		    = "";
        $team21  		    = "";
        $team22  		    = "";
        $team23 		    = "";
        $team24 		    = "";
        $team25  		    = "";
       }?>
        <div class="row">
        
            <div class="col-lg-8">
            
            <?= form_open_multipart('management/updateFinalPUBG/'.$id); ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">1.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team1" value='<?= $team1 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">2.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team2" value='<?= $team2 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">3.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team3" value='<?= $team3 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">4.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team4" value='<?= $team4 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">5.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team5" value='<?= $team5 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">6.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team6" value='<?= $team6 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">7.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team7" value='<?= $team7 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">8.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team8" value='<?= $team8 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">9.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team9" value='<?= $team9 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">10.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team10" value='<?= $team10 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">11.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team11" value='<?= $team11 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">12.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team12" value='<?= $team12 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">13.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team13" value='<?= $team13 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">14.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team14" value='<?= $team14 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">15.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team15" value='<?= $team15 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">16.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team16" value='<?= $team16 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">17.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team17" value='<?= $team17 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">18.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team18" value='<?= $team18 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">19.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team19" value='<?= $team19 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">20.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team20" value='<?= $team20 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">21.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team21" value='<?= $team21 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">22.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team22" value='<?= $team22 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">23.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team23" value='<?= $team23 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">24.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team24" value='<?= $team24 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">25.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team25" value='<?= $team25 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-8">
                        <a href="<?= site_url('management/schedulePUBG') ?>" class="btn btn-primary" >Kembali</a>
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
