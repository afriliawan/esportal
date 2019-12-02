        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  

        <div class="row">
        
            <div class="col-lg-8">
            
            <!--<form action="">-->
            <?php if($dataeditLokasi)
  	  {
        $id 			    = $dataeditLokasi->idTempat;
        $id_tempat 		    = $dataeditLokasi->idTempat;
        $nama_tempat        = $dataeditLokasi->namaTempat;
      }else{
        $id_tempat 	        = "";
        $nama_tempat     	= "";
        }?>

                <?= form_open_multipart('superadmin/formeditlokasiTurnamen/'.$id); ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Tempat</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="namaTempat" value="<?= $nama_tempat ?>">   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>                                
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-8">
                        <a href="<?= site_url('superadmin/lokasiTurnamen') ?>" class="btn btn-primary" >Kembali</a>
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
