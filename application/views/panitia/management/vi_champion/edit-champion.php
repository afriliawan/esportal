        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  

        <div class="row">
        
            <div class="col-lg-8">
            
            <!--<form action="">-->
            <?php if($dataeditPemenang)
  	  {
        $id 			    = $dataeditPemenang->idPemenang;
        $id_pemenang 		= $dataeditPemenang->idPemenang;
        $nama_turnamen 		= $dataeditPemenang->namaTurnamen;
        $nama_panitia 		= $dataeditPemenang->namaPanitia;
        $juara_pertama 		= $dataeditPemenang->juaraPertama;
        $juara_kedua 		= $dataeditPemenang->juaraKedua;
        $juara_ketiga 		= $dataeditPemenang->juaraKetiga;
}else{
        $id_turnamen 	    = "";
        $nama_turnamen 		= "";
        $nama_panitia 		= "";
        $juara_pertama 		= "";
        $juara_kedua 		= "";
        $juara_ketiga 		= "";
       }?>

                <?= form_open_multipart('management/formeditPemenang/'.$id); ?>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Turnamen</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="namaTurnamen" value="<?= $nama_turnamen ?>" readonly>   
                        <?= form_error('namaTurnamen','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nama Panitia</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="namaPanitia" value="<?= $nama_panitia ?>" readonly>    
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Juara 1</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="juaraPertama" value="<?= $juara_pertama ?>">   
                        <?= form_error('juaraPertama','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Juara 2</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="juaraKedua" value="<?= $juara_kedua ?>">   
                        <?= form_error('juaraKedua','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Juara 3</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name="juaraKetiga" value="<?= $juara_ketiga ?>">   
                        <?= form_error('juaraKetiga','<small class="text-danger pl-3">','</small>');?>
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-8">
                        <a href="<?= site_url('management/champion') ?>" class="btn btn-primary" >Kembali</a>
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
