        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  

        <div class="row">
        
            <div class="col-lg-8">
            
            <!--<form action="">-->
            
            <?php
            $no = 1;
            foreach($dataviewPemenang as $r)
              {  
                $id 			    = $r['idRegis'];
                $id_regis    		= $r['idRegis'];
                $ign_ketua   		= $r['ignKetua'];
                $ign_ang1   		= $r['ignAng1'];   
                $ign_ang2   		= $r['ignAng2'];
                $ign_ang3   		= $r['ignAng3'];
                $ign_ang4   		= $r['ignAng4'];
            }?>

                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nickname Ketua</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name='$ignKetua' value="<?= $ign_ketua ?>"readonly>   
                        <!--BELUM DI SETTING-->
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nickname Anggota 1</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name='$ignAng1' value='<?= $ign_ang1 ?>'readonly>   
                        <!--BELUM DI SETTING-->
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nickname Anggota 2</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name='$ignAng2' value='<?= $ign_ang2 ?>'readonly>   
                        <!--BELUM DI SETTING-->
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nickname Anggota 3</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name='$ignAng3' value='<?= $ign_ang3 ?>'readonly>   
                        <!--BELUM DI SETTING-->
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Nickname Anggota 4</label>
                    <div class="class col-sm-8">
                        <input type="text" class="form-control" name='$ignAng4' value='<?= $ign_ang4 ?>'readonly>   
                        <!--BELUM DI SETTING-->
                        <!--Validasi agar name tidak boleh kosong-->                                  
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-8">
                        <a href="<?= site_url('superadmin/allChampion') ?>" class="btn btn-primary" >Kembali</a>
                    </div>
                </div>
            </form>
            
            </div>
        
        </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

