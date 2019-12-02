        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  

        <div class="row">
        
            <div class="col-lg-8">
            
            <!--<form action="">-->
            <?php if($datauploadStruk)
  	  {
        $id 			    = $datauploadStruk->idTurnamen;
        $id_turnamen 		= $datauploadStruk->idTurnamen;
        $nama_turnamen 		= $datauploadStruk->namaTurnamen;
        $foto_struk 		= $datauploadStruk->fotoStruk;
}else{
        $id_turnamen 	    = "";
        $nama_turnamen 		= "";
        $foto_struk 		= "";
       }?>

                <?= form_open_multipart('management/formuploadfotoStruk/'.$id); ?>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Nama Turnamen</label>
                    <div class="class col-sm-9">
                        <input type="text" class="form-control" id="namaTurnamen" name="namaTurnamen" value="<?= $nama_turnamen; ?>" readonly>
                        <!--readyonly agar email tidak dapat diubah-->                                      
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3">Picture</label>
                    <div class="col-sm-9">
                        <div class="row">
                        <div class="col-sm-3">
                                <img src="<?= base_url('/assets/foto_struk_panitia/') . $foto_struk; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-11">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="fotoStruk" name="fotoStruk">
                                    <?= form_error('fotoStruk','<small class="text-danger pl-3">','</small>');?>
                                    <label class="custom-file-label" for="fotoStruk">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-3">
                        <a href="<?= site_url('management/myevent') ?>" class="btn btn-primary" >Kembali</a>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            
                <?= form_close(); ?>
            </div>
        
        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
