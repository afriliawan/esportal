        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  

        <div class="row">
        
            <div class="col-lg-8">
            
            <!--<form action="">-->
            <?php if($dataeditBiaya)
  	  {
        $id 			    = $dataeditBiaya->idBiaya;
        $id_biaya 		    = $dataeditBiaya->idBiaya;
        $biaya_pendaftaran  = $dataeditBiaya->biayaPendaftaran;
      }else{
        $id_biaya 	        = "";
        $biaya_pendaftaran 	= "";
        }?>

                <?= form_open_multipart('superadmin/formeditbiayaPendaftaran/'.$id); ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Biaya Pendaftaran</label>
                    <div class="class col-sm-8">
                        <input type="number" class="form-control" name="biayaPendaftaran" value="<?= $biaya_pendaftaran ?>">   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>                                
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-8">
                        <a href="<?= site_url('superadmin/biayaPendaftaran') ?>" class="btn btn-primary" >Kembali</a>
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
