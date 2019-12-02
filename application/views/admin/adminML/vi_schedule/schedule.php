        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>    
        <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#NewBaganPertandingan">Tambah Data</a> -->
        </div>
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th width="5%">No.</center></th>
                      <th><center>Nama Turnamen</center></th>
                      <th><center>16 Besar</center></th>
                      <th><center>8 Besar</center></th>
                      <th><center>Semi Final</center></th>
                      <th><center>Final</center></th>
                      <th width="12%"><center>Action</center></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no = 1;
                      foreach($hasil as $r){ ?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <td><?=$r['namaTurnamen'] ?></td>
                        <td><center><a href="<?= site_url('adminML/enambelasBesar/'.$r['idBagan']) ?>" class="badge badge-primary">Lihat Data</a></center></td>
                        <td><center><a href="<?= site_url('adminML/delapanBesar/'.$r['idBagan']) ?>" class="badge badge-primary">Lihat Data</a></center></td>
                        <td><center><a href="<?= site_url('adminML/semiFinal/'.$r['idBagan']) ?>" class="badge badge-primary">Lihat Data</a></center></td>
                        <td><center><a href="<?= site_url('adminML/final/'.$r['idBagan']) ?>" class="badge badge-primary">Lihat Data</a></center></td>
                        <td><center>
                          <!-- <a href="<?= base_url('adminML/finishTour/'.$r['idBagan']) ?>" class="badge badge-success">Finish</a> || -->
                          <a href="<?= base_url('adminML/deleteBagan/'.$r['idBagan']) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="badge badge-danger">Delete</a>
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