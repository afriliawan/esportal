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
        $team_1 		    = $databaganEdit->team1;
        $team_2 		    = $databaganEdit->team2;
        $team_3 		    = $databaganEdit->team3;
        $team_4 		    = $databaganEdit->team4;
        $team_5 		    = $databaganEdit->team5;
        $team_6 		    = $databaganEdit->team6;
        $team_7 		    = $databaganEdit->team7;
        $team_8 		    = $databaganEdit->team8;
        $team_9 		    = $databaganEdit->team9;
        $team_10 		    = $databaganEdit->team10;
        $team_11 		    = $databaganEdit->team11;
        $team_12 		    = $databaganEdit->team12;
        $team_13 		    = $databaganEdit->team13;
        $team_14 		    = $databaganEdit->team14;
        $team_15 		    = $databaganEdit->team15;
        $team_16 		    = $databaganEdit->team16;
        $hasil_1 		    = $databaganEdit->hasil1;
        $hasil_2 		    = $databaganEdit->hasil2;
        $hasil_3 		    = $databaganEdit->hasil3;
        $hasil_4 		    = $databaganEdit->hasil4;
        $hasil_5 		    = $databaganEdit->hasil5;
        $hasil_6 		    = $databaganEdit->hasil6;
        $hasil_7 		    = $databaganEdit->hasil7;
        $hasil_8 		    = $databaganEdit->hasil8;
}else{
        $id_bagan    	    = "";
        $team_1  		    = "";
        $team_2  		    = "";
        $team_3  		    = "";
        $team_4  		    = "";
        $team_5  		    = "";
        $team_6  		    = "";
        $team_7  		    = "";
        $team_8  		    = "";
        $team_9  		    = "";
        $team_10  		    = "";
        $team_11  		    = "";
        $team_12  		    = "";
        $team_13  		    = "";
        $team_14  		    = "";
        $team_15  		    = "";
        $team_16  		    = "";
        $hasil_1  		    = "";
        $hasil_2  		    = "";
        $hasil_3  		    = "";
        $hasil_4  		    = "";
        $hasil_5  		    = "";
        $hasil_6  		    = "";
        $hasil_7  		    = "";
        $hasil_8  		    = "";
       }?>
            <!--<form action="">-->
            <?= form_open_multipart('adminML/updateBagan16B/'.$id); ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">1.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team1" value='<?= $team_1 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; VS</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team2" value='<?= $team_2 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; =</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil1" value='<?= $hasil_1 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">2.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team3" value='<?= $team_3 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; VS</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team4" value='<?= $team_4 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; =</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil2" value='<?= $hasil_2 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">3.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team5" value='<?= $team_5 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; VS</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team6" value='<?= $team_6 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; =</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil3" value='<?= $hasil_3 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">4.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team7" value='<?= $team_7 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; VS</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team8" value='<?= $team_8 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; =</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil4" value='<?= $hasil_4 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">5.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team9" value='<?= $team_9 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; VS</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team10" value='<?= $team_10 ?>'>   
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
                    <label for="name" class="col-sm-1 col-form-label">6.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team11" value='<?= $team_11 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; VS</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team12" value='<?= $team_12 ?>'>   
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
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">7.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team13" value='<?= $team_13 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; VS</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team14" value='<?= $team_14 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; =</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil7" value='<?= $hasil_7 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label">8.</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team15" value='<?= $team_15 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; VS</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="team16" value='<?= $team_16 ?>'>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                    <label for="name" class="col-sm-1 col-form-label">&nbsp; &nbsp; =</label>
                    <div class="class col-sm-3">
                        <input type="text" class="form-control" name="hasil8" value='<?= $hasil_8 ?>'>   
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
