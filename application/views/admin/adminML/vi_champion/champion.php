        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>  

        </div>
        <!-- /.container-fluid -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
              <!-- <a href="<?= site_url('adminML/formcreateChampion') ?>" class="btn btn-primary mb-3">Tambah Data</a> -->
              
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      
                        <th><center>No.</center></th>
                        <th><center>Nama Turnamen</center></th>
                        <th><center>Nama Panitia</center></th>
                        <th><center>Juara Pertama</center></th>
                        <th><center>Juara Kedua</center></th>
                        <th><center>Juara Ketiga</center></th>
                        <th><center>Action</center></th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no = 1;
                      foreach($hasil as $r){ ?>
                      <tr>
                      <td><?=$no++ ?></td>
                      <td><?= $r->namaTurnamen; ?></td>
                      <td><?= $r->namaPanitia; ?></td>
                      <td><a href="<?= base_url('adminML/formviewPemenang/'.$r->namaTurnamen.'/'.$r->juaraPertama) ?>"><?= $r->juaraPertama; ?></td>
                      <td><a href="<?= base_url('adminML/formviewPemenang/'.$r->namaTurnamen.'/'.$r->juaraKedua) ?>"><?= $r->juaraKedua; ?></td>
                      <td><a href="<?= base_url('adminML/formviewPemenang/'.$r->namaTurnamen.'/'.$r->juaraKetiga) ?>"><?= $r->juaraKetiga; ?></td>
                      <td><center>
                        <a href="<?= base_url('adminML/formeditPemenang/'.$r->idPemenang) ?>" class="badge badge-info">Edit</a> ||
                        <a href="<?= base_url('adminML/deletePemenang/'.$r->idPemenang) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="badge badge-danger">Delete</a>
                        </center></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      <!-- End of Main Content -->

      </div>
      <!-- End of Main Content -->  
