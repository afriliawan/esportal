        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>    
        <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#NewBaganPertandingan">Tambah Data</a> -->
        <!-- /.container-fluid -->
        <!-- /.container-fluid -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
              <div class="row">
                    <div class="col-lg-12">
                        <?= $this->session->flashdata('message'); ?>
                    </div>
              </div>
              <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newTeamModal">Tambah Data Tim</a>
                <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                  <thead>
                  <tr>
                      <th width="5%"><center>No.</center></th>
                      <th><center>Nama Tim</center></th>
                      <th><center>Action</center></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach($tampilkandataFinal as $r)
                    { ?>
                    <tr>
                        <td><?=$no++ ?></td>
                        <td><?= $r['namaTim']; ?></td>
                        <td><center>
                          <a href="<?= base_url('adminPUBG/deletenamaTim/'.$r['idbaganPUBG']) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="badge badge-danger">Delete</a>
                        </center></td>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      <!-- End of Main Content -->

      </div>
      <!-- End of Main Content -->  
      
        <!-- Modal -->
        
        <div class="modal fade" id="newTeamModal" tabindex="-1" role="dialog" aria-labelledby="newTeamModalLabel" aria-hidden="true">
       
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data tim</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('adminPUBG/insertnamaTim'); ?>" method="post">
                <div class="modal-body">
                <?php
                    foreach($ambildatanya as $t)
                    { ?>
                <input type="hidden" class="form-control" name="idTurnamen" value='<?= $t['idTurnamen'] ?>'>  
                <input type="hidden" class="form-control" name="namaTurnamen" value='<?= $t['namaTurnamen'] ?>'>  
                <input type="hidden" class="form-control" name="namaPanitia" value='<?= $t['namaPanitia'] ?>'>  
                <input type="hidden" class="form-control" name="idGame" value='<?= $t['idGame'] ?>'>                                 
                <input type="hidden" class="form-control" name="is_active" value='<?= $t['is_active'] ?>'> 
                <input type="hidden" class="form-control" name="urlsekarang" value='<?= $this->uri->segment(1) .'/'. $this->uri->segment(2) .'/'. $this->uri->segment(3) ?>'> 
                <?php } ?>
                <label for="name" id="namaTim" class="col-sm-3 col-form-label">Nama Tim</label>
                <?= form_error('namaTim','<small class="text-danger pl-3">','</small>');?> 
                <div class="class col-sm-12">
                    <div class="dropdown">
                        <select button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" name="namaTim">
                                <div class="controls">
                                <!-- <option value="">Pilih</option> -->
                                    <?php                                
                                        foreach ($ambil_nama_tim_dari_database as $row) {  
                                        echo "<option value='".$row->namaTim."'>".$row->namaTim."</option>";
                                        }
                                        echo"
                                        </select>"
                                    ?>
                                </div>
                        </select>
                    </div> 
                </div>
               
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
            </div>
        </div>
        </div>
        </div>